<?php
include '../model/empleado-model.php';
class EmpleadoController
{

    /*=================================
     Agregar Empleado
     ===================================*/
    public static function ctrInsertarEmpleado($NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen)
    {
        $answer = EmpleadoModel::mdlInsertarEmpleado($NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen);
        return $answer;
    }

    /*=================================
      Muestra Empleado Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarEmpleado($Id)
    {
        $answer = EmpleadoModel::mdlMostrarEmpleado($Id);
        return $answer;
    }

    /*=================================
      Muestra Lista de Empleados
     ===================================*/
    public static function ctrMostrarListaEmpleados()
    {
        $answer = EmpleadoModel::mdlMostrarListaEmpleados();
        return $answer;
    }

    /*=================================
     Actualizar Empleado
     ===================================*/
    public static function ctrActualizarEmpleado($Id, $NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen, $Estatus)
    {
        $answer = EmpleadoModel::mdlActualizarEmpleado($Id, $NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen, $Estatus);
        return $answer;
    }
}
