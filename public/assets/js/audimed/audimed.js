// Mostrar el loader antes de que se recargue la página
window.addEventListener('beforeunload', function () {
    document.getElementById('loader').style.display = 'flex';
});

// Ocultar el loader después de que la página haya terminado de cargar
window.addEventListener('load', function () {
    document.getElementById('loader').style.display = 'none';
});