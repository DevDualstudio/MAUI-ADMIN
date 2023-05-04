<?php

require_once "connection.php";

class ClientModel
{
    //Permite Registrar un Nuevo Cliente
    public static function mdlInsertClienteNoRegistrado($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarClienteNoRegistrado('$Nombre','$Domicilio','$Colonia','$CP','$Ciudad','$Estado','$Pais', '$Telefono','$Celular','$RFC','$Email');";

        $query = mysqli_query($connection, $sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Cliente Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del cliente falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite Mostrar un Cliente
    public static function mdlMostrarCliente($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarCliente('$Id');";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Cliente Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el cliente.";
            $respuesta['detail'] = "No se encontró el Cliente";
        }
        return $respuesta;
    }

    //Permite Mostrar la Lista de Clientes
    public static function mdlMostrarListaClientes()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarListaClientes();";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Clientes Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un Cliente Registrado

    public static function mdlActualizarClienteNoRegistrado($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email, $Estatus)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarClienteNoRegistrado('$Id','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais', '$Telefono','$Celular','$RFC','$Email','$Estatus');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Cliente Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el cliente.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
