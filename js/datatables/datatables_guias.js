$(document).ready(function () {
    $('#select2').hide();
    $('#select3').hide();
    $('#select4').hide();
    $('#select5').hide();
    $('#select6').hide();
    $('#select8').hide();
    $('#select9').hide();

    listado_empleados_guias()
    listado_clientes_guias()
    listado_destinos_guias()
    listado_origenes_guias()
    listado_ventas_guias()
    listado_vehiculos_guias()
    listado_estatus_guias()

    // Itera la cantidad de thead que hay visibles en screen y esconde o muestra las thead
    function hideSearchInputs(columns) {
        for (i = 0; i < columns.length; i++) {
            if (columns[i]) {
                $('.filterhead:eq(' + i + ')').show();
            } else {
                $('.filterhead:eq(' + i + ')').hide();
            }
        }
    }
    window.tableGuias = $('#guiastable').DataTable({
        "processing": true,
        responsive: false,
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Blfrtip',
        "ajax": {
            "url": "php/datatables_MostrarListaGuias.php?estatus=0&select=1&select2=&select3=&select4=&select5=&select6=&select8=&select9=",
            "type": "POST"
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        "columns": [
            {
                "data": "IdGuia",
                "render": function (data, type, row) {
                    var Estatus = row['Estatus'];
                    var FechaExpiracion = row['FechaExpiracion'];
                    var col = '<h6 class="small m-0 fw-bold" >' + data + '</h6>' +
                        '<span class="badge bg-mprimary-100">' + Estatus + '</span>' +
                        '<span class="d-block small text-muted text-nowrap my-2">Última actualización:</span>' +
                        '<span class="d-block small text-muted my-2"> ' + FechaExpiracion + '</span>';
                    return col;
                }
            },
            {
                "data": "CiudadDestino",
                "render": function (data, type, row) {
                    var EstadoDestino = row['EstadoDestino'];
                    var PaisDestino = row['PaisDestino'];
                    var col = '<div class="row"><div class="col-sm-2"><img class="icon-guia" src="assets/icons/iconos--15.png" alt="icon"></div>' +
                        '<div class="col-sm-10"><p class="small mb-0 text-muted text-uppercase">Destino</p>' +
                        '<h6 class="fw-bold small mb-0">' + data + ', ' + EstadoDestino + ', ' + PaisDestino + '</h6></div></div>'
                    return col;
                }
            },
            {
                "data": "CiudadOrigen",
                "render": function (data, type, row) {
                    var EstadoOrigen = row['EstadoOrigen'];
                    var PaisOrigen = row['PaisOrigen'];
                    var col = '<div class="row"><div class="col-sm-2"><img class="icon-guia" src="assets/icons/iconos--14.png" alt="icon"></div>' +
                        '<div class="col-sm-10"><p class="small mb-0 text-muted text-uppercase">Origen</p>' +
                        '<h6 class="fw-bold small mb-0">' + data + ', ' + EstadoOrigen + ', ' + PaisOrigen + '</h6></div></div>'
                    return col;
                }
            },
            {
                "data": "IdGuia",
                "render": function (data, type, row) {
                    var col = '<p class="small mb-0 text-muted text-uppercase">FECHA DE ENTREGA ESTIMADA</p><h6 class="fw-bold small mb-0">20 FEB 2022</h6>';
                    return col;
                }
            },
            {
                "data": "IdGuia",
                "render": function (data, type, row) {
                    var col = '<p class="small mb-0 text-muted text-uppercase">TIPO</p><h6 class="fw-bold small mb-0">Envío Terrestre</h6>';
                    return col;
                }
            },
            {
                "data": "IdGuia",
                "render": function (data, type, row) {
                    var btnmostrar = '<button class="btn btn-mprimary-100 text-light guia-btn" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#editGuia">Editar</button></td>';
                    return btnmostrar;
                }
            },
            {
                "data": "IdGuia",
                "render": function (data, type, row) {
                    var btnmostrar = '<button class="btn btn-mprimary-100 text-light guia-btn text-nowrap" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#verGuia">Ver Detalles<i class="fa-solid fa-angle-right"></i></button>';
                    return btnmostrar;
                }
            }
        ],
        "columnDefs": [],
        "order": [
            [0, 'asc',],
        ],
        buttons: [],
        lengthMenu: [
            [25, 50, 100, -1],
            ['25', '50', '100', 'Mostrar todo']
        ],

        initComplete: function () {
            var api = this.api();
            $('#guiastable thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar" />');
                $('input', this).on('keyup change', function () {
                    if (tableGuias.column(i).search() !== this.value) {

                        tableGuias
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });

            });

        }
    });

    tableGuias.on('responsive-resize', function (e, datatable, columns) {
        hideSearchInputs(columns);
    });
});