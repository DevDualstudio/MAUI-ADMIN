<?php
include '../controller/destinos-controller.php';
$mdl = new DestinoController;

$Id = $_POST['EEDID'];
$Nombre = $_POST['ENombreD'];
$Direccion = $_POST['EDireccionD'];
$Colonia = $_POST['EColoniaD'];
$CP = $_POST['ECPD'];
$Ciudad = $_POST['ECiudadD'];
$Estado = $_POST['EEstadoD'];
$Pais = $_POST['EPaisD'];
$IdCliente = $_POST['EClienteD'];

/*
if ($IdCliente == "" || $IdCliente == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un cliente.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
*/
if ($Nombre == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarDestino($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente);
echo json_encode($respuesta);
