<?php
require_once "connection.php";
$connection =  MauiConnection::MauiConn();
$sql = "call MostrarListaClientes";
$result = mysqli_query($connection, $sql);
$ver = mysqli_fetch_row($result);


$datos = array(
    'Id' =>         $ver[0],
    'Nombre' =>     $ver[1],
    'Direccion' =>  $ver[2],
    'Colonia' =>    $ver[3],
    'CP' =>         $ver[4],
    'Ciudad' =>     $ver[5],
    'Estado' =>     $ver[6],
    'Pais' =>       $ver[7],
    'Telefono' =>   $ver[8],
    'Celular' =>    $ver[9],
    'RFC' =>        $ver[10],
    'TipoCliente' => $ver[11],
    'Correo' =>     $ver[12],
    'Imagen' =>     $ver[13],
    'Estatus' =>    $ver[14],
    'FechaAlta' =>  $ver[15],

);
