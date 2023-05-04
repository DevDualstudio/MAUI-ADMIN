<div class="modal fade" id="editOrigen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditOrigen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Origen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EOID" id="EOID">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="ENombreO" id="ENombreO">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="EDireccionO" id="EDireccionO">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" class="form-control" name="EColoniaO" id="EColoniaO">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>C.P.</label>
                                <input type="text" class="form-control" name="ECPO" id="ECPO">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" name="ECiudadO" id="ECiudadO">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" name="EEstadoO" id="EEstadoO">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" name="EPaisO" id="EPaisO">
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