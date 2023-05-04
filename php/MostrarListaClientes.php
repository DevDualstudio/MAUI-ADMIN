<?php
include '../controller/client-controller.php';
$mdl = new ClientController;
$respuesta = $mdl->ctrMostrarListaClientes();
echo json_encode($respuesta);
