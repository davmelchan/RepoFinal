@include('Administrador/header')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-center text-gray-800">Usuarios de practica de formación profesional</h1>

                <button id="btnUsuarios" class="btn btn-primary btn-icon-split my-3">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-user-plus"></i>
                        </span>
                    <span class="text">Agregar usuario</span>
                </button>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Carnet</th>
                                    <th>Start date</th>
                                    <th>foto</th>
                                    <th>Activo</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Empresa</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Carnet</th>
                                    <th>Start date</th>
                                    <th>foto</th>
                                    <th>Activo</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Empresa</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Derechos de Autor &copy; UNAN-FAREM Carazo</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->

<!-- Formulario para agregar usuario -->
<div id="ModalUsuarios" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group" hidden>
                        <label for="Identificador" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="Identificador">
                        </div>
                    </div>

                    <div class="form-group"f>
                        <label for="NombreUsuario" class="col-form-label">Nombres del usuario:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="NombreUsuario" name="NombreUsuario">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ApellidoUsuario" class="col-form-label">Apellidos del usuario:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="ApellidoUsuario" name="ApellidoUsuario">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Direccion" class="col-form-label">Direccion: </label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                            <input type="text" class="form-control" id="Direccion" name="Direccion">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Genero" class="col-form-label">Genero:</label>
                        <div class="input-group" id="SeleccionarGenero">
                            <!--
                            <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" class="form-control" id="Identificador">
                        -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-group"></i>
                                </span>
                            <select class="form-control" name="Estado" id="Estado">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Cedula">Cedula</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                            <input type="text" class="form-control" name="Cedula" id="Cedula">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Carnet">Carnet</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                            <input type="text" class="form-control" name="Carnet" id="Carnet">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Rol">Rol</label>
                        <div class="input-group" id="Rol">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                            <input type="email" class="form-control" name="Correo" id="Correo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Clave">Contraseña</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                            <input type="password" class="form-control" name="Clave" id="Clave">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                            <input type="text" class="form-control" name="Telefono" id="Telefono">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
















<script src="{{asset('js/modal.js')}}"></script>
@include('Administrador/footer')
