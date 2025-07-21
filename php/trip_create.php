<?php
// php/trip_create.php
session_start();
header('Content-Type: application/json');

if (empty($_SESSION['user_id']) || empty($_SESSION['driver'])) {
  echo json_encode(['success'=>false,'error'=>'Accès refusé']);
  exit;
}

require_once 'connect.php';

$driver_id     = $_SESSION['user_id'];
$vehicle_id    = $_POST['vehicle_id']    ?? null;
$start         = trim($_POST['location_start'] ?? '');
$end           = trim($_POST['location_end'] ?? '');
$date_start    = $_POST['date_start']    ?? '';
$time_start    = $_POST['time_start']    ?? '';
$date_end      = $_POST['date_end']      ?? '';
$time_end      = $_POST['time_end']      ?? '';
$seats         = (int)($_POST['seats']   ?? 0);
$price         = (int)($_POST['price']   ?? 0);

// Validation basique
if (!$vehicle_id || !$start || !$end || !$date_start || !$time_start || !$date_end || !$time_end || $seats<1) {
  echo json_encode(['success'=>false,'error'=>'Tous les champs sont requis']);
  exit;
}

try {
  $sql = "INSERT INTO Trip 
    (driver_id, vehicle_id, location_start, location_end, date_start, time_start, date_end, time_end, seats, price)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $connect->prepare($sql);
  $stmt->execute([
    $driver_id, 
    $vehicle_id, 
    $start, 
    $end, 
    $date_start, 
    $time_start, 
    $date_end, 
    $time_end, 
    $seats, 
    $price
  ]);

  echo json_encode(['success'=>true]);
} catch (PDOException $e) {
  echo json_encode(['success'=>false,'error'=>$e->getMessage()]);
}
