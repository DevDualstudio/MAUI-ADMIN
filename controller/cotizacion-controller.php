<?php
include '../model/cotizacion-model.php';
class CotizaController
{

    public function ctrCotiza( $origen, $destino, $peso, $alto, $largo, $ancho )
    {
        $model = new CotizaModel();
        $answer = $model->mdlCotiza( $origen, $destino, $peso, $alto, $largo, $ancho );
        return $answer;
    }
    
}
