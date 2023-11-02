var columnas = [];
var dtTable;
function armaTabla() {
    $.ajax({
        type: "POST",
        url: "php/TablaContent.php",
        data: { 'tabla': tablaActual },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                columnas = json[ 'data' ];
                var html = '<tr>';
                var htmlFilters = '<tr>';
                $.each( columnas, function( indice, columna ) {
                    html += '<th>' + columna + '</th>';
                    htmlFilters += '<th>' + columna + '</th>';
                } );
                html += '</tr>';
                htmlFilters += '</tr>';
                $( '#generalHead' ).html( html + htmlFilters );
                listaDataTable();
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
function optionsTabla( tabla, campo ) {
    $.ajax({
        type: "POST",
        url: "php/TablaOptions.php",
        data: { 'tabla': tabla },
        success: function (data) {
            var html = '';
            $.each( campo, function( indice, campoOpcion ) {
                if ( !$( '#' + campoOpcion ).prop( 'multiple' ) ) {
                    html = '<option value="">Elige una opción</option>';
                }
            } );
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                $.each( json["data"], function( indice, valor ) {
                    html += '<option value="' + indice + '">' + valor + '</option>';
                } );
            }
            $.each( campo, function( indice, campoOpcion ) {
                $( '#' + campoOpcion ).html( html );
            } );
        },
        error: function (data) {
            $.each( campo, function( indice, campoOpcion ) {
                $( '#' + campoOpcion ).html( html );
            } );
        }
    });
}
function listaDataTable() {
    var i = 0;
    var columns = [];
    $.each( columnas, function( indice, columna ) {
        columns[i] = { 'name': columna };
        i++;
    } );
    console.log( columns );
    dtTable = $( '#generalTable').DataTable({
        'bDestroy': true,
        'processing': true,
        "ajax": {
            "url": "php/TablaDatos.php?tabla=" + tablaActual + "&datatable=1",
            "type": "POST"
        },
        language: { url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json' },
        "columns": columns,
        initComplete: function () {
            var api = this.api();
            $('#generalTable thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Buscar" />');
                $('input', this).on('keyup change', function () {
                    if ( dtTable.column(i).search() !== this.value ) {
                        dtTable.column(i).search(this.value).draw();
                    }
                });
            });
        }
    });
}
function listaTabla() {
    $.ajax({
        type: "POST",
        url: "php/TablaDatos.php",
        data: { 'tabla': tablaActual },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                console.log( json[ 'data' ] );
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
function listaItem( id, modalContainer ) {
    $.ajax({
        type: "POST",
        url: "php/TablaItem.php",
        data: { 'tabla': tablaActual, 'id': id },
        success: function (data) {
            var json = JSON.parse(data);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                var info = json["data"];
                $.each( info, function( key, value ) {
                    var elementoHTML = $( '#' + key );
                    elementoHTML.val( value );
                } );
                if ( modalContainer != '' ) {
                    modal( modalContainer, true );
                }
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
function accionTabla( tabla, accion, data, modalContainer ) {
    $.ajax({
        type: "POST",
        url: "php/TablaInserta.php",
        data: { 'tabla': tabla, 'action': accion, 'datos': data },
        success: function ( response ) {
            var json = JSON.parse(response);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                crear_swal_then( response, "" );
                listaDataTable();
                if ( modalContainer != '' ) {
                    modal( modalContainer, false );
                }
            } else {
                crear_swal_then( response, "" );
            }
        },
        error: function(response) {
            swal({
                title: 'Error',
                text: 'Ocurrió un error en el servidor al tratar de obtener el listado de choferes.',
                icon: "error",
                button: "Aceptar",
            });
        }
    });
}
function hideSearchInputs(columns) {
    for (i = 0; i < columns.length; i++) {
        if (columns[i]) {
            $('.filterhead:eq(' + i + ')').show();
        } else {
            $('.filterhead:eq(' + i + ')').hide();
        }
    }
}
function modal( contenedor, status ) {
    if ( status ) {
		$( '#' + contenedor ).modal( 'show' );
	} else {
		$( '#' + contenedor ).modal( 'hide' );
	}
}
function eliminaItem( id ) {
    swal( {
		title: 'Confirmar',
		text: '¿Seguro de eliminar este registro, podría generar un conflicto si esta siendo utilizado en otra sección, en dicho caso debera ir a la sección que interfiera y eliminar primero el registro involucrado?',
		icon: 'warning',
		buttons: [ 'NO', 'SI' ],
		dangerMode: true,
	} ).then( ( desicion ) => {
		if ( desicion ) {
            accionTabla( tablaActual, 'Elimina', id, '' );
        }
    } );
}