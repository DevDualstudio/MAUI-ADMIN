<?php
include '../model/destinos-model.php';
class DestinoController
{

    /*=================================
     Agregar Destino
     ===================================*/
    public static function ctrInsertarDestino($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $answer = DestinoModel::mdlInsertarDestino($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente);
        return $answer;
    }

    /*=================================
      Muestra Destino Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarDestino($Id)
    {
        $answer = DestinoModel::mdlMostrarDestino($Id);
        return $answer;
    }

    /*=================================
      Muestra Destino Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarListaDestinos()
    {
        $answer = DestinoModel::mdlMostrarListaDestinos();
        return $answer;
    }

    /*=================================
     Actualizar Destino
     ===================================*/
    public static function ctrActualizarDestino($Id, $Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $answer = DestinoModel::mdlActualizarDestino($Id, $Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente);
        return $answer;
    }
}
