<?php
// config.php
session_start();

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Changez selon votre configuration
define('DB_PASS', ''); // Changez selon votre configuration
define('DB_NAME', 'byteback_db');

// Connexion à la base de données
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8mb4");
    return $conn;
}

// Fonction pour sécuriser les entrées
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Rediriger si non connecté
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: main.html');
        exit();
    }
}

// Rediriger si déjà connecté
function requireLogout() {
    if (isLoggedIn()) {
        header('Location: main.php');
        exit();
    }
}
?>