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


// Manejo del formulario
document.getElementById("passwordRecoveryForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el reinicio de la página

    const isValid = validateForm("passwordRecoveryForm", ["identity_number", "email"]);

    if (isValid) {
        setRecoverPassword(); // Llamar a la función de envío solo si la validación es exitosa
    }
});


function validateForm(formId, fields) {
    const form = document.getElementById(formId);
    let valid = true;

    // Eliminar mensajes de error previos
    document.querySelectorAll('.error-message').forEach(el => el.remove());

    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field.value.trim() === '') {
            showError(field, `El campo ${field.previousElementSibling.innerText} es obligatorio.`);
            valid = false;
        }
    });

    return valid;
}

function showError(field, message) {
    const error = document.createElement('small');
    error.classList.add('error-message', 'text-danger');
    error.innerText = message;
    field.parentElement.appendChild(error);
}


function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function setRecoverPassword(){

    const form = document.getElementById('passwordRecoveryForm');

    const formData = new FormData(form);
    const jsonData = {};

    // Convertir FormData a JSON
    formData.forEach((value, key) => {
        jsonData[key] = value;
    });

    fetchData({
        url: window.globalConfig.baseUrl + 'password-recovery/request',
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: jsonData, // Enviar como JSON,
        onStart: () => inicio(),
        onSuccess: (data) => confirmSendLink(data),
        onError: (error) => mensajeError(error.message)
    });
}

function confirmSendLink(data){

    if(data.status == 'error'){
        handleErrorResponse(data);
    }else{
        showUsers(data);
    }

}

function handleErrorResponse(response) {
    const errorDiv = document.getElementById("error-div");
    const errorMessage = document.getElementById("error-message");

    if (response.status === "error") {
        errorMessage.textContent = response.message; // Mostrar el mensaje
        errorDiv.style.display = "block"; // Hacer visible el div de error

        setTimeout(() => {
            errorDiv.style.display = "none";
        }, 5000); // Se oculta después de 5 segundos

    } else {
        errorDiv.style.display = "none"; // Ocultar si no hay error
    }
}

function showUsers(data){
    const divUserSelect = document.getElementById("divUserSelect");
    const userSelect = document.getElementById("userSelect");
    const message = document.getElementById("message");
    const recoveryForm = document.getElementById("passwordRecoveryForm");
    const submitButton = recoveryForm.querySelector("button");
    const cuentas = data.data;

    if (cuentas.length > 1) {
        divUserSelect.style.display = "block"; // Mostrar select
        cuentas.forEach((cuenta) => {
            let option = document.createElement("option");
            option.value = cuenta.idusuario;
            option.textContent = cuenta.usuario;
            userSelect.appendChild(option);
        });
    } else {
        // Si solo tiene 1 cuenta, se asigna automáticamente
        document.getElementById('passwordRecoveryForm').reset();
        Swal.fire({
            title: "Cerrar",
            text: "Se envió el correo de recuperación, revisar su bandeja de correo. Serás redirigido al inicio en 5 segundos...",
            icon: "success",
            showConfirmButton: false, // Oculta el botón
            timer: 5000, // Tiempo en milisegundos (3 segundos)
            timerProgressBar: true // Muestra la barra de progreso
        });
    
        setTimeout(() => {
            window.location.href = window.globalConfig.baseUrl+'login';
        }, 3000);
        //userSelect.innerHTML = `<option value="${cuentas[0]}" selected>${cuentas[0]}</option>`;
    }
}



//Validacion de contraseña
/*
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('resetPasswordForm'); 

    if (form) {
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            let regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%&*]).{6,20}$/;
            
            if (!regex.test(password)) {
                alert("La contraseña debe contener al menos una mayúscula, una minúscula, un número y un carácter especial.");
                return;
            }
            
            if (password !== confirmPassword) {
                alert("Las contraseñas no coinciden.");
                return;
            }
            
            alert("Contraseña actualizada correctamente.");
        });
    }

});
*/

