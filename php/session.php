<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
require_once './vendor-jwt/autoload.php';

use \Firebase\JWT\JWT;

if (isset($_SESSION["token_maui"])) {
    $sToken = $_SESSION["token_maui"];
    $key = "example_key";
    $decoded = JWT::decode($sToken, $key, array('HS256'));
    $Acceso = $decoded->Acceso;
    $Fecha = $decoded->Fecha;
    $Hora = $decoded->Hora;
} else {
    $Acceso = false;
    $Fecha = '';
    $Hora = '';
}
if (!$Acceso) {
    header("Location: ./login.php");
}
