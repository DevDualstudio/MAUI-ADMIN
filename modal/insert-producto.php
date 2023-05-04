<div class="modal fade" id="insertProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertProducto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar un Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="NombrePr" id="NombrePr">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" class="form-control" name="DescripPr" id="DescripPr">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Expiracion</label>
                                <input type="number" step="any" class="form-control" name="ExpiracionPr" id="ExpiracionPr">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Precio</label>
                                <input type="number" step="any" class="form-control" name="PrecioPr" id="PrecioPr">
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