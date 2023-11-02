<?php
include '../controller/general-controller.php';
$mdl = new GeneralController;

$datos = array(
    'manifiestoId' => $_REQUEST[ 'manifiestoId' ],
    'em_id' => $_REQUEST[ 'em_id' ],
    'statusId' => $_REQUEST[ 'statusId' ],
    'guias' => $_REQUEST[ 'guias' ],
    'fecha' => date( 'Y-m-d h:i:s' )
);
$guiaManifiesto = $_REQUEST[ 'detalle' ];

if ( $datos[ 'em_id' ] == "" || $datos[ 'guias' ] == 0 ) {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Información no proporcionada";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
if ( $datos[ 'manifiestoId' ] == 0 ) {
    $respuesta = $mdl->ctrInsertaItem( 'manifiestos', $datos );
    $manifiestoId = $respuesta[ 'data' ];
} else {
    $respuesta = $mdl->ctrActualizaItem( 'manifiestos', $datos );
    $manifiestoId = $datos[ 'manifiestoId' ];
    $clean = array( 'campo' => 'manifiestoId', 'id' => $manifiestoId );
    $mdl->ctrEliminaItemCampo( 'guiamanifiesto', $clean );
}
foreach ( $guiaManifiesto as $guia ) {
    $datos = array(
        'manifiestoId' => $manifiestoId,
        'gui_id' => $guia[ 'guiaId' ],
        'statusId' => $guia[ 'statusId' ],
        'observaciones' => $guia[ 'observaciones' ],
    );
    $mdl->ctrInsertaItem( 'guiamanifiesto', $datos );
}
echo json_encode($respuesta);