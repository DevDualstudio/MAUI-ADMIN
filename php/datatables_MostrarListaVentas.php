<?php
include '../controller/ventas-controller.php';
$select = $_GET['select'];
$select2 = $_GET['select2'];
$select3 = $_GET['select3'];
$select4 = $_GET['select4'];
$select5 = $_GET['select5'];
$select6 = $_GET['select6'];
$select7 = $_GET['select7'];

$mdl = new VentaController;
$lista = $mdl->ctrMostrarListaVentas($select, $select2, $select3, $select4, $select5, $select6, $select7);

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
