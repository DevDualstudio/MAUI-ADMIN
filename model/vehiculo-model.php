<?php

require_once "connection.php";

class VehiculoModel
{
    //Permite Registrar un Nuevo Vehiculo
    public static function mdlInsertarVehiculos($Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarVehiculos('$Placas','$NSerie','$Marca','$Modelo','$Year','$Tipo',NOW(),'Activo','$Chofer');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Vehiculo Registrado Exitosamente.';
        } else {
            //No se agregó el VEHICULO!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Vehiculo falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite  Mostrar un Vehiculo
    public static function mdlMostrarVehiculo($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarVehiculo('$Id');";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Vehiculo Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            //No se agregó el VEHICULO!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Vehiculo.";
            $respuesta['detail'] = "No se encontró el Vehiculo";
        }
        return $respuesta;
    }

    //-- Mostrar Lista de Vehiculos
    public static function mdlMostrarListaVehiculos()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarListaVehiculos;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Vehiculos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un Vehiculo Registrado

    public static function mdlActualizarVehiculos($Id, $Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer, $Estatus)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarVehiculos('$Id','$Placas','$NSerie','$Marca','$Modelo','$Year','$Tipo','$Estatus',$Chofer);";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Vehiculo Actualizado Exitosamente.';
        } else {
            //No se agregó el VEHICULO!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Vehiculo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
