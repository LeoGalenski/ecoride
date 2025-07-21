<?php
// create_trip.php
require_once 'php/session_check.php';
require_once 'php/connect.php';
require_once 'php/auth_redirect.php';

// Récupérer les véhicules du conducteur
$stmt = $connect->prepare(
    "SELECT id, marque, modele 
     FROM Vehicle 
     WHERE owner_id = ?"
);
$stmt->execute([ $userId ]);
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

    <h1>Créer un nouveau trajet</h1>

    <form id="create-trip-form" method="POST">
      <div class="create-trip-form">
        <label for="vehicle">Véhicule :</label>
        <select id="vehicle" name="vehicle_id" required>
          <option value="">-- Choisir --</option>
          <?php foreach($vehicles as $v): ?>
            <option value="<?= $v['id'] ?>">
              <?= htmlspecialchars($v['marque'] . ' ' . $v['modele']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="create-trip-form">
        <label for="start">Départ (ville) :</label>
        <input type="text" id="start" name="location_start" required>
      </div>
      <div class="create-trip-form">
        <label for="end">Arrivée (ville) :</label>
        <input type="text" id="end" name="location_end" required>
      </div>

      <div class="create-trip-form">
        <label for="date_start">Date de départ :</label>
        <input type="date" id="date_start" name="date_start" required>
      </div>
      <div class="create-trip-form">
        <label for="time_start">Heure de départ :</label>
        <input type="time" id="time_start" name="time_start" required>
      </div>

      <div class="create-trip-form">
        <label for="date_end">Date d’arrivée :</label>
        <input type="date" id="date_end" name="date_end" required>
      </div>
      <div class="create-trip-form">
        <label for="time_end">Heure d’arrivée :</label>
        <input type="time" id="time_end" name="time_end" required>
      </div>

      <div class="create-trip-form">
        <label for="seats">Nombre de places :</label>
        <input type="number" id="seats" name="seats" min="1" required>
      </div>
      <div class="create-trip-form">
        <label for="price">Prix (en crédits) :</label>
        <input type="number" id="price" name="price" min="0" required>
      </div>

      <div class="create-trip-form"><button type="submit">Publier le trajet</button>
    </div>
  </form>
    <p id="message-create"></p>
  </main>

  <script src="js/create_trip.js" defer></script>
</body>
</html>
