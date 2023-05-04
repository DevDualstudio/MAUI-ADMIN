function validaRFC( rfc ) {
    const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
    var validado = rfc.match(re);
    return validado;
}
//Buscar Clientes
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
                data: { 'Id': valorId, 'Tabla': 'clientes', 'CampoID': 'cli_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tableClientes)
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
//Agregar Clientes
$("#insertCliente").on("show.bs.modal", function (event) {
    $("#Nombre").val("");
    $("#Direccion").val("");
    $("#Colonia").val("");
    $("#CP").val("");
    $("#Ciudad").val("");
    $("#Estado").val("");
    $("#Pais").val("");
    $("#Telefono").val("");
    $("#Celular").val("");
    $("#RFC").val("");
    $("#Email").val("");
});
$('#formInsertCliente').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/insertClienteNoRegistrado.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableClientes)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear el cliente.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Editar Clientes
$("#editCliente").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EID").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarCliente.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#ENombre").val(infoC.Nombre);
                $("#EDireccion").val(infoC.Direccion);
                $("#EColonia").val(infoC.Colonia);
                $("#ECP").val(infoC.CP);
                $("#ECiudad").val(infoC.Ciudad);
                $("#EEstado").val(infoC.Estado);
                $("#EPais").val(infoC.Pais);
                $("#ETelefono").val(infoC.Telefono);
                $("#ECelular").val(infoC.Celular);
                $("#ERFC").val(infoC.RFC);
                $("#EEmail").val(infoC.Correo);
                if (infoC.Estatus == "Inactivo") {
                    $('#EEstatus2').prop('checked', true);
                } else {
                    $('#EEstatus1').prop('checked', true);
                }
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del cliente.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditCliente').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarClienteNoRegistrado.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableClientes)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar el cliente.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});