//Buscar Empleados
function listado_empleados_guias() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaEmpleados.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "chofer_guia", "Chofer");
                CrearOption(select, "ChoferG", "Chofer");
                CrearOption(select, "EChoferG", "Chofer");
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
//Buscar Clientes
function listado_clientes_guias() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaClientes.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "cliente_guia", "Cliente");
                CrearOption(select, "ClienteG", "Cliente");
                CrearOption(select, "EClienteG", "Cliente");
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
//Buscar Destinos
function listado_destinos_guias() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaDestinos.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "destino_guia", "Destino");
                CrearOption(select, "DestinoG", "Destino");
                CrearOption(select, "EDestinoG", "Destino");
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
//Buscar Origenes
function listado_origenes_guias() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaOrigenes.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "origen_guia", "Origen");
                CrearOption(select, "OrigenG", "Origen");
                CrearOption(select, "EOrigenG", "Origen");
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

//Buscar Origenes
function listado_estatus_guias() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaEstatusGuia.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOption(select, "EEstatusGuia", "Estatus");
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener el listado estatus de las guías.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
}

//Buscar Vehiculos
function listado_vehiculos_guias() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaVehiculos.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOptionVehiculos(select, "VehiculoG", "Vehículo");
                CrearOptionVehiculos(select, "EVehiculoG", "Vehículo");
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
function CrearOptionVehiculos(select, idselect, categoria) {
    var optiondefault = '<option value="t" selected>Seleccione un ' + categoria + '</option>';
    $("#" + idselect).append(optiondefault);
    for (var i = 0; i < select.length; i++) {
        var selecti = select[i];
        var id = selecti.Id;
        var Placas = selecti.Placas;

        var option = '<option value="' + id + '">' + Placas + '</option>';
        $("#" + idselect).append(option);
        $("#" + idselect).val("t");
    }
}

