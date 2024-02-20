
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


    <!-- Custom styles for this page -->

    <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link href="{{asset('vendor/jquery/jquery.timepicker.min.css')}}" rel="stylesheet" type="text/css">
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
            @if($seccion->permisos->Id == 47 )
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
                <h1 class="h3 mb-2 text-center text-gray-800">Listado del grupo  <strong>{{$resultado->Nombre}}</strong></h1>



                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de estudiantes</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Empresa</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alumnos as $alumno)
                                    <tr>


                                        <th>{{$alumno->Identificacion}}</th>
                                        <th>{{$alumno->Nombres}}</th>
                                        <th>{{$alumno->Apellidos}}</th>
                                        @if(empty($alumno->Empresa->Nombre))
                                            <th>No disponible</th>
                                        @else
                                            <th>{{$alumno->Empresa->Nombre}}</th>
                                        @endif



                                        <td class="text-center">

                                            @php
                                                $notaCentro = \App\Models\EvaluacionCentro::where('IdEstudiante', $alumno->Identificacion)
                                                                                                         ->where('IdMaestro',session('datos')->first()->Identificacion)
                                                                                                         ->where('IdEmpresa',$alumno->idEmpresa)
                                                                                                         ->first(); @endphp

                                            @if($notaCentro)
                                                @php
                                                    $ReportesRealizados = \App\Models\Reportes::where('IdAlumno', $alumno->Identificacion)
                                                                                                             ->where('IdMaestro',session('datos')->first()->Identificacion)
                                                                                                             ->first(); @endphp
                                                @if(!$ReportesRealizados)
                                                    <button class="btn btn-unan" onclick="crearReporte('{{$alumno->Identificacion}}')" >
                                                        <i class="fa-solid fa-square-poll-vertical"></i>
                                                        <span class="text">Crear reporte</span>
                                                    </button>
                                                @else
                                                    <button class="btn btn-unan" onclick="editarReporte('{{$alumno->Identificacion}}',{{$ReportesRealizados}})" >
                                                        <i class="fa-solid fa-square-poll-vertical"></i>
                                                        <span class="text">Editar reporte</span>
                                                    </button>


                                                    <a href="{{route('Maestro.Ver.ReportePdf',['id'=>$alumno->Identificacion])}}" target="_blank" class="btn btn-success btn-icon-split">

                                                <span class="icon text-white-100">
                                                    <i class="fa-solid fa-eye"></i>
                                                </span>

                                                    </a>
                                                    <form id="formularioArchivo"  class="mt-1">
                                                        @csrf
                                                        <div class="form-group" hidden>
                                                            <label for="IdEstudiante" class="col-form-label">Identificador:</label>
                                                            <div class="input-group">
                                                                 <span class="input-group-text">
                                                                     <i class="fa-solid fa-user"></i>
                                                                 </span>
                                                                <input type="text" class="form-control" id="IdEstudiante" name="IdEstudiante" value="{{$alumno->Identificacion}}">
                                                            </div>
                                                        </div>
                                                        <button type="button" onclick="descargarArchivo('{{ route('descargar.documentos') }}')" class="btn btn-unan">
                                                            <i class="fa-solid fa-briefcase"></i>
                                                        </button>
                                                    </form>

                                                @endif







                                                @else
                                                No disponible

                                                @endif

                                        </td>



                                    </tr>
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

<div id="ModalSupervision" class="modal fade"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar datos adicionales del reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario" method="POST" action="{{route('Maestro.Guardar.ReportePdf')}}">
                    @csrf

                    <div class="form-group" hidden>
                        <label for="IdEstudiante" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdEstudiante" name="IdEstudiante" >
                        </div>
                    </div>

                    <div class="form-group" hidden>
                        <label for="IdDocente" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdDocente" name="IdDocente" value="{{session('datos')->first()->Identificacion}}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="HoraEntrada" class="col-form-label">Hora de entrada:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                   <i class="fa-solid fa-clock"></i>

                                </span>
                            <input type="text" id="HoraEntrada" name="HoraEntrada" class="form-control timepicker">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="HoraSalida" class="col-form-label">Hora de salida:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                   <i class="fa-solid fa-clock"></i>
                                </span>
                            <input type="text" id="HoraSalida" name="HoraSalida" class="form-control timepicker">

                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Area" class="col-form-label">Area asignada:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                               <i class="fa-solid fa-briefcase"></i>
                                </span>
                            <input type="text" class="form-control" id="Area" name="Area">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="RolAsignado" class="col-form-label">Rol asignado en el area de trabajo:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <input type="text" class="form-control" id="RolAsignado" name="RolAsignado">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Observacion" class="col-form-label">Observación:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                            <textarea type="text" required style="resize: none" class="form-control" rows="4" cols="50" id="Observacion" name="Observacion" maxlength="450"></textarea>
                        </div>
                        <div class="text-right" id="contador"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnGuardar" onclick="guardar('{{route('Maestro.Guardar.ReportePdf')}}')"  form="formulario" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>





@include('Administrador/footer')
<script src="{{asset('vendor/jquery/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('js/ModalResportes.js')}}"></script>
</body>

<script>
    function descargarArchivo(ruta)
    {

        var formData = new FormData($('#formularioArchivo')[0]);
        $.ajax({
            type: 'POST',
            url: ruta,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var link = document.createElement('a');
                link.href= 'http://localhost/Role_Permiso'+ response.archivo;
                link.download= response.nombre;

                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            error: function(xhr) {
                Swal.fire(
                    'Error',
                    xhr.responseJSON.errors,
                    'error'
                )


            }
        })



    }





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
