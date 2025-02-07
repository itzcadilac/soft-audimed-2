import { UserRegisterForm } from './helpers/user-register/form.js';
import { DocumentValidate } from './helpers/user-register/document-validate.js';
import { UsernameValidate } from './helpers/user-register/username-validate.js';
import { UserRegisterRequestHttp } from './helpers/user-register/request-http.js';
import { FormUtilities } from '../utilities/form-utilities.js';
import { LogUtilities as logger } from '../utilities/log-utilities.js';

$(document).ready(function () {
    $('#user_registration_form').on('submit', function (event) {
        // Evitar que se envíe el formulario tradicional
        event.preventDefault();
        // Se obtiene una instancia del formulario
        let form = new UserRegisterForm();
        // Lanzamos el Load
        form.startSendProcess();
        // Validar datos antes de enviarlos
        if (!form.isValid()) {
            form.endSendProcess();
            return;
        }
        // Obtenemos el objeto Nuevo Usuario
        let newUser = form.getNewUserObject();
        // Ejecutamos el servicio de registro de usuarios
        UserRegisterRequestHttp.send(form, newUser);
    });

    $('#urf_document_number').on('blur', function () {
        // Tipos de documento que deben consultar datos en el core
        // 1 - DNI (Documento Nacional de Identidad)
        // 2 - CEE (Carnet de Extranjería)
        const allowedDocumentType = ["1", "2"];
        // Se obtiene una instancia del formulario
        let documentValidate = new DocumentValidate();
        // validamos los campos requeridos
        if (!documentValidate.isValid()) {
            //documentValidate.endValidateProcess();
            return;
        }
        // Validamos si el tipo de documento seleccionado esta habilitado para
        // buscar informacion en el core
        if (allowedDocumentType.includes(documentValidate.field.documentType)) {
            // Lanzamos el Load
            documentValidate.startValidateProcess();
            // Solicitamos la validacion del core
            UserRegisterRequestHttp.validateDocument(documentValidate);
        }
    });

    $('#urf_document_type').on("change", function() {
        logger.log("Se cambio el tipo de documento");
        // Se obtiene una instancia del formulario
        let documentValidate = new DocumentValidate();
        // Se limpian los campos del formulario para ingresar nuevos datos
        const inputs = documentValidate.inputChangeDocumentType();
        FormUtilities.clearFields(inputs);
        FormUtilities.unblockFields(inputs);
    });

    $('#urf_username').on("blur", function(){
        // Se obtiene una instancia del formulario
        let usernameValidate = new UsernameValidate();
        if(!usernameValidate.isValid()){
            return;
        }
        usernameValidate.startValidateProcess();
        UserRegisterRequestHttp.validateUsername(usernameValidate);
    });
});