<?php
include '../model/productos-model.php';
class ProductoController
{

    /*=================================
     Agregar Producto
     ===================================*/
    public static function ctrInsertarProducto($Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen)
    {
        $answer = ProductoModel::mdlInsertarProducto($Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen);
        return $answer;
    }

    /*=================================
      Muestra Producto Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarProducto($Id)
    {
        $answer = ProductoModel::mdlMostrarProducto($Id);
        return $answer;
    }

    /*=================================
      Muestra lista de Productos
     ===================================*/
    public static function ctrMostrarListaProductos()
    {
        $answer = ProductoModel::mdlMostrarListaProductos();
        return $answer;
    }

    /*=================================
     Actualizar Producto
     ===================================*/
    public static function ctrActualizarProducto($Id, $Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Estatus)
    {
        $answer = ProductoModel::mdlActualizarProducto($Id, $Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Estatus);
        return $answer;
    }
}
