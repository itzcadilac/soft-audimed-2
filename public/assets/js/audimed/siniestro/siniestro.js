

$(document).ready(function () {
    $('#datatable').DataTable({
        paging: true,         // Activa la paginación
        searching: true,      // Activa el buscador
        ordering: true,       // Permite ordenar columnas
        info: true,           // Muestra información del estado
        language: {
            url: window.globalConfig.baseUrl + "assets/js/audimed/siniestro/es-ES.json",
            emptyTable: "No hay registros disponibles"
        }
    });
});

document.getElementById('fnMapfre').addEventListener('click', function () {
    // Cierra el modal actual (modal1)
    $('#staticBackdrop').modal('hide');

    // Ejecuta una función personalizada
    console.log('Imagen clickeada, ejecutando función...');
    localStorage.setItem("idAsegu", 1);

    window.location.href = window.globalConfig.baseUrl + "siniestro/nuevoSiniestro";
    //cambiarColores(1);

    // Abre el segundo modal (modal2)
    /*
    let modal2 = new bootstrap.Modal(document.getElementById('modal2'));
    modal2.show();
    */
});

document.getElementById('fnPacifico').addEventListener('click', function () {
    // Cierra el modal actual (modal1)
    $('#staticBackdrop').modal('hide');

    // Ejecuta una función personalizada
    console.log('Imagen clickeada, ejecutando función...');
    localStorage.setItem("idAsegu", 2);

    window.location.href = window.globalConfig.baseUrl + "siniestro/nuevoSiniestro";

    // Abre el segundo modal (modal2)
    /*
    let modal2 = new bootstrap.Modal(document.getElementById('modal2'));
    modal2.show();
    */
});

function cambiarColores(idAseg) {

    if(idAseg == 1){
        // MAPFRE
        //primary-color: #D81E05;
        //secondary-color: #FEEDEB;
        document.documentElement.style.setProperty('--primary-color', '#D81E05'); // Principal
        document.documentElement.style.setProperty('--secondary-color', '#FEEDEB'); // Secundario
    }else if(idAseg == 2){
        // PACIFICO
        //primary-color: #0099CC;
        //secondary-color: #EBFAFF;
        document.documentElement.style.setProperty('--primary-color', '#0099CC'); // Principal
        document.documentElement.style.setProperty('--secondary-color', '#EBFAFF'); // Secundario
    }else{

    }


 }