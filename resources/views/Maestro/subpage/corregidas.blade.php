
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
        @foreach($secciones as $seccion)
            @if($seccion->permisos->Id == 12 )
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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Calificar evaluaciones del grupo</h1>
           @if(!$datos->isEmpty())
                    <button class="btn btn-success btn-icon-split" form="formulario">
                                        <span class="icon text-white-50">
                                           <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                        </span>

                        <span class="text">Calificar</span>

                    </button>
                    @endif
                </div>
                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de alumnos</h6>
                    </div>
                    <div class="card-body">
<div >

                            <form action="{{ route('CorreccionSave',['id'=>$idgrupo])}}" id="formulario" method="POST">
                                @csrf
                            <table id="miTabla" class=" fixed-column display table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th >Estudiante</th>
                                    @if(!$estudiantes->isEmpty())
                                        <th class="col-2">
                                            <button  class="btn btn-success" onclick="mostrarEmpresa()" type="button" >Evaluación empresa</button>
                                        </th>
                                    @endif
                                    @if(!$estudiantes->isEmpty())
                                     @foreach($datos as $data)
                                        @if($data->Estado ==1)
                                        <th class="col-2">

                                            <button type="button" onclick="mostrar('evaluación {{$i}}','{{$data->Nombre}}','{{$data->Descripcion}}','{{$data->UnidadesEvaluacion->Nombre}}','{{$data->TipoEvaluacion->Nombre}}','{{$data->Puntaje}}')" class="btn btn-unan" >
                                                Evaluación
                                            {{$i++}}</th>

                                            </button>

                                        @endif
                                     @endforeach
                                    @endif
                                <th>Sumatoria</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($estudiantes as $estudiante)
                                   @if($estudiante->Estado == 1)

                                    <tr>
                                    <td>{{$estudiante->Nombres}} {{$estudiante->Apellidos}}</td>
                                        @php
                                            $notaCentro = \App\Models\EvaluacionCentro::where('IdEstudiante', $estudiante->Identificacion)
                                                          ->where('IdMaestro',session('datos')->first()->Identificacion)
                                                          ->where('IdEmpresa',$estudiante->idEmpresa)
                                                          ->first();
                                        @endphp

                                        @if(!$notaCentro)
                                            <td class="text-center">
                                                <button  class="btn btn-success" onclick="valoracion('{{$estudiante->Identificacion}}','{{$estudiante->idEmpresa}}','{{session('datos')->first()->Identificacion}}')" type="button" >Añadir</button>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <button  class="btn btn-unan" onclick="edicion('{{$estudiante->Identificacion}}','{{$estudiante->idEmpresa}}','{{session('datos')->first()->Identificacion}}','{{$notaCentro->FechaInicio}}','{{$notaCentro->FechaFinal}}','{{$notaCentro->Nota}}')" type="button" >Editar</button>
                                            </td>

                                        @endif
                                            <p hidden>{{$i=0}}</p>
                                            @foreach($datos as $data)
                                            @php
                                                $nota = \App\Models\EvaluacionXNotas::where('idEvaluacion', $data->IdEvaluacion)
                                                              ->where('idEstudiante', $estudiante->Identificacion)
                                                              ->first();
                                                $valorNota = $nota ? $nota->nota : '';
                                                $valInt = intval($valorNota);
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
                                                <input class="input-group" required name="notas[{{$data->IdEvaluacion}}][ev{{$t}}][nota]" value="{{$valorNota}}" id="not"  type="number"  min="0" max="{{$data->Puntaje}}">
                                                <p hidden>{{$i=$i+$valInt}}</p>




                                                {{--


                                                    <input class="input-group" required name="notas[{{$data->IdEvaluacion}}][ev{{$t}}][nota]" value="{{$estudiante->notasVer->nota}}"  type="number" min="0" max="20">
--}}
                                            </td>
                                                @endif
                                        @endforeach
                                    <td>
                                        {{$i}}
                                    </td>


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
                        <label for="Titulo" class="col-form-label">Título:</label>
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

<div id="EvCompany" class="modal fade EvCompany"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Información de la evaluación por parte de la empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="TituloCompany" class="col-form-label">Título:</label>
                    <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                        <input type="text" readonly class="form-control" id="TituloCompany" name="TituloCompany"
                        value="Calificación del desempeño laboral">
                    </div>
                </div>

                <div class="form-group">
                    <label for="DescripcionCompany" class="col-form-label">Descripción:</label>
                    <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                        <textarea class="form-control" readonly style="resize: none;" required id="DescripcionCompany" onresize="false" name="DescripcionCompany" cols="30" rows="10">En este campo se agrega la valoración final realizada por el responsable de centro de Prácticas, teniendo como punto de referencia los logros alcanzados dentro del periodo de formación  conforme al rol desempeñado dentro del área laboral asignada por el responsable del centro de prácticas.</textarea>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<div id="ModalEvCompany" class="modal fade"  tabindex="-1" role="dialog"
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
                <div id="errores"></div>
                <form method="POST" id="formulario-Correccion" action="{{route('Maestro.Guardar.NotaCentro')}}"  enctype="multipart/form-data">
                    @csrf

                    <div class="form-group" hidden>
                        <label for="IdMaestro" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdMaestro" name="IdMaestro">
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="IdEmpresa" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdEmpresa" name="IdEmpresa">
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
                        <legend class="w-auto">Tiempo de pasantía</legend>
                    <div class="form-group">
                        <label for="Fechainicio" class="col-form-label">Fecha de inicio:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="date" required class="form-control" id="Fechainicio" name="Fechainicio" >
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="Fechafinal" class="col-form-label">Fecha de finalización:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="date" required class="form-control" id="Fechafinal" name="Fechafinal" >
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="Nota" class="col-form-label">Puntaje:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-scroll"></i>
                                </span>
                            <input type="number" required class="form-control" id="Nota"  oninput="validarNumero(event)" min="60" max="100" name="Nota">
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnModal" onclick="guardarValoracion('{{route('Maestro.Guardar.NotaCentro')}}')" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>

@include('Administrador/footer')

<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{asset('js/Corregidas.js')}}"></script>

</body>

<script>


    $(document).ready(function()
        {


            var table = $('#miTabla').DataTable({

                "scrollX": true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Registros no encontrados",
                    "info": "Mostrando páginas _PAGE_ de _PAGES_",
                    "infoEmpty": "Información no disponible",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": 'Buscar:',
                    'paginate':{
                        'next':'Siguiente',
                        'previous':'Anterior'
                    }
                }
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
