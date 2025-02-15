// Mostrar el loader antes de que se recargue la página
window.addEventListener('beforeunload', function () {

    const modal = document.getElementById('modalSeleccion');

    if (modal && modal.style.display !== 'none') {
        console.log("El modal está abierto. Se cerrará antes de recargar.");
        modal.style.display = 'none'; // Oculta el modal manualmente
    }

    document.getElementById('loader').style.display = 'flex';
});

// Ocultar el loader después de que la página haya terminado de cargar
window.addEventListener('load', function () {
    document.getElementById('loader').style.display = 'none';
});



document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('resetPasswordForm');
    const newPassword = document.getElementById('newPassword');
    const confirmPassword = document.getElementById('confirmPassword');
    const passwordMessage = document.createElement('ul');
    passwordMessage.classList.add('alert', 'alert-danger', 'mt-2');
    passwordMessage.style.display = 'none';
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    
    newPassword.parentNode.appendChild(passwordMessage);

    function validatePassword(password) {
        let errors = [];

        if (password.length < 6 || password.length > 32) {
            errors.push("La contraseña debe tener entre 6 y 32 caracteres.");
        }
        if (!/[A-Z]/.test(password)) {
            errors.push("Debe contener al menos una letra mayúscula (A-Z).");
        }
        if (!/[a-z]/.test(password)) {
            errors.push("Debe contener al menos una letra minúscula (a-z).");
        }
        if (!/[0-9]/.test(password)) {
            errors.push("Debe contener al menos un número (0-9).");
        }
        if (!/[@#$%&*]/.test(password)) {
            errors.push("Debe contener al menos un carácter especial (@, #, $, %, &, *).");
        }
        if (/\s/.test(password)) {
            errors.push("No debe contener espacios en blanco.");
        }

        return errors;
    }

    newPassword.addEventListener('input', function () {
        const errors = validatePassword(newPassword.value);
        if (errors.length > 0) {
            passwordMessage.innerHTML = errors.map(error => `<li>${error}</li>`).join('');
            passwordMessage.style.display = 'block';
        } else {
            passwordMessage.style.display = 'none';
        }
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Evita el envío si hay errores

        const passwordErrors = validatePassword(newPassword.value);
        if (passwordErrors.length > 0) {
            passwordMessage.innerHTML = passwordErrors.map(error => `<li>${error}</li>`).join('');
            passwordMessage.style.display = 'block';
            return;
        }

        if (newPassword.value !== confirmPassword.value) {
            alert("Las contraseñas no coinciden. Verifique e intente nuevamente.");
            return;
        }

        // Si la validación es exitosa, se puede proceder a enviar el formulario
        //form.submit();
        setResetPassword(form);
    });

    function setResetPassword(form){

        //const form = document.getElementById('passwordRecoveryForm');
    
        const formData = new FormData(form);
        const jsonData = {};
    
        // Convertir FormData a JSON
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });
    
        fetchData({
            url: window.globalConfig.baseUrl + 'password-recovery/reset',
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: jsonData, // Enviar como JSON,
            onStart: () => inicio(),
            onSuccess: (data) => confirmLink(data),
            onError: (error) => mensajeError(error.message)
        });
    }

    function confirmLink(data) {

        document.getElementById('resetPasswordForm').reset();

        Swal.fire({
            title: "Cerrar",
            text: data.message + " Serás redirigido al inicio en 5 segundos...",
            icon: "success",
            showConfirmButton: false, // Oculta el botón
            timer: 5000, // Tiempo en milisegundos (3 segundos)
            timerProgressBar: true // Muestra la barra de progreso
        });
    
        setTimeout(() => {
            window.location.href = window.globalConfig.baseUrl+'login';
        }, 3000);
    }
    


    togglePasswordButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetInput = document.getElementById(this.getAttribute('data-target'));
            const icon = this.querySelector('i');
    
            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                targetInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });

});


