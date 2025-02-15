import { UserRegisterForm } from './helpers/user-register/form.js';
import { DocumentValidate } from './helpers/user-register/document-validate.js';
import { UsernameValidate } from './helpers/user-register/username-validate.js';
import { UserRegisterRequestHttp as HttpRequest } from './helpers/user-register/request-http.js';
import { FormUtilities } from '../utilities/form-utilities.js';
import { LogUtilities as Logger } from '../utilities/log-utilities.js';

$(document).ready(function () {
    $('#urf_document_type').focus();

    $('#user_registration_form').on('submit', function (event) {
        // Evitar que se envíe el formulario tradicional
        event.preventDefault();
        // Se obtiene una instancia del formulario
        let userRegisterForm = new UserRegisterForm();
        // Lanzamos el Load
        userRegisterForm.startSendProcess();
        // Validar datos antes de enviarlos
        if (!userRegisterForm.isValid()) {
            userRegisterForm.endSendProcess();
            return;
        }
        // Ejecutamos el servicio de registro de usuarios
        HttpRequest.send(userRegisterForm);
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
            return;
        }
        // Validamos si el tipo de documento seleccionado esta habilitado para
        // buscar informacion en el core
        if (allowedDocumentType.includes(documentValidate.data.document_type)) {
            // Lanzamos el Load
            documentValidate.startValidateProcess();
            // Solicitamos la validacion del core
            HttpRequest.validateDocument(documentValidate);
        }
    });

    $('#urf_document_type').on("change", function() {
        Logger.log("Se cambio el tipo de documento");
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
        HttpRequest.validateUsername(usernameValidate);
    });

    $("#user_registration_form").on("keydown", "input, select, textarea", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();

            let fields = $(this).closest("form").find("input, select, textarea");
            let index = fields.index(this);

            if (index >= 0 && index < fields.length - 1) {
                fields.eq(index + 1).focus();
            }
        }
    });
});