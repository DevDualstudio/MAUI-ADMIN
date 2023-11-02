<?php
include '../model/empleado-model.php';
class EmpleadoController
{

    /*=================================
     Agregar Empleado
     ===================================*/
    public function ctrInsertarEmpleado($NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen)
    {
        $model = new EmpleadoModel();
        $answer = $model->mdlInsertarEmpleado($NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen);
        return $answer;
    }

    /*=================================
      Muestra Empleado Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarEmpleado($Id)
    {
        $model = new EmpleadoModel();
        $answer = $model->mdlMostrarEmpleado($Id);
        return $answer;
    }

    /*=================================
      Muestra Lista de Empleados
     ===================================*/
    public function ctrMostrarListaEmpleados()
    {
        $model = new EmpleadoModel();
        $answer = $model->mdlMostrarListaEmpleados();
        return $answer;
    }

    /*=================================
     Actualizar Empleado
     ===================================*/
    public function ctrActualizarEmpleado($Id, $NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen, $Estatus)
    {
        $model = new EmpleadoModel();
        $answer = $model->mdlActualizarEmpleado($Id, $NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen, $Estatus);
        return $answer;
    }
}
