<?php
include '../model/guias-model.php';
class GuiaController
{

    /*=================================
     Agregar Guia
     ===================================*/
    public function ctrInsertarGuia($Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Venta)
    {
        $model = new GuiaModel();
        $answer = $model->mdlInsertarGuia($Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Venta);
        return $answer;
    }

    /*=================================
      Muestra Guia Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarGuia($Id)
    {
        $model = new GuiaModel();
        $answer = $model->mdlMostrarGuia($Id);
        return $answer;
    }

    public static function ctrMostrarListaGuias($select, $select2, $select3, $select4, $select5, $select6, $select8, $select9, $estatus)
    {
        $model = new GuiaModel();
        $answer = $model->mdlMostrarListaGuias($select, $select2, $select3, $select4, $select5, $select6, $select8, $select9, $estatus);
        return $answer;
    }

    public function ctrMostrarManifiesto($Id)
    {
        $model = new GuiaModel();
        $answer = $model->mdlMostrarManifiesto($Id);
        return $answer;
    }

    /*=================================
      Muestra la fecha de una Guia Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarFechaGuia($Id)
    {
        $model = new GuiaModel();
        $answer = $model->mdlMostrarFechaGuia($Id);
        return $answer;
    }

    /*=================================
     Agregar MAnifiesto
     ===================================*/
     public function ctrInsertarManifiesto($Chofer, $Status, $Guias)
     {
         $model = new GuiaModel();
        $answer = $model->mdlInsertarManifiesto($Chofer, $Status, $Guias);
         return $answer;
     }

    /*=================================
      Muestra Guia Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarListaManifiestos()
    {
        $model = new GuiaModel();
        $answer = $model->mdlMostrarListaManifiestos();
        return $answer;
    }

    /*=================================
      Muestra Guias Libres
     ===================================*/
     public function ctrMostrarGuiasLibres()
     {
         $model = new GuiaModel();
        $answer = $model->mdlMostrarGuiasLibres();
         return $answer;
     }

    /*=================================
      Muestra Estatus de Guia Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarListaEstatusGuia()
    {
        $model = new GuiaModel();
        $answer = $model->mdlMostrarListaEstatusGuia();
        return $answer;
    }

    /*=================================
      Muestra Todos los Estatus de Guia Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarListaHistorialGuia($Id)
    {
        $model = new GuiaModel();
        $answer = $model->mdlMostrarListaHistorialGuia($Id);
        return $answer;
    }

    /*=================================
     Actualizar Guia
     ===================================*/
    public function ctrActualizarGuia($Id, $Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Estatus)
    {
        $model = new GuiaModel();
        $answer = $model->mdlActualizarGuia($Id, $Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Estatus);
        return $answer;
    }
}
