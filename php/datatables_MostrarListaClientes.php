<?php
include '../controller/client-controller.php';
$mdl = new ClientController;
$lista = $mdl->ctrMostrarListaClientes();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
