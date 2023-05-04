<div class="modal fade" id="editEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditEmpleado">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EIDE" id="EIDE">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Número Empleado (Obligatorio)</label>
                                <input type="text" class="form-control" name="ENEmpleadoE" id="ENEmpleadoE">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Nombre (Obligatorio)</label>
                                <input type="text" class="form-control" name="ENombreE" id="ENombreE">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="EDireccionE" id="EDireccionE">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" class="form-control" name="EColoniaE" id="EColoniaE">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>C.P.</label>
                                <input type="text" class="form-control" name="ECPE" id="ECPE">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" name="ECiudadE" id="ECiudadE">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" name="EEstadoE" id="EEstadoE">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" name="EPaisE" id="EPaisE">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="ETelefonoE" id="ETelefonoE">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" name="ECelularE" id="ECelularE">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email (Obligatorio)</label>
                                <input type="text" class="form-control" name="EEmailE" id="EEmailE">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>CURP (Obligatorio)</label>
                                <input type="text" class="form-control" name="ECURPE" id="ECURPE">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>RFC (Obligatorio)</label>
                                <input type="text" class="form-control" name="ERFCE" id="ERFCE">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>NSS (Obligatorio)</label>
                                <input type="text" class="form-control" name="ENSSE" id="ENSSE">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>No. Licencia</label>
                                <input type="text" class="form-control" name="ELicenciaE" id="ELicenciaE">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Puesto (Obligatorio)</label>
                                <select name="EPuestoE" id="EPuestoE" class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Vigencia Licencia</label>
                                <input type="date" value="<?php echo date('Y-m-d'); ?>" id="EVigenciaLE" name="EVigenciaLE" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>Estatus</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatusE" id="EEstatusE1" value="Activo">
                                <label class="form-check-label" for="Estatus1">
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatusE" id="EEstatusE2" value="Inactivo">
                                <label class="form-check-label" for="Estatus2">
                                    Inactivo
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="text" class="form-control" name="EImagenE" id="EImagenE">
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