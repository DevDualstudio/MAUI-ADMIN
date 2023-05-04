<?php
include '../controller/client-controller.php';
$mdl = new ClientController;

$Id = $_POST['EID'];
$Nombre = $_POST['ENombre'];
$Direccion = $_POST['EDireccion'];
$Colonia = $_POST['EColonia'];
$CP = $_POST['ECP'];
$Ciudad = $_POST['ECiudad'];
$Estado = $_POST['EEstado'];
$Pais = $_POST['EPais'];
$Telefono = $_POST['ETelefono'];
$Celular = $_POST['ECelular'];
$RFC = $_POST['ERFC'];
$Estatus = $_POST['EEstatus'];
$Email = $_POST['EEmail'];

if ($Nombre == "" || $RFC == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre y el RFC no pueden estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarClienteNoRegistrado($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email, $Estatus);
echo json_encode($respuesta);
