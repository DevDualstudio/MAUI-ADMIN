<div class="modal fade" id="editProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditProducto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EIDPr" id="EIDPr">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="ENombrePr" id="ENombrePr">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" class="form-control" name="EDescripPr" id="EDescripPr">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Expiracion</label>
                                <input type="number" step="any" class="form-control" name="EExpiracionPr" id="EExpiracionPr">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" step="any" class="form-control" name="EPrecioPr" id="EPrecioPr">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>Estatus</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatusPr" id="EEstatusPr1" value="Activo">
                                <label class="form-check-label" for="Estatus1">
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatusPr" id="EEstatusPr2" value="Inactivo">
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