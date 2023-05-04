
function crear_swal_then(data, pagina) {
    console.log(data)
    var json = JSON.parse(data);
    const code = parseInt(json["code"]);
    const message = json["message"];
    const description = json["description"];

    if (code >= 200 && code <= 299) {
        swal({
            title: "Excelente!",
            text: description,
            dangerMode: true,
            icon: "success"
        }).then(function () {
            window.location.href = pagina;
        });
    }

    if (code >= 400 && code <= 499) {
        swal({
            title: "Error!",
            text: description,
            icon: "error",
            dangerMode: true,
            button: "Aceptar",
        });
        const detail = json["detail"];
        console.log("Detalle: " + detail);
    }
}

function crear_notificacion_datatable(data, tableRefresh) {
    console.log(data)
    var json = JSON.parse(data);
    const code = parseInt(json["code"]);
    const message = json["message"];
    const description = json["description"];

    if (code >= 200 && code <= 299) {

        swal({
            title: "Excelente!",
            text: description,
            dangerMode: true,
            icon: "success"
        });

        if (tableRefresh != "") {
            tableRefresh.ajax.reload();
        }
    }

    if (code >= 400 && code <= 499) {
        swal({
            title: "Error!",
            text: description,
            icon: "error",
            dangerMode: true,
            button: "Aceptar",
        });
        const detail = json["detail"];
        console.log("Detalle: " + detail);
    }
}

function CrearOption(select, idselect, categoria) {
    var optiondefault = '<option value="t" selected>Seleccione un ' + categoria + '</option>';
    $("#" + idselect).append(optiondefault);
    for (var i = 0; i < select.length; i++) {
        var selecti = select[i];
        var id = selecti.Id;
        var nombre = selecti.Nombre;

        var option = '<option value="' + id + '">' + nombre + '</option>';
        $("#" + idselect).append(option);
        $("#" + idselect).val("t");
    }
}