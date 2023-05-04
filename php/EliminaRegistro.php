<?php
include '../controller/delete-controller.php';
$mdl = new DeleteController;
$Id = $_POST['Id'];
$Tabla = $_POST['Tabla'];
$CampoID = $_POST['CampoID'];
if ($Id == "" || $Tabla == "" || $CampoID == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo los datos necesarios.";
    $respuesta['detail'] = "Datos incompletos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrDeleteData($Tabla, $CampoID, $Id);
echo json_encode($respuesta);
