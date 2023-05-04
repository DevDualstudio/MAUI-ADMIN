//Buscar Empleados
function listado_empleados_ventas() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaEmpleados.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "usuario_venta", "Usuario");
                CrearOption(select, "UsuarioV", "Usuario");
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener el listado de usuarios.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
}
//Buscar Clientes
function listado_clientes_ventas() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaClientes.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "cliente_venta", "Cliente");
                CrearOption(select, "ClienteV", "Cliente");
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener el listado de Clientes.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
}
//Buscar Tipos de Venta
function listado_tipos_ventas() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaTiposVenta.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "tipo_venta", "Tipo de Venta");
                CrearOption(select, "TipoV", "Tipo de Venta");
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

//Función para actualizar el ajax
function cambiar_url_ventas() {
    var select = $('#select').val()
    var select2 = $('#orden_venta').val()
    var select3 = $('#usuario_venta').val()
    var select4 = $('#tipo_venta').val()
    var select5 = $('#cliente_venta').val()
    var select6 = $('#fechai_venta').val()
    var select7 = $('#fechaf_venta').val()
    console.log("php/datatables_MostrarListaVentas.php?select=" + select + "&select2=" + select2 + "&select3=" + select3 + "&select4=" + select4 + "&select5=" + select5 + "&select6=" + select6 + "&select7=" + select7)
    tableVentas.ajax.url("php/datatables_MostrarListaVentas.php?select=" + select + "&select2=" + select2 + "&select3=" + select3 + "&select4=" + select4 + "&select5=" + select5 + "&select6=" + select6 + "&select7=" + select7);
    window.tableVentas.ajax.reload();
}
function select_option(value, name) {
    $('#select').val(value)
    document.querySelector('#btnselect').innerText = name;

    $('#select2').hide();
    $('#select3').hide();
    $('#select4').hide();
    $('#select5').hide();
    $('#select6').hide();
    $('#select7').hide();

    switch (value) {
        case 2:
            $('#select2').show();
            break;
        case 3:
            $('#select3').show();
            break;
        case 4:
            $('#select4').show();
            break;
        case 5:
            $('#select5').show();
            break;
        case 6:
            $('#select6').show();
            break;
        case 7:
            $('#select6').show();
            $('#select7').show();
            break;
    }
}
//Agregar Ventas
$("#insertVenta").on("show.bs.modal", function (event) {
    $("#UsuarioV").val("t");
    $("#TipoV").val("t");
    $("#ClienteV").val("t");
    $("#SubtotalV").val("");
    $("#IVAV").val("");
    $("#TotalV").val("");
});
$('#formInsertVenta').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarVenta.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableVentas)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear la venta.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Editar Ventas
$("#editVenta").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EIDV").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarVenta.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#ESubtotalV").val(infoC.Subtotal);
                $("#EIVAV").val(infoC.IVA);
                $("#ETotalV").val(infoC.Total);
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información de la venta.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditVenta').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarVenta.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableVentas)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar la venta.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Cancla ventas
$("#cancelVenta").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#ECIDV").val(ID);
    document.querySelector('#advertencia').innerText = "¿Desea cancelar la venta N° " + ID + "?";
});
$('#formCancelVenta').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/VentaCancelada.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableVentas)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de cancelar la venta.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});