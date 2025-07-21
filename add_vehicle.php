<?php
// vehicles.php
require_once 'php/session_check.php';
require_once 'php/connect.php';
require_once 'php/auth_redirect.php';

// Récupérer les véhicules du conducteur
$stmt = $connect->prepare(
    "SELECT id, marque, modele 
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
    <title>Créer un trajet – EcoRide</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/forms.css">
</head>

<body>
    <?php include 'php/header.php'; ?>

    <main class="container">

        <h1>Ajouter un véhicule</h1>

        <form id="create-vehicle-form">

            <div class="create-vehicle-form">
                <label for="immatriculation">Immatriculation :</label>
                <input type="text" id="immatriculation" name="immatriculation" required>
            </div>

            <div class="create-vehicle-form">
                <label for="premiere_immat">Date de première immatriculation :</label>
                <input type="date" id="premiere_immat" name="premiere_immat" required>
            </div>

            <div class="create-vehicle-form">
                <label for="marque">Marque :</label>
                <input type="text" id="marque" name="marque" required>
            </div>

            <div class="create-vehicle-form">
                <label for="modele">Modèle :</label>
                <input type="text" id="modele" name="modele" required>
            </div>

            <div class="create-vehicle-form">
                <label for="couleur">Couleur :</label>
                <input type="text" id="couleur" name="couleur" required>
            </div>

            <div class="create-vehicle-form">
                <label for="ecologique">
                    <input type="checkbox" id="ecologique" name="ecologique" value="1">
                    Véhicule électrique (écologique)
                </label>
            </div>


            <div class="create-vehicle-form"><button type="submit">Ajouter un véhicule</button>
            </div>
        </form>
        <p id="message-create"></p>
    </main>

    <script src="js/create_vehicle.js" defer></script>
</body>

</html>