document.getElementById("login-form").addEventListener("submit", function (e) {

    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (!email || !password) {
        alert("Veuillez remplir les champs.");
        return;
    }

    fetch(
        'php/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = "./index.php"; // redirection propre
            } else {
                alert("Identifiants incorrects");
            }
        });
});