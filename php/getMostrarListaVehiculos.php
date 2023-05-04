<?php
require_once "connection.php";
$connection =  MauiConnection::MauiConn();
$sql = "MostrarListaVehiculos";
$result = mysqli_query($connection, $sql);
$ver = mysqli_fetch_row($result);


$datos = array(
    'Id' => $ver[0],
    'Placas' => $ver[1],
    'NoSerie' => $ver[2],
    'Marca' => $ver[3],
    'Modelo' => $ver[4],
    'Año' => $ver[5],
    'Tipo' => $ver[6],
    'FechaAlta' => $ver[7],
    'Estatus' => $ver[8],
    'idChofer' => $ver[9],
    'Chofer' => $ver[10],
);
