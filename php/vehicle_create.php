<?php
// php/vehicle_create.php
session_start();
header('Content-Type: application/json');

if (empty($_SESSION['user_id']) || empty($_SESSION['driver'])) {
  echo json_encode(['success' => false, 'error' => 'Accès refusé']);
  exit;
}

require_once 'connect.php';

$owner_id = $_SESSION['user_id'];
$immatriculation = $_POST['immatriculation']    ?? null;
$premiere_immat = $_POST['premiere_immat']    ?? null;
$marque = $_POST['marque']    ?? null;
$modele = $_POST['modele']    ?? null;
$couleur = $_POST['couleur']    ?? null;
$ecologique = $_POST['ecologique']    ?? null;

// Validation basique
if (!$immatriculation || !$premiere_immat || !$marque || !$modele || !$couleur) {
  echo json_encode(['success' => false, 'error' => 'Tous les champs sont requis']);
  exit;
}

try {
  $sql = "INSERT INTO vehicle 
    (owner_id, immatriculation, premiere_immat, marque, modele, couleur, ecologique)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $connect->prepare($sql);
  $stmt->execute([
    $owner_id,
    $immatriculation,
    $premiere_immat,
    $marque,
    $modele,
    $couleur,
    $ecologique
  ]);

  echo json_encode(['success' => true]);
} catch (PDOException $e) {
  echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

