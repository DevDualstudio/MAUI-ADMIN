<?php
include '../model/vehiculo-model.php';
class VehiculoController
{

    /*=================================
     Agregar Vehiculo
     ===================================*/
    public static function ctrInsertarVehiculos($Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer)
    {
        $answer = VehiculoModel::mdlInsertarVehiculos($Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer);
        return $answer;
    }

    /*=================================
      Muestra Vehiculo Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarVehiculo($Id)
    {
        $answer = VehiculoModel::mdlMostrarVehiculo($Id);
        return $answer;
    }

    /*=================================
      Muestra Listado de Vehiculos
     ===================================*/
    public static function ctrMostrarListaVehiculos()
    {
        $answer = VehiculoModel::mdlMostrarListaVehiculos();
        return $answer;
    }

    /*=================================
     Actualizar Vehiculo
     ===================================*/
    public static function ctrActualizarVehiculos($Id, $Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer, $Estatus)
    {
        $answer = VehiculoModel::mdlActualizarVehiculos($Id, $Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer, $Estatus);
        return $answer;
    }
}
