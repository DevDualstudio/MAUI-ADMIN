<?php
include '../model/guias-model.php';
class GuiaController
{

    /*=================================
     Agregar Guia
     ===================================*/
    public static function ctrInsertarGuia($Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Venta)
    {
        $answer = GuiaModel::mdlInsertarGuia($Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Venta);
        return $answer;
    }

    /*=================================
      Muestra Guia Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarGuia($Id)
    {
        $answer = GuiaModel::mdlMostrarGuia($Id);
        return $answer;
    }

    /*=================================
      Muestra la fecha de una Guia Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarFechaGuia($Id)
    {
        $answer = GuiaModel::mdlMostrarFechaGuia($Id);
        return $answer;
    }

    /*=================================
      Muestra Guia Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaGuias($select, $select2, $select3, $select4, $select5, $select6, $select8, $select9, $estatus)
    {
        $answer = GuiaModel::mdlMostrarListaGuias($select, $select2, $select3, $select4, $select5, $select6, $select8, $select9, $estatus);
        return $answer;
    }

    /*=================================
      Muestra Estatus de Guia Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaEstatusGuia()
    {
        $answer = GuiaModel::mdlMostrarListaEstatusGuia();
        return $answer;
    }

    /*=================================
      Muestra Todos los Estatus de Guia Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaHistorialGuia($Id)
    {
        $answer = GuiaModel::mdlMostrarListaHistorialGuia($Id);
        return $answer;
    }

    /*=================================
     Actualizar Guia
     ===================================*/
    public static function ctrActualizarGuia($Id, $Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Estatus)
    {
        $answer = GuiaModel::mdlActualizarGuia($Id, $Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Estatus);
        return $answer;
    }
}
