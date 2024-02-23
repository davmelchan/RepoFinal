<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portafolio</title>

    <!-- Custom fonts for this template-->

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Custom styles for this template -->


    <!-- Custom styles for this page -->
    <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    @include('Administrador/data')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-unan sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('maestro')}}">
            <div class="sidebar-brand-icon ">
                <i class="fa-solid fa-briefcase"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Portafolio Academico</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->


        <!-- Divider -->


        <!-- Heading -->

        @foreach($secciones as $seccion)
            @if($seccion->permisos->Id == 10 )
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
                            @if(empty($resultado->Nombres))
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('datos')->first()->rolUser->Nombre}}</span>
                            @else

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$resultado->Nombres}} {{$resultado->Apellidos}}</span>

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

                            <a class="dropdown-item" href="{{route('Config')}}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ajustes
                            </a>
                            <div class="dropdown-divider"></div>
                            @auth
                                <form action="{{route('logoutDocente')}}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cerrar Sesión

                                    </button>
                                </form>
                            @endauth
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->

            <div class="container-fluid">
                <h1 class="h3 mb-2 text-center text-gray-800">Actividades realizadas en el centro de prácticas</h1>

                <button onclick="Abrirfrm('{{$resultado->Identificacion}}')" class="btn btn-success btn-icon-split my-3">
                        <span class="icon">
                          <i class="fa-solid fa-plus"></i>
                        </span>
                    <span class="text">Agregar actividad</span>
                </button>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de actividades</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Caducidad</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Actividades as $actividad)
                                    @if($actividad->Activo !=0)
                                    <tr>
                                        <th>{{$actividad->Titulo}}</th>
                                        <th>{{$actividad->FechaInicio}}</th>
                                        <th>{{$actividad->FechaFinalizacion}}</th>
                                        <th>{{$actividad->Estado}}</th>

                                        <td class="text-center">
                                            <button id="btnEditar" onclick="editar({{$actividad}},'{{$actividad->FechaInicio}}','{{$actividad->FechaFinalizacion}}')"  class="btn btn-unan btn-circle">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>



                                            <button onclick="eliminar('{{route("Estudiante.destroy.Actividad",":id")}}','{{$actividad->IdTracker}}')" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <a href="{{route('Estudiante.Evidencia1',$actividad->IdTracker)}}" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa-solid fa-eye" style="color: #ffffff;"></i>
                                        </span>
                                                <span class="text">Ver evidencias</span>
                                            </a>



                                        </td>



                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>










                <!-- DataTales Example -->





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

<!--Formulario para agregar grupo-->

<div id="ModalActividades" class="modal fade"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar datos de la valoración</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="formulario"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="IdActividad" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdActividad" name="IdActividad">
                        </div>
                    </div>


                    <div class="form-group" hidden>
                        <label for="IdEstudiante" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdEstudiante" name="IdEstudiante">
                        </div>
                    </div>


                    <fieldset class="border p-2">
                        <legend class="w-auto">Periodo de actividad</legend>
                        <div class="form-group">
                            <label for="Fechainicio" class="col-form-label">Fecha de inicio:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                 <i class="fa-solid fa-calendar"></i>
                                </span>
                                <input type="date" required class="form-control" id="Fechainicio" name="Fechainicio" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Fechafinal" class="col-form-label">Fecha de finalización:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-calendar"></i>
                                </span>
                                <input type="date" required class="form-control" id="Fechafinal" name="Fechafinal" >
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="TituloActividad" class="col-form-label">Titulo:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                            <input type="text" required class="form-control" id="TituloActividad" name="TituloActividad">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Estado" class="col-form-label">Estado: </label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-thumbtack"></i>
                                </span>
                            <select  class="form-control" id="Estado" required name="Estado">

                                <option selected value="Pendiente">Pendiente</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Realizado">Realizado</option>
                            </select>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnModal" onclick="guardarActividad('{{route('Estudiante.Guardar.Actividad')}}')" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>





@include('Administrador/footer')
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('js/modalActividades.js')}}"></script>
</body>


@if(Session::has('exito'))
    <script>
        Swal.fire(
            'Completado',
            '{{Session::get('exito')}}',
            'success'
        )
    </script>
@endif



</html>
