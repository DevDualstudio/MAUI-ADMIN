<div class="modal fade" id="insertPuestoEmpleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formInsertPuesto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar un Nuevo Puesto de Empleados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="NombreP" id="NombreP">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" class="form-control" name="DescripcionP" id="DescripcionP">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>App Administrador</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AppAdministrador" id="AppAdministrador1" value="1">
                                <label class="form-check-label" for="AppAdministrador1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AppAdministrador" id="AppAdministrador2" value="0" checked>
                                <label class="form-check-label" for="AppAdministrador2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Web Administrador</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="WebAdministrador" id="WebAdministrador1" value="1">
                                <label class="form-check-label" for="WebAdministrador1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="WebAdministrador" id="WebAdministrador2" value="0" checked>
                                <label class="form-check-label" for="WebAdministrador2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>App Supervisor</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AppSupervisor" id="AppSupervisor1" value="1">
                                <label class="form-check-label" for="AppSupervisor1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AppSupervisor" id="AppSupervisor2" value="0" checked>
                                <label class="form-check-label" for="AppSupervisor2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Web Supervisor</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="WebSupervisor" id="WebSupervisor1" value="1">
                                <label class="form-check-label" for="WebSupervisor1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="WebSupervisor" id="WebSupervisor2" value="0" checked>
                                <label class="form-check-label" for="WebSupervisor2">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>App Usuario</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AppUsuario" id="AppUsuario1" value="1">
                                <label class="form-check-label" for="AppUsuario1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="AppUsuario" id="AppUsuario2" value="0" checked>
                                <label class="form-check-label" for="AppUsuario2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Web Usuario</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="WebUsuario" id="WebUsuario1" value="1">
                                <label class="form-check-label" for="WebUsuario1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="WebUsuario" id="WebUsuario2" value="0" checked>
                                <label class="form-check-label" for="WebUsuario2">
                                    No
                                </label>
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