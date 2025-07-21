<?php
// trip_card.php
?>
<div class="trip-card">
  <h2>
    <?= htmlspecialchars($currentTrip['location_start']) ?>
    &rarr;
    <?= htmlspecialchars($currentTrip['location_end']) ?>
  </h2>

  <p>
    <strong>Départ :</strong>
    <?= htmlspecialchars($currentTrip['date_start']) ?>
    à
    <?= htmlspecialchars($currentTrip['time_start']) ?>
    &nbsp;|&nbsp;
    <strong>Arrivée :</strong>
    <?= htmlspecialchars($currentTrip['date_end']) ?>
    à
    <?= htmlspecialchars($currentTrip['time_end']) ?>
  </p>

  <p>
    <strong>Chauffeur :</strong>
    <?= htmlspecialchars($currentTrip['driver_name']) ?>
    <br>
    <strong>Véhicule :</strong>
    <?= htmlspecialchars($currentTrip['marque'] . ' ' . $currentTrip['modele']) ?>  
  </p>

  <p>
    <strong>Places restantes :</strong>
    <?= (int)$currentTrip['seats'] ?>
    &nbsp;|&nbsp;
    <strong>Prix :</strong>
    <?= (float)$currentTrip['price'] ?> crédits
    &nbsp;|&nbsp;
    <strong>Éco :</strong>
    <?= $currentTrip['ecologique'] ? 'Oui' : 'Non' ?>
  </p>

  <a href="trip_detail.php?id=<?= (int)$currentTrip['trip_id'] ?>" class="btn">
    Voir le détail
  </a>
</div>
