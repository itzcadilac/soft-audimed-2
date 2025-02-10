// Mostrar el loader antes de que se recargue la página
window.addEventListener('beforeunload', function () {
    document.getElementById('loader').style.display = 'flex';
});

// Ocultar el loader después de que la página haya terminado de cargar
window.addEventListener('load', function () {
    document.getElementById('loader').style.display = 'none';
});


var idAseg = localStorage.getItem("idAsegu");

if (idAseg !== null) {
    console.log(idAseg);
} else {
    idAseg = 0;
}

cambiarColores(idAseg);

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
        //--primary-color: #089bab
        //--secondary-color: #eff7f8
        document.documentElement.style.setProperty('--primary-color', '#089bab'); // Principal
        document.documentElement.style.setProperty('--secondary-color', '#eff7f8'); // Secundario
    }

 }
