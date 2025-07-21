document.getElementById('create-vehicle-form').addEventListener('submit', function (e) {
    e.preventDefault();

    // Récupération et nettoyage des valeurs
    const immatriculation = document.getElementById('immatriculation').value.trim();
    const premiereImmat = document.getElementById('premiere_immat').value;
    const marque = document.getElementById('marque').value.trim();
    const modele = document.getElementById('modele').value.trim();
    const couleur = document.getElementById('couleur').value.trim();
    const ecologique = document.getElementById('ecologique').checked ? 1 : 0;

    // Vérification des champs obligatoires
    if (!immatriculation || !premiereImmat || !marque || !modele || !couleur) {
        alert("Tous les champs obligatoires doivent être remplis.");
        return;
    }

    // Construction de la requête POST
    const body =
        `immatriculation=${encodeURIComponent(immatriculation)}` +
        `&premiere_immat=${encodeURIComponent(premiereImmat)}` +
        `&marque=${encodeURIComponent(marque)}` +
        `&modele=${encodeURIComponent(modele)}` +
        `&couleur=${encodeURIComponent(couleur)}` +
        `&ecologique=${ecologique}`;

    fetch('php/vehicle_create.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: body
    })
        .then(response => response.json())
        .then(json => {
            if (json.success) {
                alert('Véhicule ajouté avec succès !');
                // redirection vers la liste des véhicules
                window.location.href = 'vehicles.php';
            } else {
                alert('Erreur : ' + (json.error || 'Impossible d’ajouter le véhicule'));
            }
        })
        .catch(error => {
            console.error("Erreur réseau :", error);
            alert("Une erreur réseau est survenue.");
        });
});
