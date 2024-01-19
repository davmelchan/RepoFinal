
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portafolio</title>

    <!-- Custom fonts for this template-->

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Custom styles for this template -->

    <style>
        .fixed-column {
            position: sticky;
            left: 0;
            background-color: #fff; /* Color de fondo para simular la fijación */
            z-index: 1;
        }
    </style>


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
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('maestro')}}">
                <i class="fas fa-fw fa-user"></i>
                <span>Grupos</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('evidencia')}}">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Evidencias</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fa-solid fa-folder"></i>
                <span>Evaluaciones</span>
            </a>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item " href="{{url('evaluacionasignada')}}">Asignadas</a>
                    <a class="collapse-item active" href="{{url('evaluacioncorregida')}}">Completadas</a>
                </div>
            </div>
        </li>




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

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('Supervision')}}">
                <i class="fas fa-fw fa-building"></i>
                <span>Supervisión</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../ReporteAlumnos.html">
                    <span class="material-symbols-outlined">
                        query_stats
                    </span>
                <span>Reportes alumnos</span></a>
        </li>



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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session('datos')->first()->Nombres }} {{ session('datos')->first()->Apellidos }}</span>
                            <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Calificar evaluaciones del grupo</h1>
                    <button class="btn btn-success btn-icon-split" form="formulario">
                                        <span class="icon text-white-50">
                                           <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                        </span>
                        <span class="text">Calificar</span>
                    </button>

                </div>
                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de alumnos</h6>
                    </div>
                    <div class="card-body">
<div class="table-responsive">

                            <form action="{{ route('CorreccionSave',['id'=>$idgrupo])}}" id="formulario" method="POST">
                                @csrf
                            <table id="miTabla" class=" fixed-column display table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th >Estudiante</th>
                                     @foreach($datos as $data)
                                        @if($data->Estado ==1)
                                        <th class="col-2">

                                            <button type="button" onclick="mostrar('Evaluacion {{$i}}','{{$data->Nombre}}','{{$data->Descripcion}}','{{$data->UnidadesEvaluacion->Nombre}}','{{$data->TipoEvaluacion->Nombre}}','{{$data->Puntaje}}')" class="btn btn-unan" >
                                                Evaluación
                                            {{$i++}}</th>

                                            </button>

                                        @endif
                                     @endforeach
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($estudiantes as $estudiante)
                                   @if($estudiante->Estado == 1)

                                    <tr>
                                    <td>{{$estudiante->Nombres}} {{$estudiante->Apellidos}}</td>


                                            @foreach($datos as $data)
                                            @php
                                                $nota = \App\Models\EvaluacionXNotas::where('idEvaluacion', $data->IdEvaluacion)
                                                              ->where('idEstudiante', $estudiante->Identificacion)
                                                              ->first();
                                                $valorNota = $nota ? $nota->nota : '';
                                            @endphp

                                            @if($data->Estado == 1)

                                            <td>
                                             {{--  @if(!empty($nota->id))
                                                <input type="text" hidden="notas[{{$data->IdEvaluacion}}][ev{{$t}}][notaId]"  value="{{$nota->id}}">
                                                @endif

--}}

                                                @if(!empty($nota->id))
                                                <input type="text" hidden="" name="notas[{{$data->IdEvaluacion}}][ev{{$t}}][notacion]" value="{{ $nota->id }}">
                                                @endif
                                                    <input type="text" hidden="" name="notas[{{$data->IdEvaluacion}}][ev{{$t}}][IdEvaluacion]" value="{{ $data->IdEvaluacion }}">
                                                <input type="text" hidden="" name="notas[{{$data->IdEvaluacion}}][ev{{$t}}][Identificacion]" value="{{ $estudiante->Identificacion }}">
                                                <input class="input-group" required name="notas[{{$data->IdEvaluacion}}][ev{{$t}}][nota]" value="{{$valorNota}}" id="not"  type="number"  min="0" max="20">





                                                {{--


                                                    <input class="input-group" required name="notas[{{$data->IdEvaluacion}}][ev{{$t}}][nota]" value="{{$estudiante->notasVer->nota}}"  type="number" min="0" max="20">
--}}
                                            </td>
                                                @endif
                                        @endforeach
                                </tr><input type="text" hidden="" name="evs" value="{{$t++}}">


                                   @endif
                                @endforeach
                                </tbody>
                            </table>

                            </form>

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

<!--Formulario para ver informacion de la evaluacion-->
<div id="EvInfo" class="modal fade"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                        <label for="Titulo" class="col-form-label">Titulo:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <input type="text" readonly class="form-control" id="Titulo" name="Titulo">
                        </div>
                    </div>
                <div class="form-group">
                    <label for="unidad" class="col-form-label">Unidad:</label>
                    <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                        <input type="text" readonly class="form-control" id="unidad" name="unidad">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo" class="col-form-label">Tipo de evaluación:</label>
                    <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                        <input type="text" readonly class="form-control" id="tipo" name="tipo">
                    </div>
                </div>

                    <div class="form-group">
                        <label for="Descripcion" class="col-form-label">Descripción:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <textarea class="form-control" readonly style="resize: none;" required id="Descripcion" onresize="false" name="Descripcion" cols="30" rows="10"></textarea>

                        </div>
                    </div>
                <div class="form-group">
                    <label for="puntaje" class="col-form-label">Puntaje:</label>
                    <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-scroll"></i>
                                </span>
                        <input type="number" readonly required class="form-control" id="puntaje" oninput="validarNumero(event)" min="0" max="20" name="puntaje">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


@include('Administrador/footer')

<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('js/corregida.js')}}"></script>

</body>

<script>


    $(document).ready(function()
        {


            var table = $('#miTabla').DataTable({


            });



        }
    );




</script>
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
