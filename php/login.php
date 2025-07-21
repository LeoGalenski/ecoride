<?php
session_start();

$connect = new PDO("mysql:host=localhost;dbname=ecoride_test", "root", "");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(["success" => false, "reason" => "Champs manquants"]);
    exit;
}

$stmt = $connect->prepare("SELECT id, username, password, driver, passenger, employee FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$user) {
    echo json_encode(["success" => false, "reason" => "Email introuvable"]);
    exit;
}

if (!password_verify($password, $user['password'])) {
    echo json_encode(["success" => false, "reason" => "Mot de passe incorrect"]);
    exit;
}

// Connexion réussie
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['driver'] = $user['driver'];
$_SESSION['passenger'] = $user['passenger'];
$_SESSION['employee'] = $user['employee'];

echo json_encode(["success" => true]);
