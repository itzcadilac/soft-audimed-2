class UserRegisterForm {
    constructor(){
        this._loader = document.getElementById('loader');
        this._submitButton = document.querySelector('#user_registration_form button[type="submit"]');
        this._txt_document_number = $('#urf_document_number');
        this._txt_lastname = $('#urf_lastname');
        this._txt_names = $('#urf_names');
        this._txt_profiles = $('#urf_profile');
        this._lbl_message = $('#message');
        this._lbl_document_number_error = $('#error_num_documento');
        this._meta_csrf_token = $('meta[name="csrf_token"]');
        this._url_user_register = window.globalConfig.baseUrl + 'usuarios/registro';
    }

    get url_user_register(){
        return this._url_user_register;
    }

    /**
     * Genera los headers para enviarlos por HTTP
     * @returns {object} el objeto con los datos del Header HTTP
     */
    getHeadersHTTP() {
        return {
            'X-CSRF-TOKEN': this._meta_csrf_token.attr('content')
        };
    }

    /**
     * Genera un nuevo usuario en base a la informacion ingresada en el formulario
     * @returns {user} El objeto a registrar 
     */
    getNewUserObject() {
        console.log("Nuevo Objeto User Form");
        return {
            document_number: this._txt_document_number.val(),
            lastname: this._txt_lastname.val(),
            names: this._txt_names.val(),
            profile: this._txt_profiles.val()
        }
    }

    /**
     * Permite iniciar el proceso de envio del formulario.
     * Muestra el "loader" y deshabilita el botón "Registrar"
     */
    startSendProcess() {
        this._loader.style.display = 'flex';
        this._submitButton.disabled = true;
    }

    /**
     * Permite finalizar el proceso de envio del formulario.
     * Oculta el "loader" y habilita el botón "Registrar" después de completar la solicitud
     */
    endSendProcess() {
        this._loader.style.display = 'none';
        this._submitButton.disabled = false;
    }

    /**
     * Limpia los inputs del formulario
     */
    clearFields() {
        this._txt_document_number.val('');
        this._txt_lastname.val('');
        this._txt_names.val('');
        this._txt_profiles.val('');
    }

    /**
     * Permite mostrar un mensaje de error en pantalla
     * @param {String} message 
     */
    showErrorMessage(message) {
        this._lbl_message.html('<div class="alert alert-danger">' + message + '</div>');
    }

    /**
     * Permite mostrar un mensaje de exito en pantalla
     * @param {String} message 
     */
    showSuccessMessage(message) {
        this._lbl_message.html('<div class="alert alert-success">' + message + '</div>');
    }

    /**
     * Permite actualizar el Hash de HTML
     * @param {String} hash 
     */
    updateHtmlHash(hash) {
        this._meta_csrf_token.attr('content', hash);
    }
}

export {UserRegisterForm};