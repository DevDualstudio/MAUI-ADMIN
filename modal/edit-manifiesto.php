<div class="modal fade" id="editManifiesto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditManifiesto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="ManifiestoID" id="ManifiestoID">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Chofer</label>
                                <select class="form-control" name="ChoferE" id="ChoferE"></select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Estatus</label>
                                <select class="form-control" name="EstatusME" id="EstatusME">
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
                                <select class="form-control" name="GuiasLibresE" id="GuiasLibresE" multiple></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <input type="submit" class="btn btn-mprimary-100 text-light" value="Actualizar">
                </div>
            </div>
        </form>
    </div>
</div>