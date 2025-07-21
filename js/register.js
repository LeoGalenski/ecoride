document.getElementById('register-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const pseudo = document.getElementById('pseudo').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const chauffeur = document.getElementById('chauffeur').checked ? 1 : 0;
    const passager = document.getElementById('passager').checked ? 1 : 0;

    if (!pseudo || !email || !password) {
        alert("Tous les champs obligatoires doivent être remplis.");
        return;
    }

    fetch('php/register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `pseudo=${encodeURIComponent(pseudo)}
        &email=${encodeURIComponent(email)}
        &password=${encodeURIComponent(password)}
        &chauffeur=${chauffeur}
        &passager=${passager}`
    })
        .then(response => response.text())
        .then(data => {
            alert(data); // Affiche la réponse (succès ou erreur)
            // Optionnel : redirection si succès
            // window.location.href = "login.html";
        })
        .catch(error => {
            console.error("Erreur lors de l'enregistrement :", error);
        });
});
