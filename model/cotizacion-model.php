<?php

require_once "connection.php";
require_once "functions.php";

class CotizaModel
{
    public function mdlCotiza( $origen, $destino, $peso, $alto, $largo, $ancho )
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $sql = "SELECT * FROM tarifario WHERE ( origen=$origen AND destino=$destino ) or ( destino=$origen AND origen=$destino )";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $distancia = $row[ 'distancia' ];
            $volumen = $alto * $ancho * $largo;
            $total = $volumen / 100000;
            $resultado = $total * $distancia;
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Item Encontrado Exitosamente.';
            $respuesta['data'] = $resultado;
        } else {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'Empty';
            $respuesta['description'] = "No hay información actualmente";
            $respuesta['detail'] = "No se encontró el item";
            $respuesta['data'] = array();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
