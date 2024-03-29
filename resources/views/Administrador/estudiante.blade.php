

    <!DOCTYPE html>
<html>
<body lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crear usuarios</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    {{--
    "../vendor/fontawesome-free/css/all.min.css"
    "../css/sb-admin-2.css"

    --}}
    <script>

        window.onbeforeunload = function() {
            window.location.href = window.location.href;
        };
    </script>
    <script src="https://kit.fontawesome.com/4ae6dfa596.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->


    <!-- Custom styles for this page -->
    <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    @include('Administrador/data')
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-unan sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('administrador')}}">
            <div class="sidebar-brand-icon ">
                <i class="fa-solid fa-briefcase"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Portafolio Academico</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        @foreach($secciones as $seccion)
            @if(Route::currentRouteName() == $seccion->permisos->Ruta )
                <li class="nav-item active">
                    <a class="nav-link" href="{{route($seccion->permisos->Ruta)}}">
                        <i class="{{$seccion->permisos->Icono}}"></i>
                        <span>{{$seccion->permisos->Titulo}}</span></a>
                </li>

            @else
                @if($seccion->permisos->Titulo != "Ninguno")
                    <li class="nav-item">
                        <a class="nav-link" href="{{route($seccion->permisos->Ruta)}}">
                            <i class="{{$seccion->permisos->Icono}}"></i>
                            <span>{{$seccion->permisos->Titulo}}</span></a>
                    </li>


                @endif
            @endif

        @endforeach



        <!--  <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
            </div>
        </li>
-->
        <!-- Nav Item - Charts -->
        <!--         <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
-->
        <!-- Nav Item - Tables -->
        <!--         <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>
-->
        <!-- Divider -->


        <!-- Sidebar Toggler (Sidebar) -->


        <!-- Sidebar Message -->


    </ul>


    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->



                    <!-- Nav Item - Alerts -->


                    <!-- Nav Item - Messages -->

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(empty(session('datos')->first()->infoUser->Nombres))
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('datos')->first()->rolUser->Nombre}}</span>
                            @else

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('datos')->first()->infoUser->Nombres}} {{session('datos')->first()->infoUser->Apellidos}}</span>

                            @endif
                                @if(isset($trap->FotoRuta))

                                    <img class="img-profile rounded-circle" src="{{asset('storage').'/'.$trap->FotoRuta}}">


                                @else
                                    <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">


                                @endif
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            @if(isset($trap->FotoRuta))
                                <a class="dropdown-item" href="{{route('Config')}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a>
                            @endif
                            @auth
                                <a href="{{ route('salir') }}" class="dropdown-item"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('salir') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endauth



                            <!--

                            <form action="" method="post">

                                <button class="dropdown-item" type="submit">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir

                                </button>
                            </form>

                            -->
                        </div>
                    </li>

                </ul>
            </nav>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-center text-gray-800">Estudiantes de prácticas de formación profesional</h1>

                <button id="btnUsuarios" class="btn btn-primary btn-icon-split my-3">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-user-plus"></i>
                        </span>
                    <span class="text">Agregar estudiante</span>
                </button>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Estudiantes</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Identificación</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Género</th>
                                    <th>Imagen</th>
                                    <th>Empresa</th>
                                    <th>Grupo</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($estudiantes as $estudiante)
                                    @if($estudiante->Estado == 1)
                                    <tr>

                                        <td class="text-center">
                                            <button id="btnEditar" onclick="editar({{$estudiante}})"  class="btn btn-unan btn-circle">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <button onclick="eliminar('{{route("student.destroy",":id")}}','{{$estudiante->Identificacion}}')" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                        <td>{{$estudiante->Identificacion}}</td>
                                        <td>{{$estudiante->Nombres}}</td>
                                        <td>{{$estudiante->Apellidos}}</td>
                                        <td>{{$estudiante->Direccion}}</td>
                                        <td>{{$estudiante->Genero->Nombre}}</td>
                                        @if(isset($estudiante->rutaImagen))
                                            <td>{{$estudiante->rutaImagen}}</td>
                                        @else
                                            <td>Sin foto</td>
                                        @endif
                                            @if(empty($estudiante->Empresa->Nombre))
                                                <td>No asignado</td>
                                        @else
                                            <td>{{$estudiante->Empresa->Nombre}}</td>
                                            @endif


                                        @if($estudiante->idGrupo!=0)
                                            <td>{{$estudiante->idGrupo}}</td>

                                        @else
                                            <td>No asignado</td>
                                        @endif

                                        <td>{{$estudiante->Telefono}}</td>

                                        @if($estudiante->Estado==1)

                                            <td>Activo</td>
                                        @else
                                            <td>No activo</td>
                                        @endif


                                    </tr>
                                    @endif
                                @endforeach
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
                    <span>Derechos de Autor &copy; UNAN CUR-Carazo</span>
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


<!-- Button trigger modal -->

<!-- Formulario para agregar usuario -->
<div id="ModalUsuarios" class="modal fade"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario" method="POST" action="{{route('SaveStudent')}}">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="idform" class="col-form-label idform">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="idform" name="idform">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="NombreEstudiante" class="col-form-label">Nombres del estudiante:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" required class="form-control" id="NombreEstudiante" name="NombreEstudiante">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ApellidoEstudiante" class="col-form-label">Apellidos del estudiante:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" required class="form-control" id="ApellidoEstudiante" name="ApellidoEstudiante">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Direccion" class="col-form-label">Dirección: </label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                            <input type="text"  required class="form-control" id="Direccion" name="Direccion">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Genero" class="col-form-label">Género:</label>
                        <div class="input-group" id="SeleccionarGenero">
                            <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <select name="Genero" required id="Genero" class="form-control">
                                @foreach($generos as $genero)
                                    @if($genero->Estado==1)
                                <option value="{{$genero->IdGenero}}">{{$genero->Nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Empresa" class="col-form-label">Centro de práctica:</label>
                        <div class="input-group">
                                                      <select name="Empresa" id="Empresa" class="form-control company" style="display: none; width: 100%" multiple="multiple" >
                                <optgroup label="Centros de prácticas">
                                    @foreach($empresas as $empresa)
                                        @if($empresa->Estado==1)
                                    <option value="{{$empresa->IdEmpresa}}">{{$empresa->Nombre}}</option>
                                        @endif
                                            @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>


                    <div class="form-group" id="frmIdentificador">
                        <label for="identificador"  class="col-form-label">Identificación: </label>
                        <div class="input-group">
                                <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" minlength="8" maxlength="8" required class="form-control" id="identificador" name="identificador">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Clave">Contraseña</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                            <input type="password" minlength="8" maxlength="20" class="form-control" name="Clave" id="Clave">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                            <input type="text" required class="form-control" minlength="8" maxlength="8" name="Telefono" id="Telefono">
                        </div>
                    </div>

                    <div class="form-group" id="MdlGrupo">
                        <label for="IdGrupo" class="col-form-label">Código del grupo:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                  <i class="fa-solid fa-chalkboard-user"></i>
                                </span>
                            <input type="text" required class="form-control" minlength="8" maxlength="8" id="IdGrupo" name="IdGrupo">
                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnGuardar" onclick="guardarGrupo('{{route('SaveStudent')}}')" form="formulario" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<!--Ventanas modal para agregar usuario-->
@include('Administrador/footer')
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('js/estudiante.js')}}"></script>




@if(Session::has('exito'))
    <script>
        Swal.fire(
            'Completado',
            '{{Session::get('exito')}}',
            'success'
        )
    </script>
@endif


</body>





