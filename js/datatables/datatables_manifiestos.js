$(document).ready(function () {
    listado_empleados_guias()
    listado_guias_activas()
    
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
    window.tableManifiesto = $('#manifiestoTable').DataTable({
        "processing": true,
        responsive: false,
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Blfrtip',
        "ajax": {
            "url": "php/datatables_MostrarListaGuiasActivas.php",
            "type": "POST"
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        "columns": [
            {
                "data": "ManifiestoId"
            },
            {
                "data": "Chofer"
            },
            {
                "data": "Guias"
            },
            {
                "data": "Fecha"
            },
            {
                "data": "Estatus"
            },
            {
                "data": "ManifiestoId",
                "render": function (data, type, row) {
                    var btnmostrar = '<td>';
                    btnmostrar += '<button class="btn btn-mprimary-100 text-light" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#editManifiesto">Editar</button>';
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
            $('#manifiestoTable thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar" />');
                $('input', this).on('keyup change', function () {
                    if (tableManifiesto.column(i).search() !== this.value) {
                        tableManifiesto
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
        }
    });

    tableManifiesto.on('responsive-resize', function (e, datatable, columns) {
        hideSearchInputs(columns);
    });
});