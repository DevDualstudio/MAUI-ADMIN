<?php

require_once "connection.php";

class VehiculoModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Vehiculo
    public function mdlInsertarVehiculos($Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarVehiculos('$Placas','$NSerie','$Marca','$Modelo','$Year','$Tipo',NOW(),'Activo','$Chofer');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Vehiculo Registrado Exitosamente.';
        } else {
            //No se agregó el VEHICULO!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Vehiculo falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite  Mostrar un Vehiculo
    public function mdlMostrarVehiculo($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarVehiculo('$Id');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
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
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Mostrar Lista de Vehiculos
    public function mdlMostrarListaVehiculos()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarListaVehiculos;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Vehiculos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un Vehiculo Registrado

    public function mdlActualizarVehiculos($Id, $Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer, $Estatus)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarVehiculos('$Id','$Placas','$NSerie','$Marca','$Modelo','$Year','$Tipo','$Estatus',$Chofer);";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Vehiculo Actualizado Exitosamente.';
        } else {
            //No se agregó el VEHICULO!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Vehiculo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
