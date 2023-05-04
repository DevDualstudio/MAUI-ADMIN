<?php
include '../model/puesto-model.php';
class PuestoController
{

    /*=================================
     Agregar Puesto
     ===================================*/
    public static function ctrInsertarPuestos($Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $answer = PuestoModel::mdlInsertarPuestos($Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU);
        return $answer;
    }

    /*=================================
      Muestra Puesto Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarPuesto($Id)
    {
        $answer = PuestoModel::mdlMostrarPuesto($Id);
        return $answer;
    }
    /*=================================
      Muestra Lista de Puestos
     ===================================*/
    public static function ctrMostrarListaPuestos()
    {
        $answer = PuestoModel::mdlMostrarListaPuestos();
        return $answer;
    }
    /*=================================
     Actualizar Puesto
     ===================================*/
    public static function ctrActualizarPuestos($Id, $Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $answer = PuestoModel::mdlActualizarPuestos($Id, $Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU);
        return $answer;
    }
}
