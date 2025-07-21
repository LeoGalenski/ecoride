<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EcoRide - Accueil</title>
    <link rel="stylesheet" href="css/styles.css">
    <script defer src="js/main.js"></script>
</head>
<body>
    
<?php include 'php/header.php'; ?>
    <main>
        <h2>Votre nouveau partenaire pour une conduite écoresponsable !</h2>
        <p>EcoRide, qu'est-ce que c'est ?</p>
        <p></p>
        <h2>Rechercher un trajet</h2>
        <form id="search-form">
            <label for="departure">Départ :</label>
            <input type="text" id="departure" required>
            <label for="arrival">Arrivée :</label>
            <input type="text" id="arrival" required>
            <label for="date">Date :</label>
            <input type="date" id="date" required>
            <button type="submit">Rechercher</button>
        </form>
    </main>
    <footer><p>&copy; 2025 EcoRide</p></footer>
</body>
</html>