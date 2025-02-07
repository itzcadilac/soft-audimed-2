import { FormUtilities } from "../../../utilities/form-utilities.js";
import { LogUtilities as logger} from "../../../utilities/log-utilities.js";

class DocumentValidate {
    constructor() {
        this._submitButton = document.querySelector('#user_registration_form button[type="submit"]');
        this._sel_document_type = $('#urf_document_type');
        this._txt_document_number = $('#urf_document_number');
        this._txt_lastname = $('#urf_lastname');
        this._txt_names = $('#urf_names');
        this._txt_username = $('#urf_username');
        this._url_validate_document = window.globalConfig.baseUrl + 'usuarios/valida/documento';
    }

    get url_validate_document() {
        return this._url_validate_document;
    }

    get txt_lastname() {
        return this._txt_lastname;
    }

    get txt_names() {
        return this._txt_names;
    }

    get txt_username() {
        return this._txt_username;
    }

    get field() {
        return {
            documentType: this._sel_document_type.val(),
            documentNumber: this._txt_document_number.val()
        };
    }

    inputValidateFields() {
        return [
            { field: this._sel_document_type, type: "select", required: true, validation: null },
            { field: this._txt_document_number, type: "text", required: true, validation: this.regexDocumentNumberByDocumentType() }
        ];
    }

    inputSetFields() {
        return [
            { field: this._txt_lastname, type: "text", required: true, validation: /^[a-zA-Z\s]+$/ },
            { field: this._txt_names, type: "text", required: true, validation: /^[a-zA-Z\s]+$/ }
        ];
    }

    inputChangeDocumentType(){
        return [
            { field: this._txt_document_number, type: "text" },
            { field: this._txt_lastname, type: "text" },
            { field: this._txt_names, type: "text" }
        ];
    }

    regexDocumentNumberByDocumentType() {
        const inputSize = this._sel_document_type.find("option:selected").attr("input-size");

        if (!inputSize || isNaN(inputSize)) {
            logger.warn("El atributo input-size para validar el número de documento no es válido.");
            return null;
        }

        return new RegExp(`^\\d{${inputSize}}$`);
    }

    startValidateProcess() {
        logger.info("Inicia el proceso de validacion del documento.");
        FormUtilities.launchLoader();
        this._submitButton.disabled = true;
    }

    endValidateProcess() {
        FormUtilities.stopLoader();
        this._submitButton.disabled = false;
        logger.info("Se finaliza el proceso de validacion del documento.");
    }

    isValid() {
        return FormUtilities.validate("Validación del documento", this.inputValidateFields());
    }

    checkFieldsValid() {
        FormUtilities.validate("Validación del documento", this.inputSetFields());
    }
}

export { DocumentValidate };