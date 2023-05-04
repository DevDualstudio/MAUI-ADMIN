<?php
include '../controller/vehiculo-controller.php';
$mdl = new VehiculoController;

$VID = $_POST['VID'];
$Placas = $_POST['EPlacas'];
$NSerie = $_POST['ENSerie'];
$Marca = $_POST['EMarca'];
$Modelo = $_POST['EModelo'];
$Year = $_POST['EYear'];
$Tipo = $_POST['ETipo'];
$Chofer = $_POST['EChofer'];
$Estatus = $_POST['EVEstatus'];

if ($Chofer == "" || $Chofer == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un chofer.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

if ($VID == "" || $Placas == "" || $NSerie == "" || $Marca == "" || $Modelo == "" || $Year == "" || $Tipo == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los campos obligatorios está vacío.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarVehiculos($VID, $Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer, $Estatus);
echo json_encode($respuesta);
