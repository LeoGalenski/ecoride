<?php
// php/header.php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<nav>
  <ul>
    <!-- Toujours visibles -->
    <li><a href="index.php">Accueil</a></li>
    <li><a href="trips.php">Trajets</a></li>

    <?php if (!isset($_SESSION['user_id'])): ?>
      <!-- Non connecté -->
      <li><a href="login.php">Connexion</a></li>
      <li><a href="register.php">Inscription</a></li>
    <?php else: ?>

    <!-- Connecté -->
    <?php if (!empty($_SESSION['driver'])): ?>
        <!-- Lien visible uniquement aux conducteurs -->
        <li><a href="create_trip.php">Créer un trajet</a></li>
        <li><a href="vehicles.php">Mes véhicules</a></li>
    <?php endif; ?>

    <?php if (!empty($_SESSION['employee'])): ?>
        <!-- Interface modération -->
        <li><a href="admin.php">Modération</a></li>
    <?php endif; ?>

    <li><a href="account.php">Mon compte</a></li>

    <!-- Bouton de déconnexion -->
    <li>
      <form action="php/logout.php" method="POST" style="display:inline">
        <button type="submit">Se déconnecter</button>
      </form>
    </li>
    <?php endif; ?>
  </ul>
</nav>