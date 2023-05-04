<?php

require_once "connection.php";

class EmpleadoModel
{
    //Permite Registrar un Nuevo Empleado
    public static function mdlInsertarEmpleado($NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarEmpleado('$NEmpleado','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais','$Telefono',
        '$Celular','$CURP','$RFC','$NSS','$NLicencia','$Vigencia',$Puesto,'$Email',NOW(),'$Imagen','ACTIVO');";

        $query = mysqli_query($connection, $sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Empleado Registrado Exitosamente.';
        } else {
            //No se agregó el empleado!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Empleado falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite  Mostrar un Empleado
    public static function mdlMostrarEmpleado($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarEmpleado('$Id');";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Empleado Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            //No se agregó el empleado!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Empleado.";
            $respuesta['detail'] = "No se encontró el Empleado";
        }
        return $respuesta;
    }

    //Permite Mostrar la Lista de Empleados
    public static function mdlMostrarListaEmpleados()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarListaEmpleados();";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Empleado Encontrado Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un Empleado Registrado

    public static function mdlActualizarEmpleado($Id, $NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen, $Estatus)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarEmpleado($Id,'$NEmpleado','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais', '$Telefono','$Celular','$CURP','$RFC','$NSS',
        '$NLicencia','$Vigencia',$Puesto,'$Email',NOW(),'$Imagen','$Estatus');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Empleado Actualizado Exitosamente.';
        } else {
            //No se agregó el empleado!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Empleado.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
