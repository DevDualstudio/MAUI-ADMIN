<?php
include '../model/client-model.php';
class ClientController
{

    /*=================================
     Agregar Cliente
     ===================================*/
    public static function ctrInsertClienteNoRegistrado($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email)
    {
        $answer = ClientModel::mdlInsertClienteNoRegistrado($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email);
        return $answer;
    }

    /*=================================
      Muestra Cliente Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarCliente($Id)
    {
        $answer = ClientModel::mdlMostrarCliente($Id);
        return $answer;
    }

    /*=================================
      Muestra Lista de Clientes
     ===================================*/
    public static function ctrMostrarListaClientes()
    {
        $answer = ClientModel::mdlMostrarListaClientes();
        return $answer;
    }

    /*=================================
     Actualizar Cliente
     ===================================*/
    public static function ctrActualizarClienteNoRegistrado($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email, $Estatus)
    {
        $answer = ClientModel::mdlActualizarClienteNoRegistrado($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email, $Estatus);
        return $answer;
    }
}
