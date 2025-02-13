

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

