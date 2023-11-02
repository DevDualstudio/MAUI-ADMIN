<?php
include '../model/origen-model.php';
class OrigenController
{

    /*=================================
     Agregar Origen
     ===================================*/
    public function ctrInsertarOrigen($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $model = new OrigenModel();
        $answer = $model->mdlInsertarOrigen($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais);
        return $answer;
    }

    /*=================================
      Muestra Origen Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarOrigen($Id)
    {
        $model = new OrigenModel();
        $answer = $model->mdlMostrarOrigen($Id);
        return $answer;
    }

    /*=================================
      Muestra una lista de origenes
     ===================================*/
    public function ctrMostrarListaOrigenes()
    {
        $model = new OrigenModel();
        $answer = $model->mdlMostrarListaOrigenes();
        return $answer;
    }


    /*=================================
     Actualizar Origen
     ===================================*/
    public function ctrActualizarOrigen($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $model = new OrigenModel();
        $answer = $model->mdlActualizarOrigen($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais);
        return $answer;
    }
}
