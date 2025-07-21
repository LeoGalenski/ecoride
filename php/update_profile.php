<?php
// php/profile_update.php
session_start();
header('Content-Type: application/json');

if (empty($_SESSION['user_id'])) {
  echo json_encode(['success'=>false,'error'=>'Accès refusé']);
  exit;
}

require_once __DIR__ . '/connect.php';

// Récupération + nettoyage
$firstname = trim($_POST['firstname'] ?? '');
$lastname  = trim($_POST['lastname']  ?? '');
$address   = trim($_POST['address']   ?? '');
$phone     = trim($_POST['phone']     ?? '');

// Validation
if ($firstname === '' || $lastname === '' || $address === '' || $phone === '') {
  echo json_encode(['success'=>false,'error'=>'Tous les champs sont obligatoires']);
  exit;
}

// Mise à jour
try {
  $sql = "UPDATE users
          SET firstname = ?, lastname = ?, address = ?, phone = ?
          WHERE id = ?";
  $stmt = $connect->prepare($sql);
  $stmt->execute([
    $firstname, $lastname, $address, $phone,
    $_SESSION['user_id']
  ]);

  echo json_encode(['success'=>true]);
} catch (PDOException $e) {
  echo json_encode(['success'=>false,'error'=>'Erreur SQL : '.$e->getMessage()]);
}