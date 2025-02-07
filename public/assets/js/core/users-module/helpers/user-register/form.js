import { FormUtilities } from "../../../utilities/form-utilities.js";
import { LogUtilities as logger } from "../../../utilities/log-utilities.js";

class UserRegisterForm {
    constructor() {
        this._submitButton = document.querySelector('#user_registration_form button[type="submit"]');
        this._sel_document_type = $('#urf_document_type');
        this._txt_document_number = $('#urf_document_number');
        this._txt_lastname = $('#urf_lastname');
        this._txt_names = $('#urf_names');
        this._txt_username = $('#urf_username');
        this._txt_email = $('#urf_email');
        this._sel_profiles = $('#urf_profile');
        this._lbl_message = $('#message');
        this._lbl_document_number_error = $('#error_num_documento');
        this._meta_csrf_token = $('meta[name="csrf_token"]');
        this._url_user_register = window.globalConfig.baseUrl + 'usuarios/registro';
    }

    get url_user_register() {
        return this._url_user_register;
    }

    get lblMessage() {
        return this._lbl_message;
    }

    get elementHash() {
        return this._meta_csrf_token;
    }

    /**
     * Define los inputs que componen el formulario ademas de sus validaciones.
     * @returns {array} un arreglo con los inputs del formulario.
     */
    inputFields() {
        return [
            { field: this._sel_document_type, type: "select", required: true, validation: null },
            { field: this._txt_document_number, type: "text", required: true, validation: this.regexDocumentNumberByDocumentType() },
            { field: this._txt_lastname, type: "text", required: true, validation: /^[a-zA-Z\s]+$/ },
            { field: this._txt_names, type: "text", required: true, validation: /^[a-zA-Z\s]+$/ },
            { field: this._txt_username, type: "text", required: true, validation: /^[a-zA-Z0-9_-]{8,}$/ },
            { field: this._txt_email, type: "text", required: true, validation: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ },
            { field: this._sel_profiles, type: "select", required: true, validation: null }
        ];
    }

    /**
     * Permite generar un regex personalizado para validar el numero de documento segun el tipo
     * @returns 
     */
    regexDocumentNumberByDocumentType() {
        const inputSize = this._sel_document_type.find("option:selected").attr("input-size");

        if (!inputSize || isNaN(inputSize)) {
            logger.warn("El atributo input-size para validar el numero de documento no es válido.");
            return null;
        }

        return new RegExp(`^\\d{${inputSize}}$`);
    }

    /**
     * Genera los headers para enviarlos por HTTP.
     * @returns {object} el objeto con los datos del Header HTTP.
     */
    getHeadersHTTP() {
        return {
            'X-CSRF-TOKEN': this._meta_csrf_token.attr('content')
        };
    }

    /**
     * Genera un nuevo usuario en base a la informacion ingresada en el formulario.
     * @returns {user} El objeto a registrar.
     */
    getNewUserObject() {
        return {
            document_type: this._sel_document_type.val(),
            document_number: this._txt_document_number.val(),
            lastname: this._txt_lastname.val(),
            names: this._txt_names.val(),
            username: this._txt_username.val(),
            email: this._txt_email.val(),
            profile: this._sel_profiles.val()
        }
    }

    /**
     * Permite iniciar el proceso de envio del formulario.
     */
    startSendProcess() {
        logger.info("Inicia el proceso de registro de usuario.");
        FormUtilities.launchLoader();
        this._submitButton.disabled = true;
    }

    /**
     * Permite finalizar el proceso de envio del formulario.
     */
    endSendProcess() {
        FormUtilities.stopLoader();
        this._submitButton.disabled = false;
        logger.info("Se finaliza el proceso de registro de usuario.");
    }

    /**
     * Valida los inputs del formulario.
     * @returns {boolean} el resultado de la validación.
     */
    isValid() {
        return FormUtilities.validate("Registro de usuarios", this.inputFields());
    }
}

export { UserRegisterForm };