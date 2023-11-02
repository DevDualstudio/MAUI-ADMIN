//Buscar Puestos
function listado_puestos() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaPuestos.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "PuestoE", "Puesto");
                CrearOption(select, "EPuestoE", "Puesto");
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

//Buscar Empleados
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
                data: { 'Id': valorId, 'Tabla': 'Empleados', 'CampoID': 'em_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tableEmpleados)
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
//Agregar Empleadoes
$("#insertEmpleado").on("show.bs.modal", function (event) {
    $('#NEmpleadoE').val("");
    $('#NombreE').val("");
    $('#DireccionE').val("");
    $('#ColoniaE').val("");
    $('#CPE').val("");
    $('#CiudadE').val("");
    $('#EstadoE').val("");
    $('#PaisE').val("");
    $('#TelefonoE').val("");
    $('#CelularE').val("");
    $('#EmailE').val("");
    $('#CURPE').val("");
    $('#RFCE').val("");
    $('#NSSE').val("");
    $('#LicenciaE').val("");
    $('#PuestoE').val("t");
    $('#ImagenE').val("");
});
$('#formInsertEmpleado').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);
    if ( validaRfc( $( '#RFCE' ).val() ) ) {
        $.ajax({
            type: 'POST',
            url: "php/InsertarEmpleado.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                var info = JSON.parse( data );
                crear_notificacion_datatable(data, tableEmpleados)
                if ( info.code == '200' ) {
                    popup( 'insertEmpleado', false );
                }
            },
            error: function (data) {
                swal({
                    title: 'Error',
                    text: 'Ocurrió un error en el servidor al tratar de crear el Empleado.',
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    } else {
        swal({
            title: 'RFC Invalido',
            text: 'Favor de ingresar un RFC valido para continuar',
            icon: "error",
            button: "Aceptar",
        });
    }
});

function popup( contenedor, status ) {
	if ( status ) {
		$( '#' + contenedor ).modal( 'show' );
	} else {
		$( '#' + contenedor ).modal( 'hide' );
	}
}

//Editar Empleadoes
$("#editEmpleado").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EIDE").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarEmpleado.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#ENEmpleadoE").val(infoC.NoEmpleado);
                $("#ENombreE").val(infoC.Nombre);
                $("#EDireccionE").val(infoC.Direccion);
                $("#EColoniaE").val(infoC.Colonia);
                $("#ECPE").val(infoC.CP);
                $("#ECiudadE").val(infoC.Ciudad);
                $("#EEstadoE").val(infoC.Estado);
                $("#EPaisE").val(infoC.Pais);
                $("#ETelefonoE").val(infoC.Telefono);
                $("#ECelularE").val(infoC.Celular);
                $("#ECURPE").val(infoC.CURP);
                $("#ERFCE").val(infoC.RFC);
                $("#ENSSE").val(infoC.NSS);
                $("#ELicenciaE").val(infoC.NoLicencia);
                $("#EPuestoE").val(infoC.IdPuesto);
                $("#EEmailE").val(infoC.Correo);
                $("#EImagenE").val(infoC.Imagen);
                $("#EVigenciaLE").val(infoC.VigenciaLicencia);
                if (infoC.Estatus == "ACTIVO") {
                    $('#EEstatusE1').prop('checked', true);
                } else {
                    $('#EEstatusE2').prop('checked', true);
                }
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del Empleado.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditEmpleado').submit(function (evt) {
    console.log("formEditEmpleado")
    evt.preventDefault();
    var formData = new FormData(this);
    if ( validaRfc( $( '#ERFCE' ).val() ) ) {
        $.ajax({
            type: 'POST',
            url: "php/ActualizarEmpleado.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                var info = JSON.parse( data );
                crear_notificacion_datatable(data, tableEmpleados)
                if ( info.code == '200' ) {
                    popup( 'editEmpleado', false );
                }
            },
            error: function (data) {
                swal({
                    title: 'Error',
                    text: 'Ocurrió un error en el servidor al tratar de actualizar el Empleado.',
                    icon: "error",
                    button: "Aceptar",
                });
            }
        });
    } else {
        swal({
            title: 'RFC Invalido',
            text: 'Favor de ingresar un RFC valido para continuar',
            icon: "error",
            button: "Aceptar",
        });
    }
});
function validaRfc( rfcStr ) {
	var strCorrecta;
	strCorrecta = rfcStr;	
	if ( rfcStr.length == 12 ){
	    var valid = '^(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
	} else {
	    var valid = '^(([A-Z]|[a-z]|\s){1})(([A-Z]|[a-z]){3})([0-9]{6})((([A-Z]|[a-z]|[0-9]){3}))';
	}
	var validRfc=new RegExp(valid);
	var matchArray=strCorrecta.match(validRfc);
	if ( matchArray==null ) {
		return false;
	} else {
		return true;
	}
}