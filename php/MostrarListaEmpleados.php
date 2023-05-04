<?php
include '../controller/empleado-controller.php';
$mdl = new EmpleadoController;
$respuesta = $mdl->ctrMostrarListaEmpleados();
echo json_encode($respuesta);
