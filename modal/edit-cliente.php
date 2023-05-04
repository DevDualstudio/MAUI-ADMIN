<div class="modal fade" id="editCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="formEditCliente">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="EID" id="EID">
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="ENombre" id="ENombre">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" name="EDireccion" id="EDireccion">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Colonia</label>
                                <input type="text" class="form-control" name="EColonia" id="EColonia">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>C.P.</label>
                                <input type="text" class="form-control" name="ECP" id="ECP">
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" class="form-control" name="ECiudad" id="ECiudad">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" name="EEstado" id="EEstado">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>País</label>
                                <input type="text" class="form-control" name="EPais" id="EPais">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="text" class="form-control" name="ETelefono" id="ETelefono">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" name="ECelular" id="ECelular">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>RFC</label>
                                <input type="text" class="form-control" name="ERFC" id="ERFC">
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="EEmail" id="EEmail">
                            </div>
                        </div>
                        <!--div class="col-lg-4">
                            <div class="form-group">
                                <label>Imagen</label>
                                <input type="text" class="form-control" name="EImagen" id="EImagen">
                            </div>
                        </div-->
                    </div>
                    <div class="row my-2">
                        <div class="col-lg-6">
                            <label>Estatus</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatus" id="EEstatus1" value="Activo">
                                <label class="form-check-label" for="Estatus1">
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="EEstatus" id="EEstatus2" value="Inactivo">
                                <label class="form-check-label" for="Estatus2">
                                    Inactivo
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