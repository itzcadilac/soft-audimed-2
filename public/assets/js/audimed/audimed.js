let arrayDatos = [];

// Mostrar el loader antes de que se recargue la página
window.addEventListener('beforeunload', function () {

    const modal = document.getElementById('modalSeleccion');

    if (modal && modal.style.display !== 'none') {
        //console.log("El modal está abierto. Se cerrará antes de recargar.");
        modal.style.display = 'none'; // Oculta el modal manualmente
    }

    document.getElementById('loader').style.display = 'flex';
});

// Ocultar el loader después de que la página haya terminado de cargar
window.addEventListener('load', function () {
    document.getElementById('loader').style.display = 'none';
});

function procesarVariables(ini){
    getAseguradorasxUsuario(ini);
}

function getAseguradorasxUsuario(ini){

    let csrfToken = $('meta[name="csrf_token"]').attr('content');
    
    fetchData({
        url: window.globalConfig.baseUrl + 'siniestro/aseguradorasxuser',
        method: 'GET',
        headers: {'X-CSRF-TOKEN': csrfToken},
        onStart: () => inicio(),
        onSuccess: (data) => cargarAseguradoraSuccess(data,ini),
        onError: (error) => mensajeError(error.message)
    });
}

function cargarAseguradoraSuccess(data,ini){

    //Carga el total de aseguradoras
    window.globalConfig.total_aseg_user = data.data.length;

    if(data.data.length > 0){
        //Si solo tiene 1 aseguradora
        if(data.data.length == 1){
            changeColors(data.data[0]);
            if(data.idProducto > 0){
                //Si solo tiene 1 producto asociado
                //renderProductos(data.idProducto);
                getProductos(data.data[0].idaseguradora,data.idProducto);
                return;
            }else{
                getProductos(data.data[0].idaseguradora,0);
                return;
            }
        }else{
            //renderizar modal
            if(data.idaseguradora == 0 || ini == 0){
                cargarRenderAseguradora(data);
            }else{
                let aseguradora = data.data.find(aseg => aseg.idaseguradora === data.idaseguradora);
                changeColors(aseguradora);
                if(data.idProducto > 0){
                    //renderProductos(data.idProducto);
                    getProductos(data.idaseguradora,data.idProducto);
                }else{
                    getProductos(data.idaseguradora,0);
                }
            }
        }
    }

}

function cargarRenderAseguradora(data){
    
    renderAseguradoras(data.data);
    document.getElementById('modalSeleccion').style.display = 'flex';
    document.getElementById('divAseguradora').style.display = 'flex';
    document.getElementById("divProducto").style.setProperty("display", "none", "important");
}

function renderAseguradoras(data) {
    const divAseguradora = document.getElementById("divAseguradora");
    
    if (!divAseguradora) {
        console.error("Error: No se encontró el contenedor divAseguradora");
        return;
    }

    divAseguradora.innerHTML = ""; 
    $("#divTitulo").html('Selecciona una aseguradora');

    data.forEach(imagen => {
        const totalElementos = data.length;
        let colClass = "col-md-3";

        if (totalElementos === 1) colClass = "col-md-12";
        else if (totalElementos === 2) colClass = "col-md-6";
        else if (totalElementos === 3) colClass = "col-md-4";
        else if (totalElementos >= 4) colClass = "col-md-3";

        const div = document.createElement("div");
        div.className = colClass;
        div.style.width = "250px";

        const img = document.createElement("img");
        img.src = window.globalConfig.baseUrl + imagen.url; 
        img.className = "opcion-imagen rounded mr-3 img-fluid";
        img.setAttribute("data-id", imagen.idaseguradora);

        img.addEventListener("click", () => setAseguradoraFn(imagen));

        div.appendChild(img);
        divAseguradora.appendChild(div);
    });
}

