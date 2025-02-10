import { LogUtilities as logger } from "./log-utilities.js";

/**
 * Contiene utilitarios para realizar algun tipo de accion generica en formularios
 */
class FormUtilities {
    /**
     * Permite iniciar el proceso de envio del formulario.
     * Muestra el "loader" y deshabilita el botón "Registrar".
     */
    static launchLoader() {
        document.getElementById('loader').style.display = 'flex';
    }

    /**
     * Permite finalizar el proceso de envio del formulario.
     * Oculta el "loader" y habilita el botón "Registrar" después de completar la solicitud.
     */
    static stopLoader() {
        document.getElementById('loader').style.display = 'none';
    }

    /**
     * Limpia los campos de un formulario
     * @param {Array<{field: jQuery, type: string, required?: boolean, validation?: RegExp, message?: string}>} inputs - campos a limpiar
     */
    static clearFields(inputs) {
        const allowedTypes = { text: "", select: "-1" };
        inputs.forEach(({ field, type }) => allowedTypes[type] !== undefined && field.val(allowedTypes[type]));
    }

    /**
     * Elimina los estilos de validacion (valido, invalido)
     * @param {Array<{field: jQuery, type: string, required?: boolean, validation?: RegExp, message?: string}>} inputs - campos a limpiar
     */
    static clearValidations(inputs) {
        inputs.forEach(({field}) => {
            if (field instanceof jQuery) {
                field.removeClass("is-invalid is-valid")
            }
        });
    }

    /**
     * Bloquea los campos de un formulario
     * @param {Array<{field: jQuery, type: string, required?: boolean, validation?: RegExp, message?: string}>} inputs - campos a bloquear
     */
    static blockFields(inputs) {
        inputs.forEach(({ field }) => {
            if (field instanceof jQuery) {
                field.prop('readonly', true);
            }
        });
    }

    /**
     * Invalida campos de un formulario
     * @param {jQuery} input - Elemento de tipo jQuery que sera invalidado
     */
    static invalidField(input) {
        if (input instanceof jQuery) {
            input.addClass("is-invalid");
        } else {
            logger.error("FormUtilities -> invalidField(..): El parámetro 'input' no es un objeto jQuery válido");
        }
    }

    /**
     * Valida campos de un formulario
     * @param {jQuery} input - Elemento de tipo jQuery que sera validado
     */
    static validField(input) {
        if (input instanceof jQuery) {
            input.addClass("is-valid");
        } else {
            logger.error("FormUtilities -> validField(..): El parámetro 'input' no es un objeto jQuery válido");
        }
    }

    /**
     * Muestra un mensaje de error personalizado en un campo del formulario
     * @param {jQuery} input Elemento de tipo jQuery en el que se mostrara el mensaje
     */
    static customError(input, message) {
        if (input instanceof jQuery) {
            input.siblings(".invalid-feedback").text(message);
        } else {
            logger.error("FormUtilities -> customError(..): El parámetro 'input' no es un objeto jQuery válido");
        }
    }

    /**
     * Desbloquea los campos de un formulario
     * @param {Array<{field: jQuery, type: string, required?: boolean, validation?: RegExp, message?: string}>} inputs - campos a bloquear
     */
    static unblockFields(inputs) {
        inputs.forEach(({ field }) => {
            if (field instanceof jQuery) {
                field.prop('readonly', false);
            } else {
                logger.error("FormUtilities -> unblockFields(..): El parámetro 'input' no es un objeto jQuery válido");
            }
        });
    }

    /**
     * Establece el foco en un campo de entrada (input).
     * @param {jQuery} input Elemento de tipo jQuery en el que se establecerá el foco
     */
    static focus(input) {
        if (input instanceof jQuery) {
            input.focus();
        } else {
            logger.error("FormUtilities -> focus(..): El parámetro 'input' no es un objeto jQuery válido");
        }
    }

    /**
     * Valida los campos de un formulario
      * @param {string} formName - Nombre del formulario
      * @param {Array<{field: jQuery, type: string, required?: boolean, validation?: RegExp, message?: string}>} inputs - arreglo de campos a validar
      * @returns {boolean} Estado de la validación (true si es válido, false si hay errores)
     */
    static validate(formName, inputs) {
        let validated = true;
        logger.group(`Validando formulario -> ${formName}`);

        const validateField = (field, isValid, errorMessage) => {
            field.removeClass("is-invalid is-valid");
            if (isValid) {
                field.addClass("is-valid");
            } else {
                validated = false;
                field.addClass("is-invalid")
                logger.log(`${field.attr("name")}, ${errorMessage}`);
            }
        }

        inputs.forEach(({ field, type, required, validation }) => {
            if (!(field instanceof jQuery)) return;

            let value = field.val()?.trim() || "";

            if (type === "text") {
                if (required && value === "") {
                    validateField(field, false, "es un valor requerido");
                    return;
                }
                if (validation && value.length > 0 && !validation.test(value)) {
                    validateField(field, false, "no cumple con el formato");
                    return;
                }
            }

            if (type === "select") {
                if (required && value === "-1") {
                    validateField(field, false, "es un valor requerido");
                    return;
                }
            }

            validateField(field, true);
        });
        logger.groupEnd();
        return validated;
    }
}

export { FormUtilities };