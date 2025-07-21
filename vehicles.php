<?php
// vehicles.php
require_once 'php/session_check.php';
require_once 'php/connect.php';
require_once 'php/auth_redirect.php';

// Récupérer les véhicules du conducteur
$stmt = $connect->prepare(
    "SELECT marque, modele, couleur 
     FROM Vehicle 
     WHERE owner_id = ?"
);
$stmt->execute([$userId]);
$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes véhicules – EcoRide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/vehicles.css">
</head>

<body>

<main>
    <?php include 'php/header.php'; ?>

        <h1>Mes véhicules</h1>
        <p><a href="add_vehicle.php">Ajouter un véhicule</a></p>

        <?php if (empty($vehicles)): ?>
            <h2>Vous n’avez pas encore de véhicule enregistré.</h2>
        <?php endif ?>
    <?php include 'php/vehicle_card.php'; ?>

</main>
</body>

</html>