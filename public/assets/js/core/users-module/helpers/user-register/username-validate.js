import { FormUtilities } from "../../../utilities/form-utilities.js";
import { LogUtilities as logger } from "../../../utilities/log-utilities.js";

class UsernameValidate {
    constructor(){
        this._submitButton = document.querySelector('#user_registration_form button[type="submit"]');
        this._txt_username = $('#urf_username');
        this._txt_email = $('#urf_email');
        this._url_validate_username = window.globalConfig.baseUrl + 'usuarios/valida/nombreusuario';
    }

    get txt_email() {
        return this._txt_email;
    }

    get url_validate_username(){
        return this._url_validate_username;
    }

    get field(){
        return {
            username: this._txt_username.val()
        };
    }

    get txt_username(){
        return this._txt_username;
    }

    inputFields(){
        return [
            { field: this._txt_username, type: "text", required: true, validation: /^[a-zA-Z0-9_-]{3,}$/ }
        ];
    }

    startValidateProcess() {
        logger.info("Inicia el proceso de validacion del nombre de usuario.");
        FormUtilities.launchLoader();
        this._submitButton.disabled = true;
    }

    endValidateProcess() {
        FormUtilities.stopLoader();
        this._submitButton.disabled = false;
        logger.info("Se finaliza el proceso de validacion del nombre de usuario.");
    }

    isValid() {
        return FormUtilities.validate("Validación del nombre de usuario", this.inputFields());
    }
};

export {UsernameValidate};