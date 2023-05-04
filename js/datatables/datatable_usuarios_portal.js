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
    window.tableUsuarioPortal = $('#UsuarioPortaltable').DataTable({
        "processing": true,
        responsive: false,
        orderCellsTop: true,
        fixedHeader: true,
        dom: 'Blfrtip',
        "ajax": {
            "url": "php/datatables_MostrarListaUsuariosPortal.php",
            "type": "POST"
        },
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        "columns": [
            {
                "data": "Id"
            },
            {
                "data": "NombreEmpleado"
            },
            {
                "data": "Id",
                "render": function (data, type, row) {
                    var btnmostrar = '<td><button class="btn btn-mprimary-100 text-light" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#editContraUsuarioPortal">Editar</button></td>';
                    return btnmostrar;
                }
            },
            {
                "data": "Correo"
            },
            {
                "data": "NombrePuesto"
            },
            {
                "data": "Estatus",
                "render": function (data, type, row) {
                    if (data == "Activo") {
                        var btnmostrar = '<td><i class="fa-solid fa-circle-dot mr-2 text-success"></i> Activo</td>';
                    } else {
                        var btnmostrar = '<td><i class="fa-solid fa-circle-dot mr-2 text-muted"></i> Inactivo</td>';
                    }
                    return btnmostrar;
                }
            },
            {
                "data": "Id",
                "render": function (data, type, row) {
                    var btnmostrar = '<td>';
                    btnmostrar += '<button class="btn btn-mprimary-100 text-light" data-id="' + data + '" data-bs-toggle="modal" data-bs-target="#editUsuarioPortal">Editar</button>';
                    btnmostrar += '<button class="btn btn-msecondary-100 text-light" onclick="eliminaRegistro( ' + data + ' )">Borrar</button>';
                    btnmostrar += '</td>';
                    return btnmostrar;
                }
            }
        ],
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
            $('#UsuarioPortaltable thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar" />');
                $('input', this).on('keyup change', function () {
                    if (tableUsuarioPortal.column(i).search() !== this.value) {

                        tableUsuarioPortal
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });

            });

        }
    });

    tableUsuarioPortal.on('responsive-resize', function (e, datatable, columns) {
        hideSearchInputs(columns);
    });
});