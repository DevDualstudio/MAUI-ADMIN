<?php
include '../controller/usuarios-portal-controller.php';
$mdl = new UsuarioPortalController;
$lista = $mdl->ctrMostrarListaUsuariosPortal();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
