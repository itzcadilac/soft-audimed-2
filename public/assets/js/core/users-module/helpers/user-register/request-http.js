class UserRegisterRequestHttp {
    static send(form, newUser) {
        $.ajax({
            url: form.url_user_register,
            method: 'POST',
            data: newUser,
            headers: form.getHeadersHTTP(),
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    form.updateHtmlHash(response.csrf_hash_gen);
                    form.showSuccessMessage(response.message);
                    form.clearFields();
                } else {
                    form.showErrorMessage(response.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                let response = jqXHR.responseJSON;

                if (response && response.message) {
                    form.updateHtmlHash(response.csrf_hash_gen);

                    if (response.message.num_documento) {
                        form.showErrorMessage(response.message.num_documento);
                    }
                } else {
                    form.showErrorMessage("Hubo un error en la solicitud.");
                }
            },
            complete: function () {
                form.endSendProcess();
            }
        });
    }
}

export { UserRegisterRequestHttp };