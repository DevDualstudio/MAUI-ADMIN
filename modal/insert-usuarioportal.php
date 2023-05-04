<div class="modal fade" id="insertUsuarioPortal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formInsertUsuarioPortal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar un Nuevo Usuario Portal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Nombre de Usuario</label>
                                <input type="text" class="form-control" name="EmailUP" id="EmailUP">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="PwdUD" id="PwdUD" autocomplete="none">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Empleado</label>
                                <select class="form-control" name="EmpleadoUP" id="EmpleadoUP"></select>
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