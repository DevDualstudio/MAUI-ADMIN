<div class="modal fade" id="insertVehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertVehiculo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar un Nuevo Vehiculo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Placas</label>
                                <input type="text" class="form-control" name="Placas" id="Placas">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>No. Serie</label>
                                <input type="text" class="form-control" name="NSerie" id="NSerie">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" class="form-control" name="Marca" id="Marca">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" class="form-control" name="Modelo" id="Modelo">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Año</label>
                                <input type="text" class="form-control" name="Year" id="Year">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tipo</label>
                                <input type="text" class="form-control" name="Tipo" id="Tipo">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Chofer</label>
                                <select name="Chofer" class="form-control" id="Chofer"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <input type="submit" class="btn btn-mprimary-100 text-light" data-bs-dismiss="modal" value="Registrar">
                </div>
            </div>
        </form>
    </div>
</div>