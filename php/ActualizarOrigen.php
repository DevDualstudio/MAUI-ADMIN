<?php
include '../controller/origen-controller.php';
$mdl = new OrigenController;

$Id = $_POST['EOID'];
$Nombre = $_POST['ENombreO'];
$Direccion = $_POST['EDireccionO'];
$Colonia = $_POST['EColoniaO'];
$CP = $_POST['ECPO'];
$Ciudad = $_POST['ECiudadO'];
$Estado = $_POST['EEstadoO'];
$Pais = $_POST['EPaisO'];

if ($Nombre == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarOrigen($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais);
echo json_encode($respuesta);
