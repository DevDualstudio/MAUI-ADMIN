<?php
include '../model/origen-model.php';
class OrigenController
{

    /*=================================
     Agregar Origen
     ===================================*/
    public static function ctrInsertarOrigen($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $answer = OrigenModel::mdlInsertarOrigen($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais);
        return $answer;
    }

    /*=================================
      Muestra Origen Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarOrigen($Id)
    {
        $answer = OrigenModel::mdlMostrarOrigen($Id);
        return $answer;
    }

    /*=================================
      Muestra una lista de origenes
     ===================================*/
    public static function ctrMostrarListaOrigenes()
    {
        $answer = OrigenModel::mdlMostrarListaOrigenes();
        return $answer;
    }


    /*=================================
     Actualizar Origen
     ===================================*/
    public static function ctrActualizarOrigen($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $answer = OrigenModel::mdlActualizarOrigen($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais);
        return $answer;
    }
}
