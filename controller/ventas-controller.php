<?php
include '../model/ventas-model.php';
class VentaController
{

    /*=================================
     Agregar Venta
     ===================================*/
    public static function ctrInsertarVenta($Usuario, $Tipo, $Cliente, $Subtotal, $IVA, $Total)
    {
        $ventaModel = new VentaModel();
        $answer =$ventaModel->mdlInsertarVenta($Usuario, $Tipo, $Cliente, $Subtotal, $IVA, $Total);
        return $answer;
    }

    /*=================================
      Muestra Venta Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarVenta($Id)
    {
        $ventaModel = new VentaModel();
        $answer =$ventaModel->mdlMostrarVenta($Id);
        return $answer;
    }

    /*=================================
      Muestra Venta Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaVentas($select, $select2, $select3, $select4, $select5, $select6, $select7)
    {
        $ventaModel = new VentaModel();
        $answer =$ventaModel->mdlMostrarListaVentas($select, $select2, $select3, $select4, $select5, $select6, $select7);
        return $answer;
    }

    /*=================================
      Muestra Listado de Ventas
     ===================================*/
    public static function ctrMostrarListaVentas2()
    {
        $ventaModel = new VentaModel();
        $answer =$ventaModel->mdlMostrarListaVentas2();
        return $answer;
    }
    /*=================================
      Muestra Tipo de Venta Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaTiposVenta()
    {
        $ventaModel = new VentaModel();
        $answer =$ventaModel->mdlMostrarListaTiposVenta();
        return $answer;
    }

    /*=================================
     Actualizar Venta
     ===================================*/
    public static function ctrActualizarVenta($Id, $Subtotal, $IVA, $Total)
    {
        $ventaModel = new VentaModel();
        $answer =$ventaModel->mdlActualizarVenta($Id, $Subtotal, $IVA, $Total);
        return $answer;
    }

    /*=================================
     Cancelar Venta
     ===================================*/
    public static function ctrVentaCancelada($Id)
    {
        $ventaModel = new VentaModel();
        $answer =$ventaModel->mdlVentaCancelada($Id);
        return $answer;
    }
}
