<?php

require_once "connection.php";

class ClientModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Cliente
    public function mdlInsertClienteNoRegistrado($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarClienteNoRegistrado('$Nombre','$Domicilio','$Colonia','$CP','$Ciudad','$Estado','$Pais', '$Telefono','$Celular','$RFC','$Email');";

       $query = $con->Consulta($sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Cliente Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del cliente falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar un Cliente
    public function mdlMostrarCliente($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarCliente('$Id');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
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
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Clientes
    public function mdlMostrarListaClientes()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarListaClientes();";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Clientes Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un Cliente Registrado

    public function mdlActualizarClienteNoRegistrado($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email, $Estatus)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarClienteNoRegistrado('$Id','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais', '$Telefono','$Celular','$RFC','$Email','$Estatus');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Cliente Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el cliente.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
