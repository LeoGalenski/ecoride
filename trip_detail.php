<?php
// trip_detail.php
require_once 'php/session_check.php';
require_once 'php/connect.php';

$tripId = (int)($_GET['id'] ?? 0);
if ($tripId < 1) {
    header('Location: trips.php');
    exit;
}

$sql = "
  SELECT
    T.*, V.marque, V.modele, V.immatriculation, V.ecologique,
    U.username AS driver_name
  FROM Trip T
  JOIN Vehicle V ON T.vehicle_id = V.id
  JOIN users   U ON T.driver_id  = U.id
  WHERE T.id = ?
";
$stmt = $connect->prepare($sql);
$stmt->execute([$tripId]);
$trip = $stmt->fetch(PDO::FETCH_ASSOC);

if (! $trip) {
    header('Location: trips.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détail du trajet — EcoRide</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/trips.css">
</head>

<body>
    <?php include 'php/header.php'; ?>
    <main class="container">
        <h1><?= htmlspecialchars($trip['location_start']) ?> → <?= htmlspecialchars($trip['location_end']) ?></h1>
        <ul>
            <li><strong>Chauffeur :</strong> <?= htmlspecialchars($trip['driver_name']) ?></li>
            <li><strong>Véhicule :</strong> <?= htmlspecialchars($trip['marque'] . ' ' . $trip['modele']) ?></li>
            <?php if ($trip['ecologique'] === 1): ?><li>Ce covoiturage est écologique &#x1F343;</li> <?php endif; ?>
            <li><strong>Départ :</strong> <?= htmlspecialchars($trip['date_start']) ?> à <?= htmlspecialchars($trip['time_start']) ?></li>
            <li><strong>Arrivée :</strong> <?= htmlspecialchars($trip['date_end']) ?> à <?= htmlspecialchars($trip['time_end']) ?></li>
            <li><strong>Places restantes :</strong> <?= (int)$trip['seats'] ?></li>
            <li><strong>Prix :</strong> <?= (float)$trip['price'] ?> crédits</li>
        </ul>
        <form action="php/book.php" method="POST">
            <input type="hidden" name="trip_id" value="<?= (int)$tripId ?>">
            <button class="btn" type="submit">Prendre ce covoiturage</button>
        </form>
    </main>
</body>

</html>