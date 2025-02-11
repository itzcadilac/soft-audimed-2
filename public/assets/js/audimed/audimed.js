//
let arrayDatos = [];

// Mostrar el loader antes de que se recargue la página
window.addEventListener('beforeunload', function () {
    document.getElementById('loader').style.display = 'flex';
});

// Ocultar el loader después de que la página haya terminado de cargar
window.addEventListener('load', function () {
    document.getElementById('loader').style.display = 'none';
});


idAsegu = sessionStorage.getItem('idAsegu');

cambiarColores(idAsegu);

function cambiarColores(idAsegu) {

    if(idAsegu == 1){
        // MAPFRE
        //primary-color: #D81E05;
        //secondary-color: #FEEDEB;
        document.documentElement.style.setProperty('--primary-color', '#D81E05'); // Principal
        document.documentElement.style.setProperty('--secondary-color', '#FEEDEB'); // Secundario
        window.globalConfig.nombre_aseguradora = "MAPFRE";
        window.globalConfig.ruta_aseguradora = "uploads/mapfre1.png";
    }else if(idAsegu == 2){
        // PACIFICO
        //primary-color: #0099CC;
        //secondary-color: #EBFAFF;
        document.documentElement.style.setProperty('--primary-color', '#0099CC'); // Principal
        document.documentElement.style.setProperty('--secondary-color', '#EBFAFF'); // Secundario
        window.globalConfig.nombre_aseguradora = "PACIFICO";
        window.globalConfig.ruta_aseguradora = "uploads/pacifico.png";
    }else if(idAsegu == 3){
        // RIMAC
        //primary-color: #D81E05;
        //secondary-color: #FEEDEB;
        document.documentElement.style.setProperty('--primary-color', '#D81E05'); // Principal
        document.documentElement.style.setProperty('--secondary-color', '#FEEDEB'); // Secundario
        window.globalConfig.nombre_aseguradora = "RIMAC";
        window.globalConfig.ruta_aseguradora = "uploads/rimac.png";
    }else{
        //--primary-color: #089bab
        //--secondary-color: #eff7f8
        document.documentElement.style.setProperty('--primary-color', '#089bab'); // Principal
        document.documentElement.style.setProperty('--secondary-color', '#eff7f8'); // Secundario
    }

 }


 document.querySelectorAll('.opcion-imagen').forEach(img => {

    if(window.globalConfig.total_aseg_user > 1){
        img.addEventListener('click', function() {
            let opcionId = this.getAttribute('data-id');
            //localStorage.setItem('globalAseg', opcionId); // Guardar selección
    
            cambiarColores(opcionId);
            
            //asignar en variable de sesion
            setIdAseguradora(opcionId);
    
            //cerrar div de aseguradora y carga div de productos
    
            // Ocultar modal bloqueante
            document.getElementById('modalSeleccion').style.display = 'none';
        });
    }
});

