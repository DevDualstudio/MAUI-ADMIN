<?php
include '../model/client-model.php';
class ClientController
{

    /*=================================
     Agregar Cliente
     ===================================*/
    public function ctrInsertClienteNoRegistrado($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email)
    {
        $model = new ClientModel();
        $answer = $model->mdlInsertClienteNoRegistrado($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email);
        return $answer;
    }

    /*=================================
      Muestra Cliente Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarCliente($Id)
    {
        $model = new ClientModel();
        $answer = $model->mdlMostrarCliente($Id);
        return $answer;
    }

    /*=================================
      Muestra Lista de Clientes
     ===================================*/
    public function ctrMostrarListaClientes()
    {
        $model = new ClientModel();
        $answer = $model->mdlMostrarListaClientes();
        return $answer;
    }

    /*=================================
     Actualizar Cliente
     ===================================*/
    public function ctrActualizarClienteNoRegistrado($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email, $Estatus)
    {
        $model = new ClientModel();
        $answer = $model->mdlActualizarClienteNoRegistrado($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $RFC, $Email, $Estatus);
        return $answer;
    }
}
