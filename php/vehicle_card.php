<?php
// my_vehicles.php

// 1. Vérifier la session
require_once 'session_check.php';

// 2. Connexion à la base
require_once 'php/connect.php';

// 3. Charger les véhicules de l’utilisateur
$userId = $_SESSION['user_id'];
$stmt   = $connect->prepare("
  SELECT immatriculation, marque, modele, couleur
  FROM Vehicle
  WHERE owner_id = ?
  ORDER BY id ASC
");
$stmt->execute([$userId]);
$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

            <div class="vehicles-list">
                <?php foreach ($vehicles as $v): ?>
                    <div class="vehicle-card">
                        <h2><?= htmlspecialchars($v['marque']) ?> <?= htmlspecialchars($v['modele']) ?></h2>
                        <ul>
                            <li><strong>Immatriculation :</strong> <?= htmlspecialchars($v['immatriculation']) ?></li>
                            <li><strong>Couleur :</strong> <?= htmlspecialchars($v['couleur']) ?></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>