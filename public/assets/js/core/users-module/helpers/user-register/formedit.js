import { FormUtilities } from "../../../utilities/form-utilities.js";
import { LogUtilities as logger } from "../../../utilities/log-utilities.js";

class UserEditForm {
    constructor() {
        this._submit_button = document.querySelector('#user_registration_form button[type="submit"]');
        this._txt_iduser = $('#urf_iduser');
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
        this._url_user_edit = window.globalConfig.baseUrl + 'usuarios/editar';
    }

    get url_user_edit() {
        return this._url_user_edit;
    }

    get lblMessage() {
        return this._lbl_message;
    }

    get elementHash() {
        return this._meta_csrf_token;
    }

    get selectDocumentType() {
        return {
            field: this._sel_document_type,
            type: "select",
            required: true,
            validation: null
        };
    }

    get inputDocumentNumber() {
        return {
            field: this._txt_document_number,
            type: "text",
            required: true,
            validation: this.regexDocumentNumberByDocumentType()
        };
    }

    get inputLastName() {
        return {
            field: this._txt_lastname,
            type: "text",
            required: true,
            validation: /^[a-zA-Z\s]+$/
        };
    }

    get inputNames() {
        return {
            field: this._txt_names,
            type: "text",
            required: true,
            validation: /^[a-zA-Z\s]+$/
        };
    }

    get inputUsername() {
        return {
            field: this._txt_username,
            type: "text",
            required: true,
            validation: /^[a-zA-Z0-9_-]{3,}$/
        };
    }

    get inputEmail() {
        return {
            field: this._txt_email,
            type: "text",
            required: true,
            validation: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
        };
    }

    get selectProfile() {
        return {
            field: this._sel_profiles,
            type: "select",
            required: true,
            validation: null
        };
    }

    get inputIduser() {
        return this._txt_iduser;
    }

    /**
     * Define los inputs que componen el formulario ademas de sus validaciones.
     * @returns {array} un arreglo con los inputs del formulario.
     */
    inputFields() {
        return [
            this.inputIduser,
            this.selectDocumentType,
            this.inputDocumentNumber,
            this.inputLastName,
            this.inputNames,
            this.inputUsername,
            this.inputEmail,
            this.selectProfile
        ];
    }

    get data(){
        return {
            iduser: this.inputIduser.val(),
            document_type: this.selectDocumentType.field.val(),
            document_number: this.inputDocumentNumber.field.val(),
            lastname: this.inputLastName.field.val(),
            names: this.inputNames.field.val(),
            username: this.inputUsername.field.val(),
            email: this.inputEmail.field.val(),
            profile: this.selectProfile.field.val()
        };
    }

    /**
     * Permite generar un regex personalizado para validar el numero de documento segun el tipo
     * @returns 
     */
    regexDocumentNumberByDocumentType() {
        const inputSize = this.selectDocumentType.field.find("option:selected").attr("input-size");

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
        return this.data;
    }

    /**
     * Permite iniciar el proceso de envio del formulario.
     */
    startSendProcess(message = "Inicia el proceso de actualización de usuario.") {
        logger.info(message);
        FormUtilities.launchLoader();
        this._submit_button.disabled = true;
    }

    /**
     * Permite finalizar el proceso de envio del formulario.
     */
    endSendProcess(message = "Se finaliza el proceso de actualización de usuario.") {
        FormUtilities.stopLoader();
        this._submit_button.disabled = false;
        logger.info(message);
    }

    /**
     * Valida los inputs del formulario.
     * @returns {boolean} el resultado de la validación.
     */
    isValid() {
        return FormUtilities.validate("Edición de usuario", this.inputFields());
    }
}

export { UserEditForm };