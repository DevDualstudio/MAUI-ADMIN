<div class="modal fade" id="editGuia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditGuia">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Guía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EIDG" id="EIDG">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" class="form-control" name="EDescripcionG" id="EDescripcionG">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Fecha de Expiración</label>
                                <input type="date" class="form-control" name="EFechaExpG" id="EFechaExpG">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control" name="EClienteG" id="EClienteG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Origen</label>
                                <select class="form-control" name="EOrigenG" id="EOrigenG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Destino</label>
                                <select class="form-control" name="EDestinoG" id="EDestinoG"></select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Chofer</label>
                                <select class="form-control" name="EChoferG" id="EChoferG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Vehículo</label>
                                <select class="form-control" name="EVehiculoG" id="EVehiculoG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Estatus</label>
                                <select class="form-control" name="EEstatusGuia" id="EEstatusGuia"></select>
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