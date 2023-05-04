<?php
include '../controller/ventas-controller.php';
$mdl = new VentaController;
$respuesta = $mdl->ctrMostrarListaTiposVenta();
echo json_encode($respuesta);
