import { UserRegisterForm } from './helpers/user-register-form.js';

$(document).ready(function () {
    $('#user_registration_form').on('submit', function (event) {
        // Evitar que se envíe el formulario tradicional
        event.preventDefault();
        console.log("Vamos a crear un nuevo UserRegisterForm");
        let form = new UserRegisterForm();
        console.log(form);
        let newUser = form.getNewUserObject();

        form.startSendProcess();

        // Validar datos antes de enviarlos
        if (newUser.document_number === '') {
            form.showErrorMessage("Por favor, complete todos los campos.");
            form.endSendProcess();
            return;
        }

        // Ejecutamos el servicio de registro de usuarios
        $.ajax({
            url: form.url_user_register,
            method: 'POST',
            data: newUser,
            headers: form.getHeadersHTTP(),
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    form.updateHtmlHash(response.csrf_hash_gen);
                    form.showSuccessMessage(response.message);
                    form.clearFields();
                } else {
                    form.showErrorMessage(response.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseJSON;

                if (response && response.message) {
                    form.updateHtmlHash(response.csrf_hash_gen);

                    if (response.message.num_documento) {
                        form.showErrorMessage(response.message.num_documento);
                    }
                } else {
                    form.showErrorMessage("Hubo un error en la solicitud.");
                }
            },
            complete: function () {
                form.endSendProcess();
            }
        });
    });
});