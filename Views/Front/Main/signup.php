<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = ['success' => false, 'message' => ''];
    
    // Récupération et validation des données
    $username = sanitizeInput($_POST['username'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $gender = sanitizeInput($_POST['gender'] ?? '');
    $terms = isset($_POST['terms']) && $_POST['terms'] === 'on';
    
    // Validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($gender) || !$terms) {
        $response['message'] = 'Tous les champs sont requis.';
        echo json_encode($response);
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Adresse email invalide.';
        echo json_encode($response);
        exit();
    }
    
    if (strlen($password) < 8) {
        $response['message'] = 'Le mot de passe doit contenir au moins 8 caractères.';
        echo json_encode($response);
        exit();
    }
    
    if ($password !== $confirm_password) {
        $response['message'] = 'Les mots de passe ne correspondent pas.';
        echo json_encode($response);
        exit();
    }
    
    if (!in_array($gender, ['male', 'female', 'other', 'prefer_not_to_say'])) {
        $response['message'] = 'Genre invalide.';
        echo json_encode($response);
        exit();
    }
    
    // Vérifier si l'email ou le nom d'utilisateur existe déjà
    $conn = getDBConnection();
    
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $response['message'] = 'Cet email ou nom d\'utilisateur est déjà utilisé.';
        $stmt->close();
        $conn->close();
        echo json_encode($response);
        exit();
    }
    $stmt->close();
    
    // Hacher le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insérer l'utilisateur
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, gender) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $gender);
    
    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        
        // Créer la session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        
        $response['success'] = true;
        $response['message'] = 'Compte créé avec succès! Redirection...';
        $response['user'] = [
            'id' => $user_id,
            'username' => $username,
            'email' => $email
        ];
    } else {
        $response['message'] = 'Erreur lors de la création du compte: ' . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
    
    echo json_encode($response);
    exit();
}

// Si la requête n'est pas POST
http_response_code(405);
echo json_encode(['success' => false, 'message' => 'Méthode non autorisée.']);
?>