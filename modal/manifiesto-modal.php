<div class="modal fade" id="modalManifiesto" tabindex="-1" aria-labelledby="manifiestoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formManifiesto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manifiestoModalLabel">Manifiesto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="manifiestoId" id="manifiestoId" value="0">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Chofer</label>
                                <select class="form-control" name="em_id" id="em_id" required></select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Estatus</label>
                                <select class="form-control" name="statusId" id="statusId" required></select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Guias</label>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <select class="form-control" name="guiaId" id="guiaId"></select>
                                    </div>
                                    <div class="col-lg-2">
                                        <a class="btn btn-msecondary-100 text-light" onclick="iniciaGuia()"><i class="fa-solid fa-plus mr-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2" id="listaGuias">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Guia</th>
                                        <th>Estatus</th>
                                        <th>Observacion</th>
                                    </tr>
                                </thead>
                                <tbody id="guiaManifiesto"></tbody>
                            </table>
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
<div class="modal fade" id="modalGuia" tabindex="-1" aria-labelledby="zonaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formGuia">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zonaModalLabel">Guia / Manifiesto <span id="guiaName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Estatus</label>
                                <select class="form-control" name="statusGuia" id="statusGuia" required></select>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <input type="text" class="form-control" name="observaciones" id="observaciones">
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