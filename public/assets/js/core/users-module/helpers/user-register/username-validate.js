import { FormUtilities } from "../../../utilities/form-utilities.js";
import { UserRegisterForm } from "./form.js";

class UsernameValidate extends UserRegisterForm {
    constructor() {
        super();
        this._url_validate_username = window.globalConfig.baseUrl + 'usuarios/valida/nombreusuario';
    }

    get url_validate_username() {
        return this._url_validate_username;
    }

    inputFields() {
        return [super.inputUsername];
    }

    startValidateProcess() {
        super.startSendProcess("Inicia el proceso de validacion del nombre de usuario.");
    }

    endValidateProcess() {
        super.endSendProcess("Se finaliza el proceso de validacion del nombre de usuario.");
    }

    isValid() {
        return FormUtilities.validate("Validación del nombre de usuario", this.inputFields());
    }
};

export { UsernameValidate };