<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rol</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->


    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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
                @if($seccion->permisos->Titulo != "Ninguno")
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route($seccion->permisos->Ruta)}}">
                            <i class="{{$seccion->permisos->Icono}}"></i>
                            <span>{{$seccion->permisos->Titulo}}</span></a>
                    </li>


                @endif

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
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ajustes
                            </a>
                            <div class="dropdown-divider"></div>
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
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-center text-gray-800">Roles que desempeñan los usuarios</h1>

                <button id="btnRol" class="btn btn-primary btn-icon-split my-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-user"></i>
                        </span>
                    <span class="text">Agregar rol</span>

                </button>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Rol</h6>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                        <table id="example" class="table tablota table-striped dt-responsive table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>Id</th>
                                <th>Nombre del Rol</th>
                                <th>Estado</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datos as $rol)
                                @if($rol->Estado == 1 )

                                    <tr>
                                        @if($rol->Nombre != 'Estudiante')
                                        <td class="text-center">

                                            <button id="btnEditar" onclick="editar({{$rol}})" class="mr-1 btn btn-unan btn-circle">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>


                                            <button onclick="eliminar('{{route("rol.destroy",":id")}}','{{$rol->IdRol }}')" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <button type="button" onclick="permiso({{$rol->IdRol}})"  data-toggle="modal" data-target="#modalPermiso{{ $rol->IdRol }}"       class="ml-1 btn btn-success btn-circle">
                                                <i class="fa-solid fa-key"></i>
                                            </button>
                                            <p hidden="">{{$y++}}</p>

                                            <div id="modalPermiso{{ $rol->IdRol }}" class="modal fade"  tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog"  role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Agregar Permisos </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mx-xl-4 text-center">
                                                            <form id="formulario-Permiso{{ $rol->IdRol }}" method="post" action="{{route('permisos.guardar')}}">
                                                                @csrf

                                                                <div class="form-group" hidden="">
                                                                    <label for="pID" class="col-form-label">Nombre del rol:</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-fw fa-user"></i>
                                                                        </span>
                                                                        <input type="text" required class="form-control" id="pID" value="{{$rol->IdRol}}" name="pID">
                                                                    </div>
                                                                </div>











                                                                <div class="table-responsive">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                <div class="card shadow mb-4 px-1">
                                                                    <div class="card-header py-3">
                                                                        <h6 class="m-0 font-weight-bold text-primary">Permisos</h6>
                                                                    </div>

                                                                    <div class="card-body">

                                                                        <div class="table-responsive">

                                                                    <table id="miDataTable" class="tablita table table-striped dt-responsive table-bordered nowrap"  >

                                                                        <thead >
                                                                        <tr>
                                                                            <th>Permiso</th>
                                                                            <th>Agregar</th>

                                                                        </tr>

                                                                        </thead>

                                                                        <tbody>

                                                                        @foreach($dataPermiso as $permisos)
                                                                            @if($permisos->Titulo != "Ninguno")
                                                                                <tr>


                                                                                    <td>{{$permisos->NombrePermiso}}</td>




                                                                                    @php

                                                                                        $confirma =   Illuminate\Support\Facades\DB::table('RolesXPermisos')
                                                                                                        ->join('Permisos', 'Permisos.Id', '=', 'RolesXPermisos.Permisos_Id')
                                                                                                        ->where('RolesXPermisos.Roles_id', $rol->IdRol)
                                                                                                        ->where('RolesXPermisos.Permisos_Id', $permisos->Id)
                                                                                                        ->first();







                                                                                    @endphp
                                                                                    @if(empty($confirma))
                                                                                        <td>

                                                                                            <input type="checkbox" name="notas[]"  value="{{$permisos->Id}}" id="{{$permisos->Id}}">
                                                                                        </td>
                                                                                    @else
                                                                                        <td>
                                                                                            <input type="checkbox" name="notas[]" checked value="{{$permisos->Id}}" id="{{$permisos->Id}}">
                                                                                        </td>
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
                                                                    </div>
                                                                </div>







                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="submit" form="formulario-Permiso{{ $rol->IdRol }}"  class="btn btn-primary">Guardar</button>

                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
















                                        </td>
                                        @else
                                            <td class="alert alert-primary text-center">
                                            <p>Predeterminado</p>
                                            </td>

                                        @endif
                                            <td>{{$rol->IdRol}}</td>
                                        <td>{{$rol->Nombre}}</td>
                                        @if($rol->Estado==1)
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






<!--
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover display responsive nowrap" id="tabla" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre del Rol</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre del Rol</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($datos as $rol)
                                @if($rol->Estado == 1 )
                                <tr>
                                    <td>{{$rol->IdRol}}</td>
                                    <td>{{$rol->Nombre}}</td>
                                    @if($rol->Estado==1)
                                        <td>Activo</td>
                                    @else
                                        <td>No activo</td>
                                    @endif
                                    <td>

                                        <button id="btnEditar" onclick="editar({{$rol}})" class="btn btn-unan btn-circle">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>

                                        <form method="post" action="{{url('/rol/'.$rol->IdRol)}}" class="form-eliminar btn btn-danger btn-circle">
                                           @csrf
                                            {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        </form>





                                    </td>



                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
    -->
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




<!--Formulario para agregar roles-->
<div id="ModalRol" class="modal fade"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo rol </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario" method="POST">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="IdRol" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdRol" name="IdRol">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NombreRol" class="col-form-label">Nombre del rol:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-user"></i>
                                </span>
                            <input type="text" required class="form-control" id="NombreRol" name="NombreRol">
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">

                <button type="submit" id="btnGuardar" form="formulario" class="btn btn-primary">Guardar</button>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


























@include('Administrador/footer')
<script src="{{asset('js/modalRol.js')}}"></script>




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
</html>
