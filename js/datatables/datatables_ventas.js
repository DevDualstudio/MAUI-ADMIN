$(document).ready(function () {
    $('#select2').hide();
    $('#select3').hide();
    $('#select4').hide();
    $('#select5').hide();
    $('#select6').hide();
    $('#select7').hide();
    listado_empleados_ventas()
    listado_clientes_ventas()
    listado_tipos_ventas()

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
    window.tableVentas = $('#ventastable').DataTable({
        "processing": true,
        responsive: false,
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Blfrtip',
        "ajax": {
            "url": "php/datatables_MostrarListaVentas.php?select=1&select2=&select3=&select4=&select5=&select6=&select7=",
            "type": "POST"
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        "columns": [{
            "data": "Id"
        },
        {
            "data": "FechaVenta"
        },
        {
            "data": "Usuario"
        },
        {
            "data": "TipoVenta"
        },
        {
            "data": "Cliente"
        },
        {
            "data": "Subtotal"
        },
        {
            "data": "IVA"
        },
        {
            "data": "Total"
        },
        {
            "data": "Factura"
        },
        {
            "data": "Estatus"
        },
        {
            "data": "Observaciones"
        },
        {
            "data": "Id",
            "render": function (data, type, row) {
                var Estatus = row['Estatus'];
                if (Estatus == "Activa") {
                    var btnmostrar = '<td><button class="btn btn-mprimary-100 text-light" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#cancelVenta">Cancelar</button></td>';
                } else {
                    var btnmostrar = '<td><button class="btn btn-mprimary-100 text-light" data-bs-toggle="modal" data-bs-target="#cancelVenta" disabled>Cancelar</button></td>';
                }
                return btnmostrar;
            }
        },
        {
            "data": "Id",
            "render": function (data, type, row) {
                var btnmostrar = '<td><button class="btn btn-mprimary-100 text-light" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#editVenta">Editar</button></td>';
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
            $('#ventastable thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar" />');
                $('input', this).on('keyup change', function () {
                    if (tableVentas.column(i).search() !== this.value) {

                        tableVentas
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });

            });

        }
    });

    tableVentas.on('responsive-resize', function (e, datatable, columns) {
        hideSearchInputs(columns);
    });
});