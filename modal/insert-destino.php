<div class="modal fade" id="insertDestino" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertDestino">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar un Nuevo Destino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="NombreD" id="NombreD">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="DireccionD" id="DireccionD">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control" name="ClienteD" id="ClienteD"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" class="form-control" name="ColoniaD" id="ColoniaD">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>C.P.</label>
                                <input type="text" class="form-control" name="CPD" id="CPD">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" name="CiudadD" id="CiudadD">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" name="EstadoD" id="EstadoD">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" name="PaisD" id="PaisD">
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