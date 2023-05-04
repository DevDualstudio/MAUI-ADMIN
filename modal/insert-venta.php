<div class="modal fade" id="insertVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertVenta">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar una Nueva Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Usuario Portal</label>
                                <select class="form-control" name="UsuarioV" id="UsuarioV"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tipo de Venta</label>
                                <select class="form-control" name="TipoV" id="TipoV"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control" name="ClienteV" id="ClienteV"></select>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Subtotal</label>
                                <input type="number" step="any" class="form-control" name="SubtotalV" id="SubtotalV">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>IVA</label>
                                <input type="number" step="any" class="form-control" name="IVAV" id="IVAV">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Total</label>
                                <input type="number" step="any" class="form-control" name="TotalV" id="TotalV">
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