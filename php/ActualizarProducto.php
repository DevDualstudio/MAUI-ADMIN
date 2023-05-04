<?php
include '../controller/productos-controller.php';
$mdl = new ProductoController;

$Id = $_POST['EIDPr'];
$Nombre = $_POST['ENombrePr'];
$DescripPr = $_POST['EDescripPr'];
$ExpiracionPr = $_POST['EExpiracionPr'];
$PrecioPr = $_POST['EPrecioPr'];
$Imagen1 = "img1";
$Imagen2 = "img2";
$Imagen3 = "img3";
$Imagen4 = "img4";
$Imagen5 = "img5";
$Estatus = $_POST['EEstatusPr'];

if ($Nombre == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarProducto($Id, $Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Estatus);
echo json_encode($respuesta);
