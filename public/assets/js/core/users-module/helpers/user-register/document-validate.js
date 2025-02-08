import { FormUtilities } from "../../../utilities/form-utilities.js";
import { UserRegisterForm } from "./form.js";

class DocumentValidate extends UserRegisterForm {
    constructor() {
        super();
        this._url_validate_document = window.globalConfig.baseUrl + 'usuarios/valida/documento';
    }

    get url_validate_document() {
        return this._url_validate_document;
    }

    inputValidateFields() {
        return [
            super.selectDocumentType,
            super.inputDocumentNumber
        ];
    }

    inputNameFields() {
        return [
            super.inputLastName,
            super.inputNames
        ];
    }

    inputChangeDocumentType() {
        return [
            super.inputDocumentNumber,
            super.inputLastName,
            super.inputNames
        ];
    }

    startValidateProcess() {
        super.startSendProcess("Inicia el proceso de validación del documento.");
    }

    endValidateProcess() {
        super.endSendProcess("Se finaliza el proceso de validación del documento.");
    }

    isValid() {
        return FormUtilities.validate("Validación del documento", this.inputValidateFields());
    }

    checkFieldsValid() {
        FormUtilities.validate("Validación del documento", this.inputNameFields());
    }
}

export { DocumentValidate };