//Agregar UsuarioPortal
$("#insertUsuarioPortal").on("show.bs.modal", function (event) {
    $("#EmailUP").val("");
    $("#PwdUD").val("");
    $("#EmpleadoUP").val("t");
});
$('#formInsertUsuarioPortal').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarUsuarioPortal.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableUsuarioPortal)
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

//Editar UsuarioPortal
$("#editUsuarioPortal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EIDUP").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarUsuarioPortal.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#EEmailUP").val(infoC.Correo);
                $("#EEmpleadoUP").val(infoC.IdEmpleado);
                if (infoC.Estatus == "Inactivo") {
                    $('#EEstatusUP2').prop('checked', true);
                } else {
                    $('#EEstatusUP1').prop('checked', true);
                }
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del Usuario Portal.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditUsuarioPortal').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarUsuarioPortal.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableUsuarioPortal)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar el Usuario Portal.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
function listado_empleados() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaEmpleados.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "EmpleadoUP", "Empleado");
                CrearOption(select, "EEmpleadoUP", "Empleado");
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener el listado de empleados.',
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
                data: { 'Id': valorId, 'Tabla': 'usuariosportal', 'CampoID': 'usr_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tableUsuarioPortal)
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
//Editar UsuarioPortal
$("#editContraUsuarioPortal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#ECIDUP").val(ID);
    $("#ECPwdUD").val("");
});
$('#formEditContraUsuarioPortal').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarPasswordUsuarioPortal.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableUsuarioPortal)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar la contraseña del Usuario Portal.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});