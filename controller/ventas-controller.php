<?php
include '../model/ventas-model.php';
class VentaController
{

    /*=================================
     Agregar Venta
     ===================================*/
    public static function ctrInsertarVenta($Usuario, $Tipo, $Cliente, $Subtotal, $IVA, $Total)
    {
        $answer = VentaModel::mdlInsertarVenta($Usuario, $Tipo, $Cliente, $Subtotal, $IVA, $Total);
        return $answer;
    }

    /*=================================
      Muestra Venta Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarVenta($Id)
    {
        $answer = VentaModel::mdlMostrarVenta($Id);
        return $answer;
    }

    /*=================================
      Muestra Venta Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaVentas($select, $select2, $select3, $select4, $select5, $select6, $select7)
    {
        $answer = VentaModel::mdlMostrarListaVentas($select, $select2, $select3, $select4, $select5, $select6, $select7);
        return $answer;
    }

    /*=================================
      Muestra Listado de Ventas
     ===================================*/
    public static function ctrMostrarListaVentas2()
    {
        $answer = VentaModel::mdlMostrarListaVentas2();
        return $answer;
    }
    /*=================================
      Muestra Tipo de Venta Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaTiposVenta()
    {
        $answer = VentaModel::mdlMostrarListaTiposVenta();
        return $answer;
    }

    /*=================================
     Actualizar Venta
     ===================================*/
    public static function ctrActualizarVenta($Id, $Subtotal, $IVA, $Total)
    {
        $answer = VentaModel::mdlActualizarVenta($Id, $Subtotal, $IVA, $Total);
        return $answer;
    }

    /*=================================
     Cancelar Venta
     ===================================*/
    public static function ctrVentaCancelada($Id)
    {
        $answer = VentaModel::mdlVentaCancelada($Id);
        return $answer;
    }
}
