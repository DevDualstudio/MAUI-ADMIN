<?php
include '../controller/destinos-controller.php';
$mdl = new DestinoController;

$Nombre = $_POST['NombreD'];
$Direccion = $_POST['DireccionD'];
$Colonia = $_POST['ColoniaD'];
$CP = $_POST['CPD'];
$Ciudad = $_POST['CiudadD'];
$Estado = $_POST['EstadoD'];
$Pais = $_POST['PaisD'];
$IdCliente = $_POST['ClienteD'];

if ($IdCliente == "" || $IdCliente == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un cliente.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

if ($Nombre == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarDestino($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente);
echo json_encode($respuesta);
