import { MessageUtilities } from "../../../utilities/message-utilities.js";
import { HtmlUtilities } from "../../../utilities/html-utilities.js";
import { FormUtilities } from "../../../utilities/form-utilities.js";
import { LogUtilities as logger } from "../../../utilities/log-utilities.js";

/**
 * Clase para gestionar las peticiones HTTP al core de negocio
 */
class UserRegisterRequestHttp {
    /**
     * Permite invocar al servicio de Registro de Usuarios.
     * @param {UserRegisterForm} form instancia del formulario de registro
     * @param {{document_type: number, document_number: string, lastname: string, names: string, username: string, email: string, profile: number}} newUser objeto usuario que se enviara al servicio
     */
    static send(form, newUser) {
        logger.logObject("Usuario a registrar", newUser);
        $.ajax({
            url: form.url_user_register,
            method: 'POST',
            data: newUser,
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
     * @param {DocumentValidate} documentForm - instancia del formulario que contiene los campos a validar
     */
    static validateDocument(documentForm) {
        $.ajax({
            url: `${documentForm.url_validate_document}/${documentForm.field.documentType}/${documentForm.field.documentNumber}`,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    documentForm.txt_lastname.val(`${response.data.apepaterno} ${response.data.apematerno}`);
                    documentForm.txt_names.val(response.data.nombres);
                    FormUtilities.clearValidations(documentForm.inputSetFields());
                    FormUtilities.blockFields(documentForm.inputSetFields());
                    FormUtilities.focus(documentForm.txt_username);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseJSON;
                if (response && response.message) {
                    logger.error(response.message);
                } else {
                    logger.error("Hubo un error en la solicitud.");
                }
                FormUtilities.unblockFields(documentForm.inputSetFields());
                FormUtilities.clearFields(documentForm.inputSetFields());
                FormUtilities.focus(documentForm.txt_lastname);
            },
            complete: function () {
                documentForm.checkFieldsValid();
                documentForm.endValidateProcess();
            }
        });
    }

    static validateUsername(usernameForm) {
        $.ajax({
            url: `${usernameForm.url_validate_username}/${usernameForm.field.username}`,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    logger.log("Usuario encontrado, el usuario ya existe");
                    FormUtilities.invalidField(usernameForm.txt_username);
                    FormUtilities.customError(usernameForm.txt_username, "El usuario ingresado ya existe!!");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseJSON;
                if (response && response.message) {
                    logger.log(response.message);
                } else {
                    logger.error("No se pudo comprobar si el usuario existe");
                }
                FormUtilities.clearValidations(usernameForm.inputFields());
                FormUtilities.validField(usernameForm.txt_username);
                FormUtilities.focus(usernameForm.txt_email);
            },
            complete: function () {
                usernameForm.endValidateProcess();
            }
        });
    }
}

export { UserRegisterRequestHttp };