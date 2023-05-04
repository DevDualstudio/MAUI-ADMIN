<?php
require_once "connection.php";
$connection =  MauiConnection::MauiConn();
$sql = "MostrarListaOrigenes";
$result = mysqli_query($connection, $sql);
$ver = mysqli_fetch_row($result);


$datos = array(
    'Id' => $ver[0],
    'Nombre' => $ver[1],
    'Direccion' => $ver[2],
    'Colonia' => $ver[3],
    'CP' => $ver[4],
    'Ciudad' => $ver[5],
    'Estado' => $ver[6],
    'or_Pais' => $ver[7],
);
