<div class="modal fade" id="insertEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertEmpleado">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar un Nuevo Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Número Empleado (Obligatorio)</label>
                                <input type="text" class="form-control" name="NEmpleadoE" id="NEmpleadoE" required>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Nombre (Obligatorio)</label>
                                <input type="text" class="form-control" name="NombreE" id="NombreE" required>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="DireccionE" id="DireccionE">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" class="form-control" name="ColoniaE" id="ColoniaE">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>C.P.</label>
                                <input type="text" class="form-control" name="CPE" id="CPE">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" name="CiudadE" id="CiudadE">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" name="EstadoE" id="EstadoE">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" name="PaisE" id="PaisE">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="TelefonoE" id="TelefonoE">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" name="CelularE" id="CelularE">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email (Obligatorio)</label>
                                <input type="email" class="form-control" name="EmailE" id="EmailE" required>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>CURP (Obligatorio)</label>
                                <input type="text" class="form-control" name="CURPE" id="CURPE" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>RFC (Obligatorio)</label>
                                <input type="text" class="form-control" name="RFCE" id="RFCE" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>NSS (Obligatorio)</label>
                                <input type="text" class="form-control" name="NSSE" id="NSSE" required>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>No. Licencia</label>
                                <input type="text" class="form-control" name="LicenciaE" id="LicenciaE">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Puesto (Obligatorio)</label>
                                <select name="PuestoE" id="PuestoE" class="form-control" required></select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Vigencia Licencia</label>
                                <input type="date" value="<?php echo date('Y-m-d'); ?>" id="VigenciaLE" name="VigenciaLE" class="form-control">

                            </div>
                        </div>
                    </div>

                    <div class="row my-2">

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="text" class="form-control" name="ImagenE" id="ImagenE">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-msecondary-100 text-light" data-bs-dismiss="modal">
                        Cerrar
                    </button>
                    <input type="submit" class="btn btn-mprimary-100 text-light" value="Registrar">
                </div>
            </div>
        </form>
    </div>
</div>