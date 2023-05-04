<?php
include '../controller/destinos-controller.php';
$mdl = new DestinoController;
$respuesta = $mdl->ctrMostrarListaDestinos();
echo json_encode($respuesta);
