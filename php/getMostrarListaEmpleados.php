<?php

require_once "connection.php";
$connection =  MauiConnection::MauiConn();
$sql = "MostrarListaEmpleados";
$result = mysqli_query($connection, $sql);
$ver = mysqli_fetch_row($result);


$datos = array(
    'Id' =>             $ver[0],
    'NoEmpleado' =>     $ver[1],
    'Nombre' =>         $ver[2],
    'Direccion' =>      $ver[3],
    'Colonia' =>        $ver[4],
    'CP' =>             $ver[5],
    'Ciudad' =>         $ver[6],
    'Estado' =>         $ver[7],
    'Pais' =>           $ver[8],
    'Telefono' =>       $ver[9],
    'Celular' =>        $ver[10],
    'CURP' =>           $ver[11],
    'RFC' =>            $ver[12],
    'NSS' =>            $ver[13],
    'NoLicencia' =>     $ver[14],
    'IdPuesto' =>           $ver[15],
    'Puesto' =>             $ver[16],
    'VigenciaLicencia' =>   $ver[17],
    'Correo' =>             $ver[18],
    'Imagen' =>             $ver[19],
    'FechaAlta' =>          $ver[20],
    'Estatus' =>            $ver[21]
);
