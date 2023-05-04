<?php
include '../controller/empleado-controller.php';
$mdl = new EmpleadoController;

$NEmpleado = $_POST['NEmpleadoE'];
$Nombre = $_POST['NombreE'];
$Direccion = $_POST['DireccionE'];
$Colonia = $_POST['ColoniaE'];
$CP = $_POST['CPE'];
$Ciudad = $_POST['CiudadE'];
$Estado = $_POST['EstadoE'];
$Pais = $_POST['PaisE'];
$Telefono = $_POST['TelefonoE'];
$Celular = $_POST['CelularE'];
$RFC = $_POST['RFCE'];
$CURP = $_POST['CURPE'];
$NSS = $_POST['NSSE'];
$NLicencia = $_POST['LicenciaE'];
$Puesto = $_POST['PuestoE'];
$Email = $_POST['EmailE'];
$Vigencia = $_POST['VigenciaLE'];
$Imagen = $_POST['ImagenE'];

if ($Puesto == "" || $Puesto == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un puesto.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

if ($Nombre == "" || $NEmpleado == "" || $CURP == "" || $NSS == "" || $RFC == "" || $Puesto == "" || $Email == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los datos obligatorios se encuentra vacío.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarEmpleado($NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen);
echo json_encode($respuesta);
