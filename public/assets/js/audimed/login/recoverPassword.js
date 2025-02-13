
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
    
    var csrfToken = $('meta[name="csrf_token"]').attr('content');

    const formData = new FormData(form);
    const jsonData = {};

    // Convertir FormData a JSON
    formData.forEach((value, key) => {
        jsonData[key] = value;
    });

    fetchData({
        url: window.globalConfig.baseUrl + 'recoverPassword',
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
        body: jsonData, // Enviar como JSON,
        onStart: () => inicio(),
        onSuccess: (data) => console.log('ok'),
        onError: (error) => mensajeError(error.message)
    });
}




