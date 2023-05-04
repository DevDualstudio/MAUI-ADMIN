<div class="modal fade" id="editVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditVehiculo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Vehiculo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="VID" id="VID">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Placas</label>
                                <input type="text" class="form-control" name="EPlacas" id="EPlacas">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>No. Serie</label>
                                <input type="text" class="form-control" name="ENSerie" id="ENSerie">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" class="form-control" name="EMarca" id="EMarca">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" class="form-control" name="EModelo" id="EModelo">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Año</label>
                                <input type="text" class="form-control" name="EYear" id="EYear">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tipo</label>
                                <input type="text" class="form-control" name="ETipo" id="ETipo">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Chofer</label>
                                <select name="EChofer" class="form-control" id="EChofer"></select>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>Estatus</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EVEstatus" id="EVEstatus1" value="Activo">
                                <label class="form-check-label" for="EVEstatus1">
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EVEstatus" id="EVEstatus2" value="Inactivo">
                                <label class="form-check-label" for="EVEstatus2">
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