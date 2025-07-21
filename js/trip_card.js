document.addEventListener('DOMContentLoaded', () => {
  const overlay = document.getElementById('modal-overlay');
  const modal   = document.getElementById('modal');
  const close   = document.getElementById('modal-close');

  // Ouvre la modal et injecte les données
  document.querySelectorAll('.trip-card .view-details').forEach(btn => {
    btn.addEventListener('click', () => {
      const card = btn.closest('.trip-card');
      const trip = JSON.parse(card.getAttribute('data-trip'));

      // Remplissage des champs
      document.getElementById('detail-vehicle')
              .textContent = `${trip.marque} ${trip.modele}`;
      document.getElementById('detail-eco')
              .textContent = trip.ecologique ? 'Oui' : 'Non';
      document.getElementById('detail-datetime')
              .textContent = `${trip.date_start} à ${trip.time_start}`;
      document.getElementById('detail-start')
              .textContent = trip.location_start;
      document.getElementById('detail-end')
              .textContent = trip.location_end;

      // Affichage
      overlay.classList.remove('hidden');
      modal.classList.remove('hidden');
    });
  });

  // Ferme la modal
  [overlay, close].forEach(el => el.addEventListener('click', () => {
    overlay.classList.add('hidden');
    modal.classList.add('hidden');
  }));
});
