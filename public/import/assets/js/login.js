const signUpButton = document.getElementById('signUp')
const signInButton = document.getElementById('signIn')
const container = document.getElementById('container')

signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active")
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active")
});


const gerantButton = document.getElementById('gerantButton');
const fournisseurButton = document.getElementById('fournisseurButton');
const technicienButton = document.getElementById('technicienButton');

gerantButton.addEventListener('click', () => {
  localStorage.setItem('role', 'gerant');
  window.location.href = 'signup-gerant.html';
});

fournisseurButton.addEventListener('click', () => {
  localStorage.setItem('role', 'fournisseur');
  window.location.href = 'signup-fournisseur.html';
});

technicienButton.addEventListener('click', () => {
  localStorage.setItem('role', 'technicien');
  window.location.href = 'signup-technicien.html';
});



