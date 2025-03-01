
$(document).ready(function () {
    $('.editar').bind('click', function(e){
		e.preventDefault();
		let input = window.document.createElement('input');
		input.type = 'text';
		input.value = profile;
		input.id = 'profileBD';
		span.innerHTML = '';
		span.appendChild(input);
		this.className = 'editar d-none';
		$('.check').removeClass('d-none');
		$('.undo').removeClass('d-none');
	});

	$('.undo').bind('click', function(e){
		e.preventDefault();
		span.innerHTML = profile;
		$(this).addClass('d-none');
		$('.check').addClass('d-none');
		$('.editar').removeClass('d-none');
	});

	$('.check').bind('click', function(e){
		e.preventDefault();
		let input = document.getElementById('profileBD'); data = { perfil: input.value, profileold: profile };
		sendData('gestion/updateprofile', data, 'edit');
	});
	
	$('#deactivate').bind('click', function(){
		if(activo){
			$('#modalLabel').html('Desactivar Perfil');
			$('#modalmsg').html('¿Está seguro que deseas desactivar el Perfil?');
			$('.modal-footer').find('.btn-primary').removeClass('activar');
			$('.modal-footer').find('.btn-primary').addClass('desactivar');
		}else{
			$('#modalLabel').html('Activar Perfil');
			$('#modalmsg').html('¿Está seguro que deseas activar el Perfil?');
			$('.modal-footer').find('.btn-primary').removeClass('desactivar');
			$('.modal-footer').find('.btn-primary').addClass('activar');
		}
	});
	
	$('.modal-footer').bind('click', 'a', function(e){
		let data = null; action = '', url = '';
		if($(e.target).hasClass('activar'))
			data = { activo: 1, profile: profile }, action = 'activar', url = 'gestion/actdeact';
		else if($(e.target).hasClass('desactivar'))
			data = { activo: 0, profile: profile }, action = 'desactivar', url = 'gestion/actdeact';
		else if($(e.target).hasClass('delete'))
			data = { eliminado: 1, estadoreg: 300, profile: profile }, action = 'eliminar', url = 'gestion/deleteperfil';
		
		if($(e.target).hasClass('btn-primary')) sendData(url, data, action);
	});
	
	$('#sel_edoreg').bind('change', function(){
		let data = { estadoreg: this.value, profile: profile };
		sendData('gestion/bloqperfil', data, 'bloquear');
	});
	
	$('#delete').bind('click', function(){
		$('#modalLabel').html('Eliminar Perfil');
		$('#modalmsg').html('¿Está seguro que deseas eliminar el Perfil?');
		$('.modal-footer').find('.btn-primary').addClass('delete');
	});
	
	function sendData(url, data, action){
		let msg = '', csrfToken = $('meta[name="csrf_token"]').attr('content');
		let id = document.getElementById('idp'); data.id = id.value;
		
		$.ajax({
            url: window.globalConfig.baseUrl + url,  // URL de tu controlador
            method: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': csrfToken // Enviar el token en los encabezados
            },
            dataType: 'json',
			beforeSend: function() {
				launchLoader();
			},
            success: function(response) {
                if (response.status === 'success') {
					const rs = response.data.data.data;
                    //Actualizar HASH
                    $('meta[name="csrf_token"]').attr('content', response.csrf_hash_gen);
					
					//Actualizar el perfil
					switch(action){
						case 'edit':
							profile = data.perfil;
							span.innerHTML = profile;
							$('#labelPerfil').html(profile);
							$('.check').addClass('d-none');
							$('.undo').addClass('d-none');
							$('.editar').removeClass('d-none');
							msg = 'msg_edit';
							break;
						case 'activar':
						case 'desactivar':
							// Seteamos los valores estaticos de la pagina
							if(rs.activo === '1'){
								$('.liactivo').html('<b>Estado</b><br>Activo'), activo = true; $('#deactivate').html('Desactivar Perfil');
								$('.listatus').html('<b>Perfil Activo</b><br><div class="icono-bg llave">&nbsp;</div>');
							}else if(rs.activo === '0'){
								$('.liactivo').html('<b>Estado</b><br>Inactivo'), activo = false; $('#deactivate').html('Activar Perfil');
								$('.listatus').html('<b>Perfil Inactivo</b><br><div class="icono-bg semaforo-amarillo">&nbsp;</div>');
							}
							msg = 'msg_activate';
							break;
						case 'bloquear':
							if(rs.estadoreg === '0') $('#sel_edoreg option[value="0"]').prop('selected', true);
							else if(rs.estadoreg === '100') $('#sel_edoreg option[value="100"]').prop('selected', true);
							else if(rs.estadoreg === '200') $('#sel_edoreg option[value="200"]').prop('selected', true);
							break;
						case 'eliminar':
							$('#sel_edoreg').html('<option value="300">Eliminado</option>');
							$('#delete').html('Perfil Eliminado'), $('#delete').prop('disabled',true);
							break;
					}
					// Se cierra el modal si está abierto
					$('#modalPerfil').modal('hide');
					
					// Actualizar la fecha de actualizacion
					$('.updated').html('<b>Actualizado</b><br>' + rs.updatedat);
                    // Mostrar mensaje de éxito
                    $('#'+ msg).html('<div class="alert alert-success">' + response.message + '</div>');
                } else {
                    // Mostrar mensaje de error
                    $('#'+ msg).html('<div class="alert alert-danger">' + response.message + '</div>');
                }
				setTimeout(function(){ $('#'+ msg).html('&nbsp;'); },2000);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var response = jqXHR.responseJSON;
                // Mostrar mensaje de error si los errores son devueltos en formato JSON
                if (response && response.message) {
                    //Actualizar HASH
                    $('meta[name="csrf_token"]').attr('content', response.csrf_hash_gen);
                } else {
                    $('#'+ msg).html('<div class="alert alert-danger">Hubo un error en la solicitud.</div>');
                }
            },
            complete: function() {
                // Ocultar loader
                stopLoader(1);
            }
        });
	}
	
	function launchLoader(){
		const loader = document.getElementById('loader'); // Loader
		loader.style.display = 'flex';
	}
	
	function stopLoader(t){
		const loader = document.getElementById('loader'); // Loader
		setTimeout(function(){
			loader.style.display = 'none';
		},t);
	}
});