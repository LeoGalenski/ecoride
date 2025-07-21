// js/profile.js
document.getElementById('profile-form').addEventListener('submit', function(e) {
  e.preventDefault();

  const form = e.target;
  const data = new URLSearchParams(new FormData(form));

  fetch('php/update_profile.php', {
    method: 'POST',
    body: data
  })
  .then(res => res.json())
  .then(json => {
    const msg = document.getElementById('message-profile');
    if (json.success) {
      msg.textContent = 'Profil mis à jour avec succès.';
      msg.style.color = 'green';
    } else {
      msg.textContent = 'Erreur : ' + (json.error || 'Mise à jour impossible');
      msg.style.color = 'red';
    }
  })
  .catch(err => {
    console.error(err);
    const msg = document.getElementById('message-profile');
    msg.textContent = 'Erreur réseau.';
    msg.style.color = 'red';
  });
});
