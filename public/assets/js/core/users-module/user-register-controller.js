import { UserRegisterForm } from './helpers/user-register/form.js';
import { UserRegisterRequestHttp } from './helpers/user-register/request-http.js';

$(document).ready(function () {
    $('#user_registration_form').on('submit', function (event) {
        // Evitar que se envíe el formulario tradicional
        event.preventDefault();
        
        // Se obtiene una instancia del formulario
        let form = new UserRegisterForm();
        let newUser = form.getNewUserObject();

        form.startSendProcess();

        // Validar datos antes de enviarlos
        if (newUser.document_number === '') {
            form.showErrorMessage("Por favor, complete todos los campos.");
            form.endSendProcess();
            return;
        }

        // Ejecutamos el servicio de registro de usuarios
        UserRegisterRequestHttp.send(form, newUser);
    });
});