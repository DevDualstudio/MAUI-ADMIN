<div class="modal fade" id="insertManifiesto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertManifiesto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar un Manifiesto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Chofer</label>
                                <select class="form-control" name="ChoferG" id="ChoferG"></select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Estatus</label>
                                <select class="form-control" name="EstatusM" id="EstatusM">
                                    <option value="t">Seleccione un Estatus</option>
                                    <option value="1">En proceso</option>
                                    <option value="2">Finalizado</option>
                                    <option value="3">Cancelado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Guias</label>
                                <select class="form-control" name="GuiasLibres" id="GuiasLibres" multiple></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <input type="submit" class="btn btn-mprimary-100 text-light" value="Registrar">
                </div>
            </div>
        </form>
    </div>
</div>