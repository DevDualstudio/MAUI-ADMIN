<?php
include '../controller/puesto-controller.php';
$mdl = new PuestoController;

$PEID = $_POST['PEID'];
$Nombre = $_POST['ENombreP'];
$Descripcion = $_POST['EDescripcionP'];
$AA = $_POST['EAppAdministrador'];
$WA = $_POST['EWebAdministrador'];
$AS = $_POST['EAppSupervisor'];
$WS = $_POST['EWebSupervisor'];
$AU = $_POST['EAppUsuario'];
$WU = $_POST['EWebUsuario'];

if ($PEID == "" || $Nombre == "" || $Descripcion == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre y el la descripción no pueden estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarPuestos($PEID, $Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU);
echo json_encode($respuesta);
