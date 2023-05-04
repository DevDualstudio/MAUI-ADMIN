<?php
include '../controller/origen-controller.php';
$mdl = new OrigenController;
$respuesta = $mdl->ctrMostrarListaOrigenes();
echo json_encode($respuesta);
