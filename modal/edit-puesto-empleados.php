<div class="modal fade" id="editPuestoEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditPuesto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Puesto de Empleados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="PEID" id="PEID">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="ENombreP" id="ENombreP">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input type="text" class="form-control" name="EDescripcionP" id="EDescripcionP">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>App Administrador</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EAppAdministrador" id="EAppAdministrador1" value="1">
                                <label class="form-check-label" for="AppAdministrador1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EAppAdministrador" id="EAppAdministrador2" value="0">
                                <label class="form-check-label" for="AppAdministrador2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Web Administrador</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EWebAdministrador" id="EWebAdministrador1" value="1">
                                <label class="form-check-label" for="WebAdministrador1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EWebAdministrador" id="EWebAdministrador2" value="0">
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
                                <input class="form-check-input" type="radio" name="EAppSupervisor" id="EAppSupervisor1" value="1">
                                <label class="form-check-label" for="AppSupervisor1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EAppSupervisor" id="EAppSupervisor2" value="0">
                                <label class="form-check-label" for="AppSupervisor2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Web Supervisor</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EWebSupervisor" id="EWebSupervisor1" value="1">
                                <label class="form-check-label" for="WebSupervisor1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EWebSupervisor" id="EWebSupervisor2" value="0">
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
                                <input class="form-check-input" type="radio" name="EAppUsuario" id="EAppUsuario1" value="1">
                                <label class="form-check-label" for="AppUsuario1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EAppUsuario" id="EAppUsuario2" value="0">
                                <label class="form-check-label" for="AppUsuario2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Web Usuario</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EWebUsuario" id="EWebUsuario1" value="1">
                                <label class="form-check-label" for="WebUsuario1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EWebUsuario" id="EWebUsuario2" value="0">
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
                    <input type="submit" class="btn btn-mprimary-100 text-light" data-bs-dismiss="modal" value="Actualizar">
                </div>
            </div>
        </form>
    </div>
</div>