function setAseguradoraFn(imagen){
    //Se cargan los productos asociados a la aseguradora, perfil y usuario y se setea en session idAseguradora
    document.getElementById('modalSeleccion').style.display = 'none';
    document.getElementById('divAseguradora').style.display = 'none';

    //console.log(imagen);
    setAseguradora(imagen.idaseguradora)
    changeColors(imagen);
    getProductos(imagen.idaseguradora,0);
}

function setAseguradora(idAseguradora){
    
    let csrfToken = $('meta[name="csrf_token"]').attr('content');

    fetchData({
        url: window.globalConfig.baseUrl + 'siniestro/setAseguradora',
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' , 'X-CSRF-TOKEN': csrfToken },
        body: { 
            idAseguradora: idAseguradora
        },
        onStart: () => inicio(),
        onSuccess: (data) => console.log('ok'),
        onError: (error) => mensajeError(error.message)
    });
}

function getProductos(idAseguradora,idProducto){
    //var csrfToken = $('meta[name="csrf_token"]').attr('content');

    let csrfToken = $('meta[name="csrf_token"]').attr('content');

    fetchData({
        url: window.globalConfig.baseUrl + 'siniestro/productsxaseg',
        method: 'GET',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded', 'X-CSRF-TOKEN': csrfToken },
        body: { 
            idAseguradora: idAseguradora
        },
        onStart: () => inicio(),
        onSuccess: (data) => procesarGetProductos(data.data,idProducto),
        onError: (error) => mensajeError(error.message)
    });
}

function procesarGetProductos(data,idProducto){
    
    arrayDatos = data;
    let totalProductos = data.length;

    if(idProducto == 0){
        if(totalProductos == 1){
            renderProductos(arrayDatos[0].idproducto);
        }else{
            generarBotones();
        }
    }else{
        renderProductos(idProducto);
    }
}


function generarBotones() {

    //arrayDatos = Object.values(data);
    //arrayDatos = data;

    $("#divTitulo").html('Elige un producto');

    let contenedor = $("#divProducto");
    contenedor.html(""); // Limpia el contenedor antes de agregar los botones

    arrayDatos.forEach((valor, index) => {

        let boton = $("<button>")
            .text(valor.descripcion) // Texto del botón
            .attr("data-valor", valor.idproducto) // Agregar un atributo con el valor
            .addClass("btn btn-outline-primary mb-3 mr-2 btn-producto")
            .on("click", function () { 
                setProducto(valor.idproducto); // Llamar a la función con el valor del botón
            });

        contenedor.append(boton); // Agregar botón al contenedor
    });

    document.getElementById('modalSeleccion').style.display = 'flex';
    document.getElementById('divProducto').style.display = 'flex';
}

function setProducto(idProducto){

    document.getElementById('modalSeleccion').style.display = 'none';
    document.getElementById('divProducto').style.display = 'none';

    let csrfToken = $('meta[name="csrf_token"]').attr('content');

    fetchData({
        url: window.globalConfig.baseUrl + 'siniestro/setProducto',
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' , 'X-CSRF-TOKEN': csrfToken },
        body: { 
            idProducto: idProducto
        },
        onStart: () => inicio(),
        onSuccess: (data) => renderProductos(idProducto),
        onError: (error) => mensajeError(error.message)
    });
}

function renderProductos(valor){
    loader.style.display = 'none';

    let productoEncontrado = arrayDatos.find(producto => producto.idproducto === valor);

    // Actualizar el botón principal con el producto seleccionado
    document.getElementById("selected-product").innerHTML = productoEncontrado.descripcion + ' <i class="ri-arrow-down-s-line"></i>';

    // Filtrar los productos para que el seleccionado no aparezca en la lista
    let productosRestantes = arrayDatos.filter(producto => producto.idproducto !== valor);

    // Obtener el contenedor de la lista
    const lista = document.getElementById("product-list");
    lista.innerHTML = ""; // Limpiar lista antes de agregar nuevos productos

    // Recorrer los productos restantes y agregarlos a la lista
    productosRestantes.forEach(producto => {
        let item = document.createElement("a");
        item.classList.add("iq-sub-card");
        item.href = "#";
        item.textContent = producto.descripcion;
        
        // Evento para seleccionar otro producto
        item.addEventListener("click", function () {
            setProductoFn(producto.idproducto); // Volver a ejecutar la función con el nuevo producto
        });

        lista.appendChild(item);
    });
}

