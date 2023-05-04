<div class="modal fade" id="editDestino" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditDestino">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Destino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EEDID" id="EEOID">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="ENombreD" id="ENombreD">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="EDireccionD" id="EDireccionD">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control" name="EClienteD" id="EClienteD"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" class="form-control" name="EColoniaD" id="EColoniaD">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>C.P.</label>
                                <input type="text" class="form-control" name="ECPD" id="ECPD">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" name="ECiudadD" id="ECiudadD">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" name="EEstadoD" id="EEstadoD">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" name="EPaisD" id="EPaisD">
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