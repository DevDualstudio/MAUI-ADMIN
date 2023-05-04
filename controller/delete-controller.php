<?php
include '../model/delete-model.php';
class DeleteController
{
    /*=================================
     Elimina Registro
     ===================================*/
    public static function ctrDeleteData($tabla, $campoID, $id)
    {
        $answer = DeleteModel::mdlDeleteData($tabla, $campoID, $id);
        return $answer;
    }
}
