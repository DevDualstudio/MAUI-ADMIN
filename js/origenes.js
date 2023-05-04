//Agregar Origenes
$("#insertOrigen").on("show.bs.modal", function (event) {
    $("#NombreO").val("");
    $("#DireccionO").val("");
    $("#ColoniaO").val("");
    $("#CPO").val("");
    $("#CiudadO").val("");
    $("#EstadoO").val("");
    $("#PaisO").val("");
});
function eliminaRegistro(valorId) {
    swal( {
		title: 'Confirmar',
		text: '¿Seguro de eliminar este registro, podría generar un conflicto si esta siendo utilizado en otra sección, en dicho caso debera ir a la sección que interfiera y eliminar primero el registro involucrado?',
		icon: 'warning',
		buttons: [ 'NO', 'SI' ],
		dangerMode: true,
	} ).then( ( desicion ) => {
		if ( desicion ) {
			$.ajax({
                type: "POST",
                url: "php/EliminaRegistro.php",
                data: { 'Id': valorId, 'Tabla': 'origen', 'CampoID': 'or_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tableOrigenes)
                    } else {
                        crear_swal_then(data, "")
                    }
                },
                error: function (data) {
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error en el servidor al tratar de eliminar el registro',
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            });
		}
	} );
}
$('#formInsertOrigen').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarOrigen.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableOrigenes)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear el Origen.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Editar Origenes
$("#editOrigen").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EOID").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarOrigen.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#ENombreO").val(infoC.Nombre);
                $("#EDireccionO").val(infoC.Direccion);
                $("#EColoniaO").val(infoC.Colonia);
                $("#ECPO").val(infoC.CP);
                $("#ECiudadO").val(infoC.Ciudad);
                $("#EEstadoO").val(infoC.Estado);
                $("#EPaisO").val(infoC.or_Pais);
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del Origen.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditOrigen').submit(function (evt) {
    console.log("formEditOrigen")
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarOrigen.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableOrigenes)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar el Origen.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});