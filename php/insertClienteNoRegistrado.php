<?php
include '../controller/client-controller.php';
$mdl = new ClientController;

$Nombre = $_POST['Nombre'];
$Direccion = $_POST['Direccion'];
$Colonia = $_POST['Colonia'];
$CP = $_POST['CP'];
$Ciudad = $_POST['Ciudad'];
$Estado = $_POST['Estado'];
$Pais = $_POST['Pais'];
$Telefono = $_POST['Telefono'];
$Celular = $_POST['Celular'];
$RFC = $_POST['RFC'];
$Email = $_POST['Email'];

if ($Nombre == "" || $RFC == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre y el RFC no pueden estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertClienteNoRegistrado($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email);
echo json_encode($respuesta);
