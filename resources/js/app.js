import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all';

// Menu déroulant
document.querySelectorAll('.dropdown-toggle').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    const parent = e.target.closest('.dropdown');
    parent.classList.toggle('show');
  });
});

// Fermer les menus au clic extérieur
document.addEventListener('click', e => {
  if (!e.target.closest('.dropdown')) {
    document.querySelectorAll('.dropdown').forEach(dropdown => {
      dropdown.classList.remove('show');
    });
  }
});