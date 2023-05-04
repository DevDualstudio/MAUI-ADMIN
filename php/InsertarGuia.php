<?php
include '../controller/guias-controller.php';
$mdl = new GuiaController;
//Selects
$Cliente = $_POST['ClienteG']; //
$Origen = $_POST['OrigenG']; //
$Destino = $_POST['DestinoG']; //
$Chofer = $_POST['ChoferG']; //
$Vehiculo = $_POST['VehiculoG'];
$Venta = $_POST['VentaG'];

$Descripcion = $_POST['DescripcionG'];
$FechaExpiracion = $_POST['FechaExpG'];

if (
    $Descripcion == "" || $FechaExpiracion == "" || $Cliente == "" || $Cliente == "t" || $Origen == "" || $Origen == "t" || $Destino == "" || $Destino == "t"
    || $Chofer == "" || $Chofer == "t" || $Vehiculo == "" || $Vehiculo == "t" || $Venta == "" || $Venta == "t"
) {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los datos se encuentra vacío.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

$respuesta = $mdl->ctrInsertarGuia($Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Venta);
echo json_encode($respuesta);
