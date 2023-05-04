$(document).ready(function () {

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
    window.tableVehiculos = $('#vehiculostable').DataTable({
        "processing": true,
        responsive: false,
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Blfrtip',
        "ajax": {
            "url": "php/datatables_MostrarListaVehiculos.php",
            "type": "POST"
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        "columns": [{
            "data": "Id"
        },
        {
            "data": "Placas"
        },
        {
            "data": "NoSerie"
        },
        {
            "data": "Marca"
        },
        {
            "data": "Modelo"
        },
        {
            "data": "Año"
        },
        {
            "data": "Tipo"
        },
        {
            "data": "FechaAlta"
        },
        {
            "data": "Estatus"
        },
        {
            "data": "IdChofer"
        },
        {
            "data": "Chofer"
        },
        {
            "data": "Id",
            "render": function (data, type, row) {
                var btnmostrar = '<td>';
                btnmostrar += '<button class="btn btn-mprimary-100 text-light" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#editVehiculo">Editar</button>';
                btnmostrar += '<button class="btn btn-msecondary-100 text-light" onclick="eliminaRegistro( ' + data + ' )">Borrar</button>';
                btnmostrar += '</td>';
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
            $('#vehiculostable thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar" />');
                $('input', this).on('keyup change', function () {
                    if (tableVehiculos.column(i).search() !== this.value) {

                        tableVehiculos
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });

            });

        }
    });

    tableVehiculos.on('responsive-resize', function (e, datatable, columns) {
        hideSearchInputs(columns);
    });
});