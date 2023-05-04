<?php
require_once "connection.php";
$connection =  MauiConnection::MauiConn();
$sql = "MostrarListaPuestos";
$result = mysqli_query($connection, $sql);
$ver = mysqli_fetch_row($result);


$datos = array(
    'Id' => $ver[0],
    'Nombre' => $ver[1],
    'Descripcion' => $ver[2],
    'AppAdministrador' => $ver[3],
    'AppSupervisor' => $ver[4],
    'AppUsuario' => $ver[5],
    'WebAdministrador' => $ver[6],
    'WebSupervisor' => $ver[7],
    'WebUsuario' => $ver[8],
);
