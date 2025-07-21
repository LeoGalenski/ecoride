<?php

require_once 'php/session_check.php';
require_once 'php/connect.php';


$userId = $_SESSION['user_id'];
$stmt = $connect->prepare("
  SELECT id, trip_id, driver_id, vehicle_id, date_start, time_start, location_start, location_end, date_end, time_end, seats, ecologique, price
  FROM archive
  WHERE id = ?
");

$stmt->execute([$userId]);
$history = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

            <div class="history">
                <?php foreach ($history as $h): ?>
                    <div class="history-card">
                        <h2><?= htmlspecialchars($h['location_start']) ?> <?= htmlspecialchars($h['location_end']) ?></h2>
                        <ul>
                            <li><strong>Date :</strong> <?= htmlspecialchars($h['date_start']) . ' '. htmlspecialchars($h['date_end']) .', '.
                            htmlspecialchars($h['time_start']). ' '. htmlspecialchars($h['time_end'])?></li>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>