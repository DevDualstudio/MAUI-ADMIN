<?php

require_once "connection.php";

class EmpleadoModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Empleado
    public function mdlInsertarEmpleado($NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarEmpleado('$NEmpleado','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais','$Telefono',
        '$Celular','$CURP','$RFC','$NSS','$NLicencia','$Vigencia',$Puesto,'$Email',NOW(),'$Imagen','ACTIVO');";

       $query = $con->Consulta($sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Empleado Registrado Exitosamente.';
        } else {
            //No se agregó el empleado!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Empleado falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite  Mostrar un Empleado
    public function mdlMostrarEmpleado($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarEmpleado('$Id');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Empleado Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            //No se agregó el empleado!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Empleado.";
            $respuesta['detail'] = "No se encontró el Empleado";
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Empleados
    public function mdlMostrarListaEmpleados()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarListaEmpleados();";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Empleado Encontrado Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un Empleado Registrado

    public function mdlActualizarEmpleado($Id, $NEmpleado, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais, $Telefono, $Celular, $CURP, $RFC, $NSS, $NLicencia, $Puesto, $Email, $Vigencia, $Imagen, $Estatus)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarEmpleado($Id,'$NEmpleado','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais', '$Telefono','$Celular','$CURP','$RFC','$NSS',
        '$NLicencia','$Vigencia',$Puesto,'$Email',NOW(),'$Imagen','$Estatus');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Empleado Actualizado Exitosamente.';
        } else {
            //No se agregó el empleado!
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Empleado.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
