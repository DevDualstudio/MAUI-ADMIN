<?php
include '../controller/guias-controller.php';
$mdl = new GuiaController;
//Selects
$Id = $_POST['EIDG'];
$Cliente = $_POST['EClienteG'];
$Origen = $_POST['EOrigenG'];
$Destino = $_POST['EDestinoG'];
$Chofer = $_POST['EChoferG'];
$Vehiculo = $_POST['EVehiculoG'];
$Descripcion = $_POST['EDescripcionG'];
$FechaExpiracion = $_POST['EFechaExpG'];
$Estatus = $_POST['EEstatusGuia'];
if (
    $Descripcion == "" || $FechaExpiracion == "" || $Cliente == "" || $Cliente == "t" || $Origen == "" || $Origen == "t" ||
    $Destino == "" || $Destino == "t" || $Chofer == "" || $Chofer == "t" || $Vehiculo == "" || $Vehiculo == "t" || $Estatus == "" || $Estatus == "t"
) {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los datos se encuentra vacío.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

$respuesta = $mdl->ctrActualizarGuia($Id, $Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Estatus);
echo json_encode($respuesta);
