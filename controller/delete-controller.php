<?php
include '../model/delete-model.php';
class DeleteController
{
    /*=================================
     Elimina Registro
     ===================================*/
    public function ctrDeleteData($tabla, $campoID, $id)
    {
        $model = new DeleteModel();
        $answer = $model->mdlDeleteData($tabla, $campoID, $id);
        return $answer;
    }
}
