<?php
// edit_profile.php
require_once 'php/session_check.php';
require_once 'php/connect.php';

// 1. Charger le profil en base
$stmt = $connect->prepare("
  SELECT firstname, lastname, address, phone
  FROM users
  WHERE id = ?
");
$stmt->execute([ $_SESSION['user_id'] ]);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

if (! $profile) {
  // Sécurité : si l'utilisateur a disparu
  session_unset();
  session_destroy();
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier mes informations — EcoRide</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/forms.css">
</head>
<body>
  <?php include 'php/header.php'; ?>

  <main class="container">
    <h1>Modifier mes informations</h1>
    <form id="profile-form">
      <div class="edit-profile-form">
        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname"
               value="<?= htmlspecialchars($profile['firstname']) ?>" required>
      </div>
      <div class="edit-profile-form">
        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname"
               value="<?= htmlspecialchars($profile['lastname']) ?>" required>
      </div>
      <div class="edit-profile-form">
        <label for="address">Adresse :</label>
        <input type="text" id="address" name="address"
               value="<?= htmlspecialchars($profile['address']) ?>" required>
      </div>
      <div class="edit-profile-form">
        <label for="phone">Téléphone :</label>
        <input type="tel" id="phone" name="phone"
               value="<?= htmlspecialchars($profile['phone']) ?>" required>
      </div>
      <div class="edit-profile-form">
      <button type="submit">Enregistrer</button></div>
    </form>
    <p id="message-profile"></p>
  </main>

  <script src="js/edit_profile.js" defer></script>
</body>
</html>
