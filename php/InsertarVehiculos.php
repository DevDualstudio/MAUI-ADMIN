<?php
include '../controller/vehiculo-controller.php';
$mdl = new VehiculoController;

$Placas = $_POST['Placas'];
$NSerie = $_POST['NSerie'];
$Marca = $_POST['Marca'];
$Modelo = $_POST['Modelo'];
$Year = $_POST['Year'];
$Tipo = $_POST['Tipo'];
$Chofer = $_POST['Chofer'];

if ($Chofer == "" || $Chofer == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un chofer.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

if ($Placas == "" || $NSerie == "" || $Marca == "" || $Modelo == "" || $Year == "" || $Tipo == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los campos obligatorios está vacío.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarVehiculos($Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer);
echo json_encode($respuesta);
