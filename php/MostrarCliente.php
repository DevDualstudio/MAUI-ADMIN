<?php
include '../controller/client-controller.php';
$mdl = new ClientController;
$Id = $_POST['Id'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo el ID del cliente.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrMostrarCliente($Id);
echo json_encode($respuesta);
