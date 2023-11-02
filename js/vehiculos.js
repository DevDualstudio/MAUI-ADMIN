//Buscar Empleados
function listado_choferes() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaEmpleados.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "Chofer", "Chofer");
                CrearOption(select, "EChofer", "Chofer");
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
                data: { 'Id': valorId, 'Tabla': 'Vehiculos', 'CampoID': 've_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tableVehiculos)
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
//Agregar vehiculos
$("#insertVehiculo").on("show.bs.modal", function (event) {
    $("#Placas").val("");
    $("#NSerie").val("");
    $("#Marca").val("");
    $("#Modelo").val("");
    $("#Year").val("");
    $("#Tipo").val("");
    $('#VEstatus1').prop('checked', true);
    $('#Chofer').val("t");
});

$('#formInsertVehiculo').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarVehiculos.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableVehiculos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear el vehiculo.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Editar vehiculos
$("#editVehiculo").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#VID").val(ID);
    $.ajax({
        type: "POST",
        url: "php/Mostrarvehiculo.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#EPlacas").val(infoC.Placas);
                $("#ENSerie").val(infoC.NoSerie);
                $("#EMarca").val(infoC.Marca);
                $("#EModelo").val(infoC.Modelo);
                $("#EYear").val(infoC.Año);
                $("#ETipo").val(infoC.Tipo);
                $("#EChofer").val(infoC.IdChofer);
                if (infoC.Estatus == "Inactivo") {
                    $('#EVEstatus2').prop('checked', true);
                } else {
                    $('#EVEstatus1').prop('checked', true);
                }
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del vehiculo.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditVehiculo').submit(function (evt) {
    console.log("formEditVehiculo")
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarVehiculos.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableVehiculos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar el vehiculo.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});