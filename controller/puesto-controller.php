<?php
include '../model/puesto-model.php';
class PuestoController
{

    /*=================================
     Agregar Puesto
     ===================================*/
    public function ctrInsertarPuestos($Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $model = new PuestoModel();
        $answer = $model->mdlInsertarPuestos($Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU);
        return $answer;
    }

    /*=================================
      Muestra Puesto Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarPuesto($Id)
    {
        $model = new PuestoModel();
        $answer = $model->mdlMostrarPuesto($Id);
        return $answer;
    }
    /*=================================
      Muestra Lista de Puestos
     ===================================*/
    public function ctrMostrarListaPuestos()
    {
        $model = new PuestoModel();
        $answer = $model->mdlMostrarListaPuestos();
        return $answer;
    }
    /*=================================
     Actualizar Puesto
     ===================================*/
    public function ctrActualizarPuestos($Id, $Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $model = new PuestoModel();
        $answer = $model->mdlActualizarPuestos($Id, $Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU);
        return $answer;
    }
}
