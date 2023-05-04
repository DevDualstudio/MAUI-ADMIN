//Agregar Destinos
$("#insertDestino").on("show.bs.modal", function (event) {
    $("#NombreD").val("");
    $("#DireccionD").val("");
    $("#ColoniaD").val("");
    $("#CPD").val("");
    $("#CiudadD").val("");
    $("#EstadoD").val("");
    $("#PaisD").val("");
    $("#ClienteD").val("t");
});
function listado_clientes() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaClientes.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "ClienteD", "Cliente");
                CrearOption(select, "EClienteD", "Cliente");
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener el listado de choferes.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
}
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
                data: { 'Id': valorId, 'Tabla': 'destinos', 'CampoID': 'de_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tableDestinos)
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
$('#formInsertDestino').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarDestino.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableDestinos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear el Destino.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Editar Destinos
$("#editDestino").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EEOID").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarDestino.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#ENombreD").val(infoC.Nombre);
                $("#EDireccionD").val(infoC.Direccion);
                $("#EColoniaD").val(infoC.Colonia);
                $("#ECPD").val(infoC.CP);
                $("#ECiudadD").val(infoC.Ciudad);
                $("#EEstadoD").val(infoC.Estado);
                $("#EPaisD").val(infoC.Pais);
                $("#EClienteD").val(infoC.IdCliente);
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del Destino.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditDestino').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarDestino.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableDestinos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar el Destino.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});