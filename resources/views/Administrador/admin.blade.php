
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
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favcon/android-icon-192x192.png')}} ">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favcon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favcon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favcon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favcon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('favcon/ms-icon-144x144.png')}} ">
    <meta name="theme-color" content="#ffffff">
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







        <!--    <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="cards.html">Cards</a>
                </div>
            </div>
        </li>
-->
        <!-- Nav Item - Utilities Collapse Menu -->
        <!--         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li>
    -->
        <!-- Divider -->



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
                <h1 class="h3 mb-2 text-center text-gray-800">Usuarios del sistema de portafolio académico</h1>

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

                            <table id="example" class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Identificación</th>
                                    <th>Nombres</th>

                                    <th>Apellidos</th>
                                    <th>Especialidad</th>
                                    <th>Género</th>
                                    <th>foto</th>
                                    <th>Rol</th>
                                    <th>Estado</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($maestros as $maestro)

                                    @if($maestro->Estado==1)
                                        @if(!empty(session('datos')->first()->infoUser->Nombres) && $maestro->infoUsuario->rolUser->IdRol!=1)
                                            <tr>
                                                <td>
                                                    <button id="btnEditar" onclick="editar({{$maestro}},'{{$maestro->infoUsuario->rolUser->IdRol}}')" class="btn btn-unan btn-circle">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <button onclick="eliminar('{{route("teacher.destroy",":id")}}','{{$maestro->Identificacion }}')" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </button>


                                                </td>
                                                <td>{{$maestro->Identificacion}}</td>
                                                <td>{{$maestro->Nombres}} {{$maestro->Apellidos}}</td>
                                                <td>{{$maestro->Apellidos}}</td>
                                                <td>{{$maestro->especialidad}}</td>
                                                <td>{{$maestro->Genero->Nombre}}</td>
                                                @if(isset($maestro->FotoRuta))
                                                    <td>{{$maestro->FotoRuta}}</td>
                                                @else
                                                    <td>Sin fotografia</td>
                                                @endif
                                                <td>{{$maestro->infoUsuario->rolUser->Nombre}}</td>
                                                @if($maestro->Estado==1)

                                                    <td>Activo</td>
                                                @else

                                                    <td>No activo</td>
                                                @endif




                                            </tr>
                                        @endif

                                        @if(empty(session('datos')->first()->infoUser->Nombres))
                                            <tr>
                                                <td>
                                                    <button id="btnEditar" onclick="editar({{$maestro}},'{{$maestro->infoUsuario->rolUser->IdRol}}')" class="btn btn-unan btn-circle">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                    <button onclick="eliminar('{{route("teacher.destroy",":id")}}','{{$maestro->Identificacion }}')" class="btn btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i>
                                                    </button>


                                                </td>
                                                <td>{{$maestro->Identificacion}}</td>
                                                <td>{{$maestro->Nombres}} {{$maestro->Apellidos}}</td>
                                                <td>{{$maestro->Apellidos}}</td>
                                                <td>{{$maestro->especialidad}}</td>
                                                <td>{{$maestro->Genero->Nombre}}</td>
                                                @if(isset($maestro->FotoRuta))
                                                    <td>{{$maestro->FotoRuta}}</td>
                                                @else
                                                    <td>Sin fotografia</td>
                                                @endif
                                                <td>{{$maestro->infoUsuario->rolUser->Nombre}}</td>
                                                @if($maestro->Estado==1)

                                                    <td>Activo</td>
                                                @else

                                                    <td>No activo</td>
                                                @endif




                                            </tr>
                                        @endif

                                    @endif
                                @endforeach                                </tbody>
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
                <h5 class="modal-title" id="exampleModalLabel">Agregar datos del maestro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulariov" method="POST">
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
                        <label for="NombreMaestro" class="col-form-label">Nombres:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" required id="NombreMaestro" name="NombreMaestro">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ApellidoMaestro" class="col-form-label">Apellidos:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" required id="ApellidoMaestro" name="ApellidoMaestro">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="IdGenero" class="col-form-label">Género: </label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>
                            <select  class="form-control" id="IdGenero" required name="IdGenero">
                                @foreach($generos as $genero)
                                    @if($genero->Estado==1)
                                <option value="{{$genero->IdGenero}}">{{$genero->Nombre}}</option>
                                    @endif
                                        @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Roles" class="col-form-label">Rol:</label>
                        <div class="input-group">
                            <select name="Roles" id="Roles" class="form-control rolon" style="display: none; width: 100%" multiple="multiple" >
                                <optgroup label="Roles">
                                    @foreach($roles as $rolito)
                                        @if($rolito->Estado==1)
                                            @if(($rolito->IdRol>1 && !empty(session('datos')->first()->infoUser->Nombres))&&(!empty(session('datos')->first()->infoUser->Nombres && $rolito->IdRol!=29)))
                                            <option value="{{$rolito->IdRol}}">{{$rolito->Nombre}}</option>
                                            @endif
                                                @if(empty(session('datos')->first()->infoUser->Nombres) && $rolito->IdRol!=29)
                                                    <option value="{{$rolito->IdRol}}">{{$rolito->Nombre}}</option>
                                                @endif
                                            @endif
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>







                    <div class="form-group">
                        <label for="Especialidad"  class="col-form-label">Especialidad:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" required id="Especialidad" name="Especialidad">
                        </div>
                    </div>

                    <div class="form-group" id="frmIdentificador">
                        <label for="identificador" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" required id="identificador" minlength="8" maxlength="8" name="identificador">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="Clave">Contraseña</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                            <input type="password" class="form-control" minlength="8" maxlength="20" name="Clave" id="Clave">
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnGuardar" form="formulario" onclick ="guardar('{{route('SaveTeacher')}}')" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<!--Ventanas modal para agregar usuario-->
@include('Administrador/footer')
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('js/modal.js')}}"></script>






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




