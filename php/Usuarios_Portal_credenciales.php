<?php
include '../controller/login-controller.php';
require_once '../vendor-jwt/autoload.php';

use Firebase\JWT\JWT;

$mdl = new LoginController;

$Fecha = date("Y-m-d");
$Hora = date('H:i:s');

$Email = $_POST['email'];
$Password = $_POST['pwd'];

$respuesta = $mdl->ctrUsuarios_Portal_credenciales($Email, $Password);
session_start();
if (isset($_SESSION["token_maui"])) {
    unset($_SESSION["token_maui"]);
}
if ($respuesta['code'] == 200) {
    $status = $respuesta['status'];
    $payload = array(
        "Acceso" => $status,
        "Fecha" => $Fecha,
        "Hora" => $Hora
    );
    $key = "example_key";
    $jwt = JWT::encode($payload, $key);
    $decoded = JWT::decode($jwt, $key, array('HS256'));
    $decoded_array = (array) $decoded;
    JWT::$leeway = 60; // $leeway in seconds
    $session = $mdl->mdlSessionStart($jwt);
}
echo json_encode($respuesta);
