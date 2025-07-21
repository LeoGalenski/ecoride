<?php
require_once 'php/session_check.php';
require_once 'php/connect.php';  // instancie $connect en PDO

// 1) Récupérer les données complètes de l’utilisateur
$stmt = $connect->prepare(
    "SELECT firstname, lastname, address, email, phone, credits 
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
  <link rel="stylesheet" href="css/account.css">
  <link rel="stylesheet" href="css/history.css">
</head>
<body>
<?php include 'php/header.php'; ?>
<main class="container">
  <h1>Bonjour, <?= htmlspecialchars($username) ?> !</h1>

  <section class="profile">
    <h2>Mes informations</h2>
    <ul>
      <li><strong>Nom complet :</strong> <?= htmlspecialchars($profile['firstname'] . ' ' . $profile['lastname']) ?></li>
      <li><strong>Adresse :</strong> <?= htmlspecialchars($profile['address']) ?></li>
      <li><strong>Téléphone :</strong> <?= htmlspecialchars($profile['phone']) ?></li>
      <li><strong>Crédits restants :</strong> <?= (int)$profile['credits'] ?></li>
    </ul>
    <p><a href="edit_profile.php">Mettre à jour mes informations</a></p>
  </section>

  <section class="history">
    <h2>Mes covoiturages</h2>
  <?php include 'php/history.php'; ?>
  
        <?php if (empty($history)): ?>
            <p>Vous n’avez pas encore fait de covoiturage.</p>
            <a href="trips.php">Trouvez dès maintenant votre prochain trajet !</a>
        <?php endif ?>
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
