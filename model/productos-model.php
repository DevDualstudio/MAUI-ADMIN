<?php

require_once "connection.php";

class ProductoModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Producto
    public function mdlInsertarProducto($Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5)
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $sql = "call InsertarProductos('$Nombre','$DescripPr','$ExpiracionPr','$PrecioPr','$Imagen1','$Imagen2','$Imagen3', '$Imagen4','$Imagen5');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Producto Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Producto falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar un Producto
    public function mdlMostrarProducto($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarProducto('$Id');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $data = $row;
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Producto Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Producto.";
            $respuesta['detail'] = "No se encontró el Producto";
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Productos
    public function mdlMostrarListaProductos()
    {
        $filas = array();
        $con =  new MauiConnection();
        $con->OpenConnection();
        $sql = "call MostrarListaProductos();";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Productos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;

        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un Producto Registrado

    public function mdlActualizarProducto($Id, $Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Estatus)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarProductos('$Id', '$Nombre','$DescripPr','$ExpiracionPr','$PrecioPr','$Imagen1','$Imagen2','$Imagen3','$Imagen4','$Imagen5','$Estatus');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Producto Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Producto.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
