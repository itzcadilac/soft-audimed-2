$(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        event.preventDefault();  // Evitar que se envíe el formulario tradicional

        const loader = document.getElementById('loader'); // Loader
        const submitButton = document.querySelector('#registerForm button[type="submit"]'); // Botón de enviar
    
        // Mostrar el loader y deshabilitar el botón
        loader.style.display = 'flex';
        submitButton.disabled = true;

        var username = $('#num_documento').val();
        var password = $('#password').val();
        var apellidos = $('#apellidos').val();
        var nombres = $('#nombres').val();

        // Validar datos antes de enviarlos
        if (username === '' || password === '') {
            $('#message').html('<div class="alert alert-danger">Por favor, complete todos los campos.</div>');
            loader.style.display = 'none'; // Ocultar loader
            submitButton.disabled = false; // Habilitar botón
            return;
        }

        var csrfToken = $('meta[name="csrf_token"]').attr('content');

        $.ajax({
            url: window.globalConfig.baseUrl + 'usuario/registro',  // URL de tu controlador
            method: 'POST',
            data: {
                num_documento: username,
                password: password,
                apellidos: apellidos,
                nombres: nombres
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken // O enviar el token en los encabezados
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {

                    //Actualizar HASH
                    $('meta[name="csrf_token"]').attr('content', response.csrf_hash_gen);

                    // Mostrar mensaje de éxito
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');

                    // Limpiar los campos del formulario
                    $('#num_documento').val('');
                    $('#apellidos').val('');
                    $('#nombres').val('');
                    $('#password').val('');

                    $('#error_password').html('');
                    $('#error_num_documento').html('');


                } else {
                    // Mostrar mensaje de error
                    console.log("Ingresa al else");
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Ingresa al error");

                var response = jqXHR.responseJSON;
                // Mostrar mensaje de error si los errores son devueltos en formato JSON
                if (response && response.message) {

                    //Actualizar HASH
                    $('meta[name="csrf_token"]').attr('content', response.csrf_hash_gen);

                    //$('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    if(response.message.password){
                        $('#error_password').html('<div class="alert alert-danger">' + response.message.password + '</div>')
                    }
                    if(response.message.num_documento){
                        $('#error_num_documento').html('<div class="alert alert-danger">' + response.message.num_documento + '</div>')
                    }
                } else {
                    $('#message').html('<div class="alert alert-danger">Hubo un error en la solicitud.</div>');
                }
            },
            complete: function() {
                // Ocultar loader y habilitar botón después de completar la solicitud
                loader.style.display = 'none';
                submitButton.disabled = false;
            }
        });
    });
});



console.log("Base URL: " + window.globalConfig.baseUrl);
