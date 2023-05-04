<div class="modal fade" id="insertGuia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertGuia">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar una Nueva Guia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" class="form-control" name="DescripcionG" id="DescripcionG">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Fecha de Expiración</label>
                                <input type="date" class="form-control" name="FechaExpG" id="FechaExpG">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control" name="ClienteG" id="ClienteG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Origen</label>
                                <select class="form-control" name="OrigenG" id="OrigenG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Destino</label>
                                <select class="form-control" name="DestinoG" id="DestinoG"></select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Chofer</label>
                                <select class="form-control" name="ChoferG" id="ChoferG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Vehículo</label>
                                <select class="form-control" name="VehiculoG" id="VehiculoG"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Venta</label>
                                <select class="form-control" name="VentaG" id="VentaG"></select>
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