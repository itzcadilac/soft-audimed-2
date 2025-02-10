$(document).ready(function () {
    let timeLeft = 30; // Tiempo antes de redireccion en segundos
    
    // Mostramos el contador en la vista
    $("#countdown").text(timeLeft);

    let countdownInterval = setInterval(function () {
        timeLeft--;
        $("#countdown").text(timeLeft);

        if (timeLeft <= 0) {
            clearInterval(countdownInterval);
            window.location.href = `${base_url}/login`;
        }
    }, 1000);
});