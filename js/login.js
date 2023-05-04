$('#formlogin').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);
    console.log("b")

    $.ajax({
        type: 'POST',
        url: "php/Usuarios_Portal_credenciales.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            crear_swal_then(data, "./index.php")
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear el Usuario Portal.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
