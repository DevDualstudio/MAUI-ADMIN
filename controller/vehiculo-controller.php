<?php
include '../model/vehiculo-model.php';
class VehiculoController
{

    /*=================================
     Agregar Vehiculo
     ===================================*/
    public function ctrInsertarVehiculos($Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer)
    {
        $model = new VehiculoModel();
        $answer = $model->mdlInsertarVehiculos($Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer);
        return $answer;
    }

    /*=================================
      Muestra Vehiculo Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarVehiculo($Id)
    {
        $model = new VehiculoModel();
        $answer = $model->mdlMostrarVehiculo($Id);
        return $answer;
    }

    /*=================================
      Muestra Listado de Vehiculos
     ===================================*/
    public function ctrMostrarListaVehiculos()
    {
        $model = new VehiculoModel();
        $answer = $model->mdlMostrarListaVehiculos();
        return $answer;
    }

    /*=================================
     Actualizar Vehiculo
     ===================================*/
    public function ctrActualizarVehiculos($Id, $Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer, $Estatus)
    {
        $model = new VehiculoModel();
        $answer = $model->mdlActualizarVehiculos($Id, $Placas, $NSerie, $Marca, $Modelo, $Year, $Tipo, $Chofer, $Estatus);
        return $answer;
    }
}
