$(document).ready(function () {
    $("#formResetPasswd").on("submit", function (event) {
        event.preventDefault();

        let userid = $("#frp_user_id").val();

        $.ajax({
            url: window.globalConfig.baseUrl + 'usuarios/resetpasswd/'+userid,
            method: 'GET',
            headers: {
                
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    console.log("Se reseteo la contraseña");
                    $('#modalResetPassword').modal('hide')
                } else {
                    console.log("Fallo");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseJSON;
                if (response && response.message) {
                    console.log("Fallo OK");
                } else {
                    console.log("Fallo NSNO");
                }
            },
            complete: function () {
               
            }
        });
    });

    
});

