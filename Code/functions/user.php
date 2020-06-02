<?php
require_once __DIR__ . '/bdd.php';

function registerUser(string $email, string $password, string $firstName, string $lastName): bool {
    $pdo = getPdo();
    $pwd = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $query = "INSERT INTO users (email, password, firstName, lastName) VALUES (:email, :password, :firstName, :lastName)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([
        'email' => $email,
        'password' => $pwd,
        'firstName' => $firstName,
        'lastName' => $lastName
    ]);
}

