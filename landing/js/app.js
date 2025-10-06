document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        const nombre = document.getElementById('nombre').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const fechaNacimiento = document.getElementById('fecha_nacimiento').value;
        
        if (nombre === '') {
            alert('Por favor ingresa tu nombre');
            return;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Por favor ingresa un correo electrónico válido');
            return;
        }
    
        const uppercaseCount = (password.match(/[A-Z]/g) || []).length;
        const digitCount = (password.match(/\d/g) || []).length;
        const specialCharCount = (password.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>/?]/g) || []).length;
        
        if (password.length < 8) {
            alert('La contraseña debe tener al menos 8 caracteres');
            return;
        }
        
        if (uppercaseCount < 2) {
            alert('La contraseña debe contener al menos 2 letras mayúsculas');
            return;
        }
        
        if (digitCount < 1) {
            alert('La contraseña debe contener al menos 1 número');
            return;
        }
        
        if (specialCharCount < 1) {
            alert('La contraseña debe contener al menos 1 carácter especial (ej. !@#$%^&*)');
            return;
        }
        
        if (!fechaNacimiento) {
            alert('Por favor ingresa tu fecha de nacimiento');
            return;
        }
        
        const fechaNac = new Date(fechaNacimiento);
        const hoy = new Date();
        const edad = hoy.getFullYear() - fechaNac.getFullYear();
        const mes = hoy.getMonth() - fechaNac.getMonth();
        
        if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNac.getDate())) {
            edad--; 
        }
        
        if (edad < 18) {
            alert('Debes ser mayor de 17 años para registrarte');
            return;
        }
        
        alert('¡Registro exitoso!');
        form.reset();
    });
});