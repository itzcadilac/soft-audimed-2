import { MessageUtilities } from "../../../utilities/message-utilities.js";
import { HtmlUtilities } from "../../../utilities/html-utilities.js";
import { FormUtilities } from "../../../utilities/form-utilities.js";
import { LogUtilities as Logger } from "../../../utilities/log-utilities.js";

/**
 * Clase para gestionar las peticiones HTTP al core de negocio
 */
class UserRegisterRequestHttp {
    /**
     * Permite invocar al servicio de Registro de Usuarios.
     * @param {UserRegisterForm} form instancia del formulario de registro
     * @param {{document_type: number, document_number: string, lastname: string, names: string, username: string, email: string, profile: number}} newUser objeto usuario que se enviara al servicio
     */
    static send(form) {
        Logger.logObject("Usuario a registrar", form.data);
        $.ajax({
            url: form.url_user_register,
            method: 'POST',
            data: form.data,
            headers: form.getHeadersHTTP(),
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    FormUtilities.clearFields(form.inputFields());
                    FormUtilities.clearValidations(form.inputFields());
                    HtmlUtilities.updateHtmlHash(form.elementHash, response.csrf_hash_gen);
                    MessageUtilities.showSuccessMessage(form.lblMessage, response.message);
                } else {
                    MessageUtilities.showErrorMessage(form.lblMessage, response.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                FormUtilities.clearValidations(form.inputFields());

                let response = jqXHR.responseJSON;
                if (response && response.message) {
                    HtmlUtilities.updateHtmlHash(form.elementHash, response.csrf_hash_gen);
                    MessageUtilities.showErrorMessage(form.lblMessage, response.message);
                } else {
                    MessageUtilities.showErrorMessage(form.lblMessage, "Hubo un error en la solicitud.");
                }
            },
            complete: function () {
                form.endSendProcess();
            }
        });
    }

    /**
     * Permite invocar el servicio que valida un documento por su tipo y numero
     * @param {DocumentValidate} document - instancia del formulario que contiene los campos a validar
     */
    static validateDocument(document) {
        $.ajax({
            url: `${document.url_validate_document}/${document.data.document_type}/${document.data.document_number}`,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    document.inputLastName.field.val(`${response.data.apepaterno} ${response.data.apematerno}`);
                    document.inputNames.field.val(response.data.nombres);
                    FormUtilities.clearValidations(document.inputNameFields());
                    FormUtilities.blockFields(document.inputNameFields());
                    FormUtilities.focus(document.inputUsername.field);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseJSON;
                if (response && response.message) {
                    Logger.error(response.message);
                } else {
                    Logger.error("Hubo un error en la solicitud.");
                }
                FormUtilities.unblockFields(document.inputNameFields());
                FormUtilities.clearFields(document.inputNameFields());
                FormUtilities.focus(document.txt_lastname);
            },
            complete: function () {
                document.checkFieldsValid();
                document.endValidateProcess();
            }
        });
    }

    static validateUsername(username) {
        $.ajax({
            url: `${username.url_validate_username}/${username.data.username}`,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Logger.log("Usuario encontrado, el usuario ya existe");
                    FormUtilities.invalidField(username.inputUsername.field);
                    FormUtilities.customError(username.inputUsername.field, "El usuario ingresado ya existe!!");
                    FormUtilities.focus(username.inputUsername.field);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseJSON;
                if (response && response.message) {
                    Logger.log(response.message);
                } else {
                    Logger.error("No se pudo comprobar si el usuario existe");
                }
                FormUtilities.clearValidations(username.inputFields());
                FormUtilities.validField(username.inputUsername.field);
                FormUtilities.focus(username.inputEmail.field);
            },
            complete: function () {
                username.endValidateProcess();
            }
        });
    }
}

export { UserRegisterRequestHttp };