<?php
include '../controller/empleado-controller.php';
$mdl = new EmpleadoController;

$Id = $_POST['EIDE'];
$NEmpleado = $_POST['ENEmpleadoE'];
$Nombre = $_POST['ENombreE'];
$Direccion = $_POST['EDireccionE'];
$Colonia = $_POST['EColoniaE'];
$CP = $_POST['ECPE'];
$Ciudad = $_POST['ECiudadE'];
$Estado = $_POST['EEstadoE'];
$Pais = $_POST['EPaisE'];
$Telefono = $_POST['ETelefonoE'];
$Celular = $_POST['ECelularE'];
$RFC = $_POST['ERFCE'];
$CURP = $_POST['ECURPE'];
$NSS = $_POST['ENSSE'];
$NLicencia = $_POST['ELicenciaE'];
$Puesto = $_POST['EPuestoE'];
$Email = $_POST['EEmailE'];
$Vigencia = $_POST['EVigenciaLE'];
$Imagen = $_POST['EImagenE'];
$Estatus = $_POST['EEstatusE'];

if ($Puesto == "" || $Puesto == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un puesto.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

if ($Id == "" || $Nombre == "" || $NEmpleado == "" || $CURP == "" || $NSS == "" || $RFC == "" || $Puesto == "" || $Email == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los datos obligatorios se encuentra vacío.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarEmpleado($Id, $NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen, $Estatus);
echo json_encode($respuesta);
