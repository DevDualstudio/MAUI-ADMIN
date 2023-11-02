var tablaActual = 'manifiestos';
var guias = [];
$( document ).ready( function() {
    armaTabla();
    optionsTabla( 'empleados', [ 'em_id' ] );
    optionsTabla( 'statusmanifiesto', [ 'statusId' ] );
    optionsTabla( 'statusguia', [ 'statusGuia' ] );
    optionsTabla( 'guias', [ 'guiaId' ] );
    $( '#formManifiesto' ).submit( function( e ) {
        e.preventDefault();
        if ( guias.length > 0 ) {
            var data = {
                'manifiestoId': $( '#manifiestoId' ).val(),
                'em_id': $( '#em_id' ).val(),
                'statusId': $( '#statusId' ).val(),
                'guias': guias.length,
                'detalle': guias,
            };
            $.ajax({
                type: "POST",
                url: "php/TablaManifiesto.php",
                data: data,
                success: function (response) {
                    crear_swal_then( response, "" );
                    listaDataTable();
                    modal( 'modalManifiesto', false );
                },
                error: function (data) {
                    swal({
                        title: 'Error',
                        text: 'Hubo un error almacenando la información',
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            } );
        } else {
            swal({
                title: 'Error',
                text: 'Debe elegir al menos una guia para continuar',
                icon: "error",
                button: "Aceptar",
            });
        }
    } );
    $( '#formGuia' ).submit( function( e ) {
        e.preventDefault();
        guias.push( {
            'guiaId': $( '#guiaId' ).val(),
            'statusId': $( '#statusGuia' ).val(),
            'observaciones': $( '#observaciones' ).val()
        } );
        cargaGuias();
        modal( 'modalGuia', false );
    } );
    $( '#modalGuia' ).on( 'hide.bs.modal', function() {
        cargaGuias();
        modal( 'modalManifiesto', true );
    } );
} );
function iniciaManifiesto() {
    guias = [];
    $( '#manifiestoId' ).val( 0 );
    $( '#formManifiesto' )[0].reset();
    cargaGuias();
    modal( 'modalManifiesto', true );
}
function iniciaGuia() {
    if ( $( '#guiaId' ).val() != '' ) {
        $( '#formGuia' )[0].reset();
        modal( 'modalManifiesto', false );
        modal( 'modalGuia', true );
    } else {
        swal({
            title: 'Error',
            text: 'Debe elegir una guia para continuar',
            icon: "error",
            button: "Aceptar",
        });
    }
}
function editaItem( id ) {
    guias = [];
    $.ajax({
        type: "POST",
        url: "php/TablaDetalleManifiesto.php",
        data: { 'id': id },
        success: function (response) {
            var json = JSON.parse(response);
            const code = parseInt(json["code"]);
            if (code >= 200 && code <= 299) {
                $.each( json["data"]["detalle"], function( indice, guia ) {
                    guias.push( {
                        'guiaId': guia.gui_id,
                        'statusId': guia.statusId,
                        'observaciones': guia.observaciones
                    } );
                } );
                $( '#manifiestoId' ).val( json["data"]["manifiestoId"] );
                $( '#em_id' ).val( json["data"]["em_id"] );
                $( '#statusId' ).val( json["data"]["statusId"] );
                cargaGuias();
                modal( 'modalManifiesto', true );
            } else {
                crear_swal_then(response, "");
            }
        },
        error: function (data) {
            swal({
                title: 'Error',
                text: 'Hubo un error almacenando la información',
                icon: "error",
                button: "Aceptar",
            });
        }
    } );
}
function cargaGuias() {
    var html = '';
    if ( guias.length > 0 ) {
        $.each( guias, function( indice, guia ) {
            var guiaTxt = $( '#guiaId option[value="' + guia.guiaId + '"]' ).text();
            var statusTxt = $( '#statusGuia option[value="' + guia.statusId + '"]' ).text();
            html += '<tr>';
            html += '<td><a class="btn btn-msecondary-100 text-light" onclick="borraGuia( ' + indice + ' )"><i class="fa-solid fa-trash mr-2"></i></a></td>';
            html += '<td>' + guiaTxt + '</td>';
            html += '<td>' + statusTxt + '</td>';
            html += '<td>' + guia.observaciones + '</td>';
            html += '</tr>';
        } );
    } else {
        html += '<tr><td colspan="4" align="center">No hay guias elegidas actualmente</td></tr>';
    }
    $( '#guiaManifiesto' ).html( html );
}