class MessageUtilities {
    /**
     * Permite mostrar un mensaje de error en pantalla.
     * @param {html} element etiqueta del formulario donde se mostrara el mensaje
     * @param {String} message mensaje que se mostrará en pantalla
     */
    static showErrorMessage(element, message) {
        element.html('<div class="alert alert-danger mt-3">' + message + '</div>');
    }

    /**
     * Permite mostrar un mensaje de exito en pantalla.
     * @param {html} element etiqueta del formulario donde se mostrara el mensaje
     * @param {String} message mensaje que se mostrará en pantalla
     */
    static showSuccessMessage(element, message) {
        element.html('<div class="alert alert-success mt-3">' + message + '</div>');
    }
}

export {MessageUtilities};