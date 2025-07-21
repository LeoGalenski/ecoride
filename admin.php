<?php
require_once 'php/session_check.php';
require_once 'php/connect.php';  // instancie $connect en PDO

// 1) Récupérer les données complètes de l’utilisateur
$stmt = $connect->prepare(
    "SELECT firstname, lastname, address, phone, credits 
     FROM users 
     WHERE id = ?"
);
$stmt->execute([$userId]);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

// Sécurité : si jamais l’utilisateur a été supprimé
if (! $profile) {
    // On détruit la session et on redirige
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// 2) Préparer un affichage
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mon espace — EcoRide</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<?php include 'php/header.php'; ?>
<main class="container">
  <h1>Modération des avis</h1>

  <section class="profile">
    <h2>Mes informations</h2>
    <ul>
      <li><strong>Nom complet :</strong>
          <?= htmlspecialchars($profile['firstname'] . ' ' . $profile['lastname']) ?></li>
      <li><strong>Email :</strong> <?= htmlspecialchars($userEmail) ?></li>
      <li><strong>Adresse :</strong> <?= htmlspecialchars($profile['address']) ?></li>
      <li><strong>Téléphone :</strong> <?= htmlspecialchars($profile['phone']) ?></li>
      <li><strong>Crédits restants :</strong> <?= (int)$profile['credits'] ?></li>
    </ul>
    <!-- Plus tard : un bouton “Modifier mes informations” ouvrant un formulaire -->
  </section>

  <section class="roles-actions">
      <?php if ($isEmployee): ?>
        <li><a href="admin.php" class="btn">Modération des avis</a></li>
      <?php endif; ?>
    </ul>
  </section>
</main>

</body>
</html>