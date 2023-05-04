<div class="modal fade" id="editUsuarioPortal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEditUsuarioPortal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario Portal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EIDUP" id="EIDUP">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nombre de Usuario</label>
                                <input type="text" class="form-control" name="EEmailUP" id="EEmailUP">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Empleado</label>
                                <select class="form-control" name="EEmpleadoUP" id="EEmpleadoUP"></select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>Estatus</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatusUP" id="EEstatusUP1" value="Activo">
                                <label class="form-check-label" for="Estatus1">
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatusUP" id="EEstatusUP2" value="Inactivo">
                                <label class="form-check-label" for="Estatus2">
                                    Inactivo
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <input type="submit" class="btn btn-mprimary-100 text-light" data-bs-dismiss="modal" value="Actualizar">
                </div>
            </div>
        </form>
    </div>
</div>