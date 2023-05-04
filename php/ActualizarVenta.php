<?php
include '../controller/ventas-controller.php';
$mdl = new VentaController;

$Id = $_POST['EIDV'];
$Subtotal = $_POST['ESubtotalV'];
$IVA = $_POST['EIVAV'];
$Total = $_POST['ETotalV'];

if ($Id == "" || $Subtotal == "" || $IVA == "" || $Total == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los datos se encuentra en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarVenta($Id, $Subtotal, $IVA, $Total);
echo json_encode($respuesta);
