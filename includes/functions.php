<?php
// Funkcije za validaciju i sigurnost
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validatePassword($password) {
    // Minimum 8 karaktera, bar jedno veliko slovo i broj
    return preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
}

function redirect($url) {
    header("Location: $url");
    exit();
}
?>