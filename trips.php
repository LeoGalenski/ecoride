<?php
// trips.php

// 1) Connexion à la base
require_once 'php/connect.php';

// 2) En-tête de navigation (publique)
include 'php/header.php';

// 3) Récupération des trajets disponibles avec info véhicule et conducteur
$sql = "SELECT T.id AS trip_id,T.location_start, T.location_end, T.date_start, T.time_start, T.date_end, T.time_end, T.seats, T.price,
    V.id AS vehicle_id, V.immatriculation, V.marque, V.modele, V.couleur, V.ecologique,
    U.username AS driver_name
  FROM Trip T
  JOIN Vehicle V ON T.vehicle_id = V.id
  JOIN users   U ON T.driver_id  = U.id
  WHERE T.seats > 0
  ORDER BY T.date_start ASC, T.time_start ASC";
$stmt = $connect->prepare($sql);
$stmt->execute();
$trips = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Trajets disponibles – EcoRide</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/trips.css">
</head>
<body>
  <main>
    <h1>Trajets disponibles</h1>

    <?php if (empty($trips)): ?>
      <p>Aucun covoiturage disponible pour le moment.</p>
    <?php else: ?>
      <div class="trips-list">
        <?php foreach ($trips as $trip): ?>
          <?php
            // Prépare la variable pour le template
            $currentTrip = $trip;
            include 'php/trip_card.php';
          ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>
</body>
</html>