function setProductoFn(valor){
    setProducto(valor);
}



function inicio(){
    console.log("Inicio");
}

function mensajeError(){
    console.log("Ocurrio un error");
}


function changeColors(imagen){
    //console.log('Dentro de changeColors: ');
    //console.log(imagen);
    document.documentElement.style.setProperty('--primary-color', imagen.colorprim); // Principal
    document.documentElement.style.setProperty('--secondary-color', imagen.colorseg); // Secundario

    // Modificar imagen
    document.getElementById("imgLogoA").src = window.globalConfig.baseUrl + imagen.url;

    // Modificar texto
    document.getElementById("txtEmpresaA").textContent = imagen.nombre_comercial;
    document.getElementById("idElegir").textContent = "Elegir aseguradora";
}

function elegirAseg(){

    if(window.globalConfig.total_aseg_user > 1){
        getAseguradorasxUsuario(0);
    }

}









async function fetchData({ 
    url, 
    method = 'GET', 
    body = null, 
    headers = {}, 
    onStart = () => {},      
    onSuccess = () => {},    
    onError = () => {}       
}) {
    try {
        onStart(); 
        document.getElementById('loader').style.display = 'flex'; //Carga el loader
        //console.log(`Iniciando petición a: ${url} con método: ${method}`);

        let defaultHeaders = { ...headers };
        let options = { method, headers: defaultHeaders };

        // Si el método es GET, pasamos los datos como parámetros en la URL
        if (body && method === 'GET') {
            const urlParams = new URLSearchParams(body).toString();
            url += `?${urlParams}`;
        } 
        // Si el método NO es GET o DELETE, usamos el cuerpo de la petición
        else if (body && method !== 'DELETE') {
            if (headers['Content-Type'] === 'application/x-www-form-urlencoded') {
                const formData = new URLSearchParams();
                for (const key in body) {
                    formData.append(key, body[key]);
                }
                options.body = formData.toString();
            } else {
                defaultHeaders['Content-Type'] = 'application/json';
                options.body = JSON.stringify(body);
            }
        }

        const response = await fetch(url, options);
        if (!response.ok) throw new Error(`Error HTTP ${response.status}`);

        const data = await response.json();

        if (data.csrf_hash_gen) {
            $('meta[name="csrf_token"]').attr('content', data.csrf_hash_gen);
            //console.log(`CSRF actualizado: ${data.csrf_hash_gen}`);
        }

        document.getElementById('loader').style.display = 'none'; //Se oculta el loader
        onSuccess(data); 
        //console.log(`Petición a ${url} finalizada.`);
        return data;
    } catch (error) {
        onError(error); 
        if (error.message.includes('419')) { 
            //console.warn("CSRF token inválido. Obteniendo nuevo token...");
            refreshCsrfToken();
        }
        document.getElementById('loader').style.display = 'none'; //Se oculta el loader
        //console.error(`Error en la petición:`, error.message);
        return { error: true, message: error.message };
    }
}

async function refreshCsrfToken() {
    try {
        const csrfResponse = await fetch(window.globalConfig.baseUrl + 'getCsrfToken');
        const csrfData = await csrfResponse.json();
        if (csrfData.csrf_hash_gen) {
            document.querySelector('meta[name="csrf_token"]').setAttribute('content', csrfData.csrf_hash_gen);
            //console.log(`Nuevo CSRF Token actualizado: ${csrfData.csrf_hash_gen}`);
        }
    } catch (error) {
        console.error("Error al actualizar el CSRF Token:", error.message);
    }
}

