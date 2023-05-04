//Agregar puestos
$("#insertPuesto").on("show.bs.modal", function (event) {
    $("#NombreP").val("");
    $("#DescripcionP").val("");
    $("#AppAdministrador").val(1);
    $("#WebAdministrador").val(1);
    $("#AppSupervisor").val(1);
    $("#WebSupervisor").val(1);
    $("#AppUsuario").val(1);
    $("#WebUsuario").val(1);
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
                data: { 'Id': valorId, 'Tabla': 'puestos', 'CampoID': 'pu_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tablePuestos)
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
$('#formInsertPuesto').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarPuestos.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tablePuestos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear el puesto.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Editar puestos
$("#editPuestoEmpleado").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#PEID").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarPuesto.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#ENombreP").val(infoC.Nombre);
                $("#EDescripcionP").val(infoC.Descripcion);

                if (infoC.AppAdministrador == "0") {
                    $('#EAppAdministrador2').prop('checked', true);
                } else {
                    $('#EAppAdministrador1').prop('checked', true);
                }
                if (infoC.WebAdministrador == "0") {
                    $('#EWebAdministrador2').prop('checked', true);
                } else {
                    $('#EWebAdministrador1').prop('checked', true);
                }
                if (infoC.AppSupervisor == "0") {
                    $('#EAppSupervisor2').prop('checked', true);
                } else {
                    $('#EAppSupervisor1').prop('checked', true);
                }
                if (infoC.WebSupervisor == "0") {
                    $('#EWebSupervisor2').prop('checked', true);
                } else {
                    $('#EWebSupervisor1').prop('checked', true);
                }
                if (infoC.AppUsuario == "0") {
                    $('#EAppUsuario2').prop('checked', true);
                } else {
                    $('#EAppUsuario1').prop('checked', true);
                }
                if (infoC.WebUsuario == "0") {
                    $('#EWebUsuario2').prop('checked', true);
                } else {
                    $('#EWebUsuario1').prop('checked', true);
                }
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del puesto.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditPuesto').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarPuestos.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tablePuestos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar el puesto.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});