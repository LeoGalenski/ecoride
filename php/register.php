<?php

// Log db
$connect = new mysqli("localhost", "root", "", "ecoride_test");
if ($connect->connect_error) {
    die("Erreur de connexion : " . $connect->connect_error);
}

// Clean inputs
$username  = trim($_POST['pseudo']   ?? '');
$email     = trim($_POST['email']    ?? '');
$password  = trim($_POST['password'] ?? '');
$isDriver    = (int) ($_POST['chauffeur']  ?? 0);
$isPassenger = (int) ($_POST['passager']   ?? 0);

// Check fields
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success'=>false,'error'=>'Email invalide']);
    exit;
}
if ($username === '' || $password === '') {
    echo json_encode(['success'=>false,'error'=>'Tous les champs obligatoires doivent être remplis']);
    exit;
}

//Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// SQL instruction
$sql = "
INSERT INTO users (username, email, password, driver, passenger, credits)
VALUES (?,?,?,?,?,20)";
$stmt = $connect->prepare($sql);
$stmt->bind_param(
  "sssii",
  $username,
  $email,
  $hashedPassword,
  $isDriver,
  $isPassenger
);

// JSON exec & response success
if ($stmt->execute()) {
    echo json_encode(['success'=>true]);
} else {
    echo json_encode([
      'success'=>false,
      'error'  => $connect->error
    ]);
}

$stmt->close();
$connect->close();
