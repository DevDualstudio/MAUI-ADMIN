<?php
include '../controller/guias-controller.php';
$estatus = $_GET['estatus'];
$select = $_GET['select'];
$select2 = $_GET['select2'];
$select3 = $_GET['select3'];
$select4 = $_GET['select4'];
$select5 = $_GET['select5'];
$select6 = $_GET['select6'];
$select8 = $_GET['select8'];
$select9 = $_GET['select9'];

$mdl = new GuiaController;
$lista = $mdl->ctrMostrarListaGuias($select, $select2, $select3, $select4, $select5, $select6, $select8, $select9, $estatus);

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
