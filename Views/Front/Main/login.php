<?php
// Start session at the very beginning
session_start();

// Include configuration
require_once 'config.php';

// Set JSON header
header('Content-Type: application/json');

// Input sanitization function with null handling
function sanitizeInput($data) {
    if ($data === null || $data === '') {
        return '';
    }
    
    // Ensure it's a string
    $data = (string)$data;
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize response
    $response = ['success' => false, 'message' => ''];
    
    // Get inputs with proper null handling
    $email_input = $_POST['email'] ?? '';
    $password_input = $_POST['password'] ?? '';
    
    // Sanitize inputs - ensure they're strings
    $email = sanitizeInput($email_input);
    $password = (string)($password_input); // Password doesn't need htmlspecialchars
    
    $remember = isset($_POST['remember']) && $_POST['remember'] === 'on';
    
    // Validate inputs
    if (empty($email) || empty($password)) {
        $response['message'] = 'Veuillez remplir tous les champs.';
        echo json_encode($response);
        exit();
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Adresse email invalide.';
        echo json_encode($response);
        exit();
    }
    
    // Database connection and processing
    try {
        // Get database connection
        $conn = getDBConnection();
        if (!$conn || $conn->connect_error) {
            throw new Exception('Erreur de connexion à la base de données.');
        }
        
        // Set charset to prevent encoding issues
        $conn->set_charset("utf8mb4");
        
        // Prepare and execute query
        $stmt = $conn->prepare("SELECT id, username, email, password, is_active FROM users WHERE email = ?");
        if (!$stmt) {
            throw new Exception('Erreur de préparation de la requête.');
        }
        
        $stmt->bind_param("s", $email);
        if (!$stmt->execute()) {
            throw new Exception('Erreur d\'exécution de la requête.');
        }
        
        $stmt->store_result();
        
        // Check if user exists
        if ($stmt->num_rows === 0) {
            // Generic message for security
            $response['message'] = 'Email ou mot de passe incorrect.';
            $stmt->close();
            $conn->close();
            echo json_encode($response);
            exit();
        }
        
        // Bind results
        $stmt->bind_result($user_id, $username, $db_email, $hashed_password, $is_active);
        $stmt->fetch();
        
        // Check if account is active
        if (!$is_active) {
            $response['message'] = 'Ce compte est désactivé. Contactez l\'administrateur.';
            $stmt->close();
            $conn->close();
            echo json_encode($response);
            exit();
        }
        
        // Verify password exists in database
        if ($hashed_password === null || empty($hashed_password)) {
            error_log("User $email has NULL or empty password in database");
            $response['message'] = 'Email ou mot de passe incorrect.';
            $stmt->close();
            $conn->close();
            echo json_encode($response);
            exit();
        }
        
        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Update last login timestamp
            $update_stmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
            if ($update_stmt) {
                $update_stmt->bind_param("i", $user_id);
                $update_stmt->execute();
                $update_stmt->close();
            }
            
            // Regenerate session ID for security
            session_regenerate_id(true);
            
            // Set session variables
            $_SESSION['user_id'] = (int)$user_id;
            $_SESSION['username'] = (string)$username;
            $_SESSION['email'] = (string)$db_email;
            $_SESSION['last_login'] = time();
            
            // Handle "remember me" functionality
            if ($remember) {
                // Generate secure token
                $token = bin2hex(random_bytes(32));
                $expires = time() + (30 * 24 * 60 * 60); // 30 days
                
                // Set secure cookie - simplified version for compatibility
                setcookie(
                    'remember_token',
                    $token,
                    [
                        'expires' => $expires,
                        'path' => '/',
                        'domain' => '',
                        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
                        'httponly' => true,
                        'samesite' => 'Strict'
                    ]
                );
                
                // Store token in database
                $token_stmt = $conn->prepare("INSERT INTO user_sessions (user_id, session_token, expires_at, user_agent, ip_address) VALUES (?, ?, FROM_UNIXTIME(?), ?, ?)");
                if ($token_stmt) {
                    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
                    $ip_address = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
                    
                    $token_stmt->bind_param("isiss", $user_id, $token, $expires, $user_agent, $ip_address);
                    $token_stmt->execute();
                    $token_stmt->close();
                }
            }
            
            // Success response
            $response['success'] = true;
            $response['message'] = 'Connexion réussie! Redirection...';
            $response['user'] = [
                'id' => (int)$user_id,
                'username' => (string)$username,
                'email' => (string)$db_email
            ];
            
        } else {
            // Incorrect password
            $response['message'] = 'Email ou mot de passe incorrect.';
        }
        
        // Clean up
        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        // Log error for debugging
        error_log("Login error: " . $e->getMessage());
        
        // Generic error message for security
        $response['message'] = 'Une erreur est survenue lors de la connexion.';
        
        // Close connections if they exist
        if (isset($stmt) && $stmt) {
            $stmt->close();
        }
        if (isset($conn) && $conn) {
            $conn->close();
        }
    }
    
    // Send response
    echo json_encode($response);
    exit();
    
} else {
    // Method not allowed
    http_response_code(405);
    echo json_encode([
        'success' => false, 
        'message' => 'Méthode non autorisée. Seules les requêtes POST sont acceptées.'
    ]);
    exit();
}