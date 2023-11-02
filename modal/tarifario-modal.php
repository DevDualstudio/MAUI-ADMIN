<div class="modal fade" id="modalTarifario" tabindex="-1" aria-labelledby="tarifaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formTarifario">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tarifaModalLabel">Tarifario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="tarifaId" id="tarifaId" value="0">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Origen</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" name="origen" id="origen" required></select>
                                    </div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-msecondary-100 text-light" onclick="iniciaZona()"><i class="fa-solid fa-plus mr-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Destino</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" name="destino" id="destino" required></select>
                                    </div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-msecondary-100 text-light" onclick="iniciaZona()"><i class="fa-solid fa-plus mr-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Precio Peso</label>
                                <input type="text" class="form-control" name="precioPeso" id="precioPeso" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Precio Volumen</label>
                                <input type="text" class="form-control" name="precioVolumen" id="precioVolumen" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <input type="submit" class="btn btn-mprimary-100 text-light" value="Guardar">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="zonasModal" tabindex="-1" aria-labelledby="zonaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formZona">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zonaModalLabel">Zonas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="zonaId" id="zonaId" value="0">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" class="btn btn-mprimary-100 text-light" value="Guardar">
                </div>
            </div>
        </form>
    </div>
</div>