<?php
include '../controller/puesto-controller.php';
$mdl = new PuestoController;

$Nombre = $_POST['NombreP'];
$Descripcion = $_POST['DescripcionP'];
$AA = $_POST['AppAdministrador'];
$WA = $_POST['WebAdministrador'];
$AS = $_POST['AppSupervisor'];
$WS = $_POST['WebSupervisor'];
$AU = $_POST['AppUsuario'];
$WU = $_POST['WebUsuario'];

if ($Nombre == "" || $Descripcion == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre y el la descripción no pueden estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarPuestos($Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU);
echo json_encode($respuesta);
