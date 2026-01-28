<?php
session_start();
require_once 'config/database.php';
require_once 'functions.php';

// Provera da li je korisnik ulogovan
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Login funkcija
function loginUser($username, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        return true;
    }
    
    return false;
}

// Logout funkcija
function logoutUser() {
    session_destroy();
    redirect('index.php');
}

// Registracija funkcija
function registerUser($username, $email, $password) {
    global $pdo;
    
    // Provera da li korisnik već postoji
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    
    if ($stmt->rowCount() > 0) {
        return false; // Korisnik već postoji
    }
    
    // Hashovanje password-a
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Unos u bazu
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    return $stmt->execute([$username, $email, $hashedPassword]);
}
?>