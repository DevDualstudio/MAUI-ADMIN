<?php
include '../controller/ventas-controller.php';
$mdl = new VentaController;
$respuesta = $mdl->ctrMostrarListaVentas2();
echo json_encode($respuesta);
