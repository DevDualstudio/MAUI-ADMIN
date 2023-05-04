<div class="modal fade" id="verGuia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formVerGuia">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles de la Guía</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EIDG" id="EIDG">
                    </div>
                    <div class="row my-2">
                        <div class="col-sm-12">
                            <div class="row">
                                <h5 class="small text-uppercase">Información de la Guía</h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">ID</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblIdGuia"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Cliente</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblCliente"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Chofer</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblChofer"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Fecha de Expiración</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblFechaExpiracion"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Estatus</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblEstatus"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-2">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img class="icon-guia" src="assets/icons/iconos--14.png" alt="icon">
                                </div>
                                <div class="col-sm-10">
                                    <h5 class="small text-uppercase">Datos del Origen</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Nombre</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblOrigen"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Dirección</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblDireccionOrigen"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Colonia</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblColoniaOrigen"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Código Postal</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblCPOrigen"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Ciudad</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblCiudadOrigen"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Estado</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblEstadoOrigen"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">País</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblPaisOrigen"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img class="icon-guia" src="assets/icons/iconos--15.png" alt="icon">
                                </div>
                                <div class="col-sm-10">
                                    <h5 class="small text-uppercase">Datos del Destino</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Nombre</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblDestino"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Dirección</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblDireccionDestino"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Colonia</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblColoniaDestino"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Código Postal</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblCPDestino"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Ciudad</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblCiudadDestino"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">Estado</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblEstadoDestino"></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="small mb-0 text-muted text-uppercase">País</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="fw-bold small mb-0" id="lblPaisDestino"></h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <h5 class="small text-uppercase">Historial de la Guía</h5>
                    </div>
                    <div class="row overflow-auto border border-secondary">
                        <div class="col-sm-" id="tabla_guia" style="max-height: 200px ;"></div>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-mprimary-100 text-light" onclick="buscarGuia()">
                            Ver Reporte
                        </button>
                        <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>