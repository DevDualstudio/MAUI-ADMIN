<?php
include '../model/general-model.php';
class GeneralController
{

    public function ctrArmaTabla($tabla)
    {
        $model = new GeneralModel();
        $answer = $model->mdlArmaTabla($tabla);
        return $answer;
    }

    public function ctrListaItems($tabla)
    {
        $model = new GeneralModel();
        $answer = $model->mdlListaItems($tabla);
        return $answer;
    }

    public function ctrListaItemsFiltro($tabla, $campo)
    {
        $model = new GeneralModel();
        $answer = $model->mdlListaItemsFiltro($tabla, $campo);
        return $answer;
    }

    public function ctrMostrarItem($tabla, $id) {
        $model = new GeneralModel();
        $answer = $model->mdlMostrarItem($tabla, $id);
        return $answer;
    }

    public function ctrListaOptions($tabla)
    {
        $model = new GeneralModel();
        $answer = $model->mdlListaOptions($tabla);
        return $answer;
    }

    public function ctrInsertaItem($tabla, $datos)
    {
        $model = new GeneralModel();
        $answer = $model->mdlInsertaItem($tabla, $datos);
        return $answer;
    }

    public function ctrActualizaItem($tabla, $datos)
    {
        $model = new GeneralModel();
        $answer = $model->mdlActualizaItem($tabla, $datos);
        return $answer;
    }

    public function ctrEliminaItem($tabla, $datos)
    {
        $model = new GeneralModel();
        $answer = $model->mdlEliminaItem($tabla, $datos);
        return $answer;
    }

    public function ctrEliminaItemCampo($tabla, $datos)
    {
        $model = new GeneralModel();
        $answer = $model->mdlEliminaItemCampo($tabla, $datos);
        return $answer;
    }
    
}
