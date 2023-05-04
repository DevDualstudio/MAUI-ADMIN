<?php
include '../controller/origen-controller.php';
$mdl = new OrigenController;

$Nombre = $_POST['NombreO'];
$Direccion = $_POST['DireccionO'];
$Colonia = $_POST['ColoniaO'];
$CP = $_POST['CPO'];
$Ciudad = $_POST['CiudadO'];
$Estado = $_POST['EstadoO'];
$Pais = $_POST['PaisO'];

if ($Nombre == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarOrigen($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais);
echo json_encode($respuesta);