//Buscar Ventas
function listado_ventas_guias() {
    $.ajax({
        type: "POST",
        url: "php/MostrarListaVentas.php",
        data: {},
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const select = json["data"];
                CrearOptionVentas(select, "VentaG", "Venta");
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
function CrearOptionVentas(select, idselect, categoria) {
    var optiondefault = '<option value="t" selected>Seleccione un ' + categoria + '</option>';
    $("#" + idselect).append(optiondefault);
    for (var i = 0; i < select.length; i++) {
        var selecti = select[i];
        var id = selecti.Id;

        var option = '<option value="' + id + '">Venta N°' + id + '</option>';
        $("#" + idselect).append(option);
        $("#" + idselect).val("t");
    }
}
//Función para actualizar el ajax
function cambiar_url_guias() {
    var estatus = $('#estatus').val()
    var select = $('#select').val()
    var select2 = $('#orden_guia').val()
    var select3 = $('#cliente_guia').val()
    var select4 = $('#origen_guia').val()
    var select5 = $('#destino_guia').val()
    var select6 = $('#chofer_guia').val()
    var select8 = $('#fechai_guia').val()
    var select9 = $('#fechaf_guia').val()
    console.log("php/datatables_MostrarListaGuias.php?estatus=" + estatus + "&select=" + select + "&select2=" + select2 + "&select3=" + select3 + "&select4=" + select4 + "&select5=" + select5 + "&select6=" + select6 + "&select8=" + select8 + "&select9=" + select9)
    tableGuias.ajax.url("php/datatables_MostrarListaGuias.php?estatus=" + estatus + "&select=" + select + "&select2=" + select2 + "&select3=" + select3 + "&select4=" + select4 + "&select5=" + select5 + "&select6=" + select6 + "&select8=" + select8 + "&select9=" + select9);
    window.tableGuias.ajax.reload();
}
function estatus_option(value, name) {
    $('#estatus').val(value)
    document.querySelector('#btnestatus').innerText = name;
    cambiar_url_guias();
}

function select_option(value, name) {
    $('#select').val(value)
    document.querySelector('#btnselect').innerText = name;

    $('#select2').hide();
    $('#select3').hide();
    $('#select4').hide();
    $('#select5').hide();
    $('#select6').hide();
    $('#select8').hide();
    $('#select9').hide();

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
            break;
        case 8:
            $('#select8').show();
            break;
        case 9:
            $('#select8').show();
            $('#select9').show();
            break;
    }
}
//Agregar Guias
$("#insertGuia").on("show.bs.modal", function (event) {
    $("#ClienteG").val("t");
    $("#OrigenG").val("t");
    $("#DestinoG").val("t");
    $("#ChoferG").val("t");
    $("#VehiculoG").val("t");
    $("#VentaG").val("t");
    $("#DescripcionG").val("");
    $("#FechaExpG").val("");
});
$('#formInsertGuia').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/InsertarGuia.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableGuias)

            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const Id_Guia = json["data"];
                OpenTab(Id_Guia)
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de crear la Guia.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

//Editar Guias
$("#editGuia").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $("#EIDG").val(ID);
    $.ajax({
        type: "POST",
        url: "php/MostrarGuia.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $("#EClienteG").val(infoC.IdCliente);
                $("#EOrigenG").val(infoC.IdOrigen);
                $("#EDestinoG").val(infoC.IdDestino);
                $("#EChoferG").val(infoC.IdChofer);
                $("#EVehiculoG").val(infoC.IdVehiculo);
                $("#EDescripcionG").val(infoC.Descripcion);
                $("#EFechaExpG").val(infoC.FechaExpiracion);
                $("#EEstatusGuia").val(infoC.IdEstatus);
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información de la Guia.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});
$('#formEditGuia').submit(function (evt) {
    evt.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: "php/ActualizarGuia.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data)
            crear_notificacion_datatable(data, tableGuias)
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de actualizar la Guia.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

function cargar_tabla(id_guia) {
    $.ajax({
        type: 'POST',
        url: "php/tabla_guia.php",
        data: { Id: id_guia },
        success: function (data) {
            $('#tabla_guia').html(data);
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al momento de consultar el historial de la guía.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
}

//Ver Guias
$("#verGuia").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var ID = button.data("id");
    $.ajax({
        type: "POST",
        url: "php/MostrarGuia.php",
        data: { Id: ID },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                const infoC = json["data"];
                $('#EIDG').val(infoC.IdGuia)
                cargar_tabla(infoC.IdGuia)
                document.querySelector('#lblIdGuia').innerText = infoC.IdGuia;
                document.querySelector('#lblCliente').innerText = infoC.Cliente;
                document.querySelector('#lblChofer').innerText = infoC.Chofer;
                document.querySelector('#lblFechaExpiracion').innerText = infoC.FechaExpiracion;
                document.querySelector('#lblEstatus').innerText = infoC.Estatus;
                document.querySelector('#lblOrigen').innerText = infoC.Origen;
                document.querySelector('#lblDireccionOrigen').innerText = infoC.DireccionOrigen;
                document.querySelector('#lblColoniaOrigen').innerText = infoC.ColoniaOrigen;
                document.querySelector('#lblCPOrigen').innerText = infoC.CPOrigen;
                document.querySelector('#lblCiudadOrigen').innerText = infoC.CiudadOrigen;
                document.querySelector('#lblEstadoOrigen').innerText = infoC.EstadoOrigen;
                document.querySelector('#lblPaisOrigen').innerText = infoC.PaisOrigen;
                document.querySelector('#lblDestino').innerText = infoC.Destino;
                document.querySelector('#lblDireccionDestino').innerText = infoC.DireccionDestino;
                document.querySelector('#lblColoniaDestino').innerText = infoC.ColoniaDestino;
                document.querySelector('#lblCPDestino').innerText = infoC.CPDestino;
                document.querySelector('#lblCiudadDestino').innerText = infoC.CiudadDestino;
                document.querySelector('#lblEstadoDestino').innerText = infoC.EstadoDestino;
                document.querySelector('#lblPaisDestino').innerText = infoC.PaisDestino;
            } else {
                crear_swal_then(data, "")
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener la información de la Guia.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
});

function OpenTab(Id_Guia) {
    if (Id_Guia != "") {
        var pagina = "php/CrearPdf.php?Id=" + Id_Guia;
        window.open(pagina, "_blank");
    }
}

function buscarGuia() {
    var Id_Guia = $('#EIDG').val();
    OpenTab(Id_Guia)
}