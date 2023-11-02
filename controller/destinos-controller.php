<?php
include '../model/destinos-model.php';
class DestinoController
{

    /*=================================
     Agregar Destino
     ===================================*/
    public function ctrInsertarDestino($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $model = new DestinoModel();
        $answer = $model->mdlInsertarDestino($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente);
        return $answer;
    }

    /*=================================
      Muestra Destino Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarDestino($Id)
    {
        $model = new DestinoModel();
        $answer = $model->mdlMostrarDestino($Id);
        return $answer;
    }

    /*=================================
      Muestra Destino Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarListaDestinos()
    {
        $model = new DestinoModel();
        $answer = $model->mdlMostrarListaDestinos();
        return $answer;
    }

    /*=================================
     Actualizar Destino
     ===================================*/
    public function ctrActualizarDestino($Id, $Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $model = new DestinoModel();
        $answer = $model->mdlActualizarDestino($Id, $Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente);
        return $answer;
    }
}
