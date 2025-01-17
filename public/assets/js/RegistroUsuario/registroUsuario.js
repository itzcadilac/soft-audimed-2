$(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
        event.preventDefault();  // Evitar que se envíe el formulario tradicional

        var username = $('#num_documento').val();
        var password = $('#password').val();
        var apellidos = $('#apellidos').val();
        var nombres = $('#nombres').val();

        // Validar datos antes de enviarlos
        if (username === '' || password === '') {
            $('#message').html('<div class="alert alert-danger">Por favor, complete todos los campos.</div>');
            return;
        }

        // Obtener el token CSRF desde el campo oculto en el formulario
        //var csrfToken = $('input[name="{{ csrf_token() }}"]').val();
        var csrfToken = $('#csrf_token').val(); 

        $.ajax({
            url: '/usuario/registro',  // URL de tu controlador
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
                    // Mostrar mensaje de éxito
                    $('#message').html('<div class="alert alert-success">' + response.message + '</div>');

                    // Limpiar los campos del formulario
                    $('#num_documento').val('');
                    $('#apellidos').val('');
                    $('#nombres').val('');
                    $('#password').val('');
                } else {
                    // Mostrar mensaje de error
                    $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function() {
                $('#message').html('<div class="alert alert-danger">Hubo un problema al registrar los datos.</div>');
            }
        });
    });
});