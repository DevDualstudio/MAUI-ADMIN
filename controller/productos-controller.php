<?php
include '../model/productos-model.php';
class ProductoController
{

    /*=================================
     Agregar Producto
     ===================================*/
    public function ctrInsertarProducto($Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen)
    {
        $model = new ProductoModel();
        $answer = $model->mdlInsertarProducto($Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen);
        return $answer;
    }

    /*=================================
      Muestra Producto Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarProducto($Id)
    {
        $model = new ProductoModel();
        $answer = $model->mdlMostrarProducto($Id);
        return $answer;
    }

    /*=================================
      Muestra lista de Productos
     ===================================*/
    public function ctrMostrarListaProductos()
    {
        $model = new ProductoModel();
        $answer = $model->mdlMostrarListaProductos();
        return $answer;
    }

    /*=================================
     Actualizar Producto
     ===================================*/
    public function ctrActualizarProducto($Id, $Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Estatus)
    {
        $model = new ProductoModel();
        $answer = $model->mdlActualizarProducto($Id, $Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Estatus);
        return $answer;
    }
}
