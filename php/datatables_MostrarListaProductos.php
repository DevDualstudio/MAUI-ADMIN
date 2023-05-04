<?php
include '../controller/productos-controller.php';
$mdl = new ProductoController;
$lista = $mdl->ctrMostrarListaProductos();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
