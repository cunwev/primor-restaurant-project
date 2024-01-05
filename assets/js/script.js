// Script JavaScript para alternar la visibilidad de la contraseña

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('pass');
    var button = document.getElementById('passwordToggle');
    
    passwordInput.type = (passwordInput.type === 'password') ? 'text' : 'password';
    button.textContent = (passwordInput.type === 'password') ? 'Mostrar' : 'Ocultar';
  }