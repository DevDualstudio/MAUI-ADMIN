var tablaActual = 'tarifario';
$( document ).ready( function() {
    armaTabla();
    optionsTabla( 'zonas', [ 'origen', 'destino' ] );
    $( '#formTarifario' ).submit( function( e ) {
        e.preventDefault();
        var data = {
            'tarifaId': $( '#tarifaId' ).val(),
            'origen': $( '#origen' ).val(),
            'destino': $( '#destino' ).val(),
            'precioPeso': $( '#precioPeso' ).val(),
            'precioVolumen': $( '#precioVolumen' ).val()
        };
        if ( $( '#origen' ).val() != $( '#destino' ).val() ) {
            var accion = ( $( '#tarifaId' ).val() == 0 ) ? 'Inserta' : 'Actualiza';
            accionTabla( tablaActual, accion, data, 'modalTarifario' );
        } else {
            swal({
                title: 'Error',
                text: 'El lugar de origen y de destino deben ser diferentes',
                icon: "error",
                button: "Aceptar",
            });
        }
    } );
    $( '#formZona' ).submit( function( e ) {
        e.preventDefault();
        var data = {
            'zonaId': $( '#zonaId' ).val(),
            'nombre': $( '#nombre' ).val()
        };
        var accion = ( $( '#zonaId' ).val() == 0 ) ? 'Inserta' : 'Actualiza';
        accionTabla( 'zonas', accion, data, 'zonasModal' );
    } );
    $( '#zonasModal' ).on( 'hide.bs.modal', function() {
        optionsTabla( 'zonas', [ 'origen', 'destino' ] );
        modal( 'modalTarifario', true );
    } );
} );
function iniciaTarifa() {
    $( '#tarifaId' ).val( 0 );
    $( '#formTarifario' )[0].reset();
    modal( 'modalTarifario', true );
}
function iniciaZona() {
    $( '#zonaId' ).val( 0 );
    $( '#formZona' )[0].reset();
    modal( 'modalTarifario', false );
    modal( 'zonasModal', true );
}
function editaItem( id ) {
    listaItem( id, 'modalTarifario' );
}
