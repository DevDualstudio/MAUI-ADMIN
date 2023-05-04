<?php
include '../controller/ventas-controller.php';
$mdl = new VentaController;

$UsuarioV = $_POST['UsuarioV'];
$TipoV = $_POST['TipoV'];
$ClienteV = $_POST['ClienteV'];
$SubtotalV = $_POST['SubtotalV'];
$IVAV = $_POST['IVAV'];
$TotalV = $_POST['TotalV'];

if ($UsuarioV == "" || $TipoV == "" || $ClienteV == "" || $SubtotalV == "" || $IVAV == "" || $TotalV == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre y el la descripción no pueden estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarVenta($UsuarioV, $TipoV, $ClienteV, $SubtotalV, $IVAV, $TotalV);
echo json_encode($respuesta);