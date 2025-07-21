// js/create_trip.js
document.getElementById('create-trip-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const form = e.target;
  const data = new URLSearchParams(new FormData(form));

  fetch('php/trip_create.php', {
    method: 'POST',
    body: data
  })
    .then(res => res.json())
    .then(json => {
      const msg = document.getElementById('message-create');
      if (json.success) {
        msg.textContent = 'Trajet créé avec succès !';
        msg.style.color = 'green';
        // redirection après 1s vers la liste des trajets
        setTimeout(() => window.location.href = 'trips.php', 1000);
      } else {
        msg.textContent = 'Erreur : ' + (json.error || 'Impossible de créer le trajet');
        msg.style.color = 'red';
      }
    })
    .catch(err => console.error(err));
});
