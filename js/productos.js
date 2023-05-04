//Agregar Productos
$("#insertProducto").on("show.bs.modal", function (event) {
    $("#NombrePr").val("");
    $("#DescripPr").val("");
    $("#ExpiracionPr").val("");
    $("#PrecioPr").val("");
});
$('#formInsertProducto').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarProducto.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableProductos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear el Producto.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
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
                data: { 'Id': valorId, 'Tabla': 'productos', 'CampoID': 'pro_id' },
                success: function (data) {
                    var json = JSON.parse(data);
                    const code = parseInt(json["code"]);
                    if (code >= 200 && code <= 299) {
                        crear_notificacion_datatable(data, tableProductos)
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
//Editar Productos
$("#editProducto").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EIDPr").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarProducto.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#ENombrePr").val(infoC.Nombre);
                $("#EDescripPr").val(infoC.Descripcion);
                $("#EExpiracionPr").val(infoC.Expiracion);
                $("#EPrecioPr").val(infoC.Precio);
                if (infoC.Estatus == "Inactivo") {
                    $('#EEstatusPr2').prop('checked', true);
                } else {
                    $('#EEstatusPr1').prop('checked', true);
                }
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información del Producto.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditProducto').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarProducto.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableProductos)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar el Producto.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});