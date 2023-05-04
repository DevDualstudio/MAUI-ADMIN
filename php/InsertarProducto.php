<?php
include '../controller/productos-controller.php';
$mdl = new ProductoController;

$Nombre = $_POST['NombrePr'];
$DescripPr = $_POST['DescripPr'];
$ExpiracionPr = $_POST['ExpiracionPr'];
$PrecioPr = $_POST['PrecioPr'];
$Imagen1 = "img1";
$Imagen2 = "img2";
$Imagen3 = "img3";
$Imagen4 = "img4";
$Imagen5 = "img5";

if ($Nombre == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarProducto($Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5);
echo json_encode($respuesta);