function setIdAseguradora(idAseg){

    loader.style.display = 'flex';
    //submitButton.disabled = true;

    var csrfToken = $('meta[name="csrf_token"]').attr('content');

    $.ajax({
        url: window.globalConfig.baseUrl + 'siniestro/setAseguradora',  // URL de tu controlador
        method: 'POST',
        dataType: 'json',
        data: {
            idAseguradora: idAseg
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken // O enviar el token en los encabezados
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {

                //Actualizar HASH
                $('meta[name="csrf_token"]').attr('content', response.csrf_hash_gen);

                window.globalConfig.idaseguradora_user = idAseg;

                document.getElementById('modalSeleccion').style.display = 'flex';

                document.getElementById('divAseguradora').style.display = 'none'; // Oculta el primer div

                //LLENAR CABECERA
                // Modificar imagen
                document.getElementById("imgLogoA").src = base_url(`${window.globalConfig.ruta_aseguradora}`);

                // Modificar texto
                document.getElementById("txtEmpresaA").textContent = window.globalConfig.nombre_aseguradora;

                //console.log(arrayDatos);
                arrayDatos = Object.values(response.data);
                generarBotones(arrayDatos);
                $("#divTitulo").html('Elige un producto');
                document.getElementById('divProducto').style.display = 'flex'; // Muestra el segundo div

            } else {
                console.log("Ingresa al else");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Ingresa al error");
        },
        complete: function() {
            // Ocultar loader y habilitar botón después de completar la solicitud
            loader.style.display = 'none';
            //submitButton.disabled = false;
        }
    });

}


function generarBotones(arrayDatos) {
    let contenedor = $("#divProducto");
    contenedor.html(""); // Limpia el contenedor antes de agregar los botones

    arrayDatos.forEach((valor, index) => {

        let boton = $("<button>")
            .text(valor) // Texto del botón
            .attr("data-valor", valor) // Agregar un atributo con el valor
            .addClass("btn btn-outline-primary mb-3 mr-2 btn-producto")
            .on("click", function () { 
                ejecutarFuncion($(this).data("valor"),arrayDatos); // Llamar a la función con el valor del botón
            });

        contenedor.append(boton); // Agregar botón al contenedor
    });
}

function ejecutarFuncion(valor) {
    //alert("Hiciste clic en el botón con valor: " + valor);

    // Actualizar el botón principal con el producto seleccionado
    document.getElementById("selected-product").innerHTML = valor + ' <i class="ri-arrow-down-s-line"></i>';

    // Filtrar los productos para que el seleccionado no aparezca en la lista
    let productosRestantes = arrayDatos.filter(producto => producto !== valor);

    // Obtener el contenedor de la lista
    const lista = document.getElementById("product-list");
    lista.innerHTML = ""; // Limpiar lista antes de agregar nuevos productos

    // Recorrer los productos restantes y agregarlos a la lista
    productosRestantes.forEach(producto => {
        let item = document.createElement("a");
        item.classList.add("iq-sub-card");
        item.href = "#";
        item.textContent = producto;
        
        // Evento para seleccionar otro producto
        item.addEventListener("click", function () {
            ejecutarFuncion(producto); // Volver a ejecutar la función con el nuevo producto
        });

        lista.appendChild(item);
    });

    document.getElementById('modalSeleccion').style.display = 'none';
    setIdProducto(valor);
}


function setIdProducto(idProducto){

    loader.style.display = 'flex';
    //submitButton.disabled = true;

    var csrfToken = $('meta[name="csrf_token"]').attr('content');

    $.ajax({
        url: window.globalConfig.baseUrl + 'siniestro/setProducto',  // URL de tu controlador
        method: 'POST',
        dataType: 'json',
        data: {
            idProducto: idProducto
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken // O enviar el token en los encabezados
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {

                //Actualizar HASH
                $('meta[name="csrf_token"]').attr('content', response.csrf_hash_gen);

                window.globalConfig.idproducto_user = idProducto;

                document.getElementById('modalSeleccion').style.display = 'none';

            } else {
                console.log("Ingresa al else");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Ingresa al error");
        },
        complete: function() {
            // Ocultar loader y habilitar botón después de completar la solicitud
            loader.style.display = 'none';
            //submitButton.disabled = false;
        }
    });

}


function base_url(uri) {
    return window.globalConfig.baseUrl + "/" + uri;
}



function asignarLogo(){
    if(window.globalConfig.idaseguradora_user > 0){

        if(window.globalConfig.idaseguradora_user == 1){
            window.globalConfig.nombre_aseguradora = "MAPFRE";
            window.globalConfig.ruta_aseguradora = "uploads/mapfre1.png";
        }

        if(window.globalConfig.idaseguradora_user == 2){
            window.globalConfig.nombre_aseguradora = "PACIFICO";
            window.globalConfig.ruta_aseguradora = "uploads/pacifico.png";
        }

        if(window.globalConfig.idaseguradora_user == 3){
            window.globalConfig.nombre_aseguradora = "RIMAC";
            window.globalConfig.ruta_aseguradora = "uploads/rimac.png";
        }
        // Modificar imagen
        document.getElementById("imgLogoA").src = base_url(`${window.globalConfig.ruta_aseguradora}`);

        // Modificar texto
        document.getElementById("txtEmpresaA").textContent = window.globalConfig.nombre_aseguradora;
    }
}


function elegirAseg(){

    if(window.globalConfig.total_aseg_user > 1){
        document.getElementById('modalSeleccion').style.display = 'flex';
        document.getElementById('divAseguradora').style.display = 'flex';
        document.getElementById("divProducto").style.setProperty("display", "none", "important");
            $("#divTitulo").html('Selecciona una aseguradora');
    }

}


function cargarProductos() {
    const lista = document.getElementById("product-list");
    lista.innerHTML = ""; // Limpiar lista antes de agregar nuevos productos

    productos.forEach(producto => {
        let item = document.createElement("a");
        item.classList.add("iq-sub-card");
        item.href = "#";
        item.textContent = producto;
        
        // Evento para seleccionar el producto
        item.addEventListener("click", function () {
            document.getElementById("selected-product").innerHTML = producto + ' <i class="ri-arrow-down-s-line"></i>';
        });

        lista.appendChild(item);
    });
}