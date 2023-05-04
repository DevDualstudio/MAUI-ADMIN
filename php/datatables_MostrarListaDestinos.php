<?php
include '../controller/destinos-controller.php';
$mdl = new DestinoController;
$lista = $mdl->ctrMostrarListaDestinos();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
