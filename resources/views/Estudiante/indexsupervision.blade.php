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

    <!-- Custom styles for this template-->

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    {{--
    "../vendor/fontawesome-free/css/all.min.css"
    "../css/sb-admin-2.css"

    --}}
    <script src="https://kit.fontawesome.com/4ae6dfa596.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->

    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@include('Administrador/data')




</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-unan sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('Estudiante.Ver')}}">
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
        <!-- Nav Item - Pages Collapse Menu -->
            @if(Route::currentRouteName() == $seccion->permisos->Ruta )
        <li class="nav-item active">
            <a class="nav-link" href="{{route($seccion->permisos->Ruta)}}">
                <i class="{{$seccion->permisos->Icono}}"></i>
                <span>{{$seccion->permisos->Titulo}}</span></a>
        </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route($seccion->permisos->Ruta)}}">
                        <i class="{{$seccion->permisos->Icono}}"></i>
                        <span>{{$seccion->permisos->Titulo}}</span></a>
                </li>
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

        <!-- Nav Item - Pages Collapse Menu -->





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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $resultado->Nombres }} {{ $resultado->Apellidos }}</span>
                            @if(empty($resultado->rutaImagen))
                                <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
                            @else
                                <img class="img-profile rounded-circle" src="{{asset('storage').'/'.$resultado->rutaImagen}}">
                            @endif
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('Setting')}}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ajustes
                            </a>
                            <div class="dropdown-divider"></div>
                            @auth
                                <form action="{{route('logoutAlumno')}}" method="post">
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

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-center text-gray-800">Historial de supervisiones realizadas por el maestro</h1>



                <!-- DataTales Example -->
                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de supervisiones</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Docente</th>
                                <th>Empresa</th>
                                <th>Tipo de supervisión</th>
                                <th>Observación</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($informaciones as $info)
                                @if($info->Estado == 1)
                            <tr>
                                <td>{{$info->Maestros->Nombres}} {{$info->Maestros->Apellidos}}</td>
                                <td>{{$info->Company->Nombre}}</td>
                                <td>{{$info->catSupervision->Nombre}}</td>
                                <td>{{$info->Observacion}}</td>
                                <td>{{$info->FechaSupervision}}</td>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de cerrar sesión?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Haz clic en el boton "<strong>confirmar</strong>" para cerrar sesión.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger" href="{{url('/')}}">Confirmar</a>
            </div>
        </div>
    </div>
</div>
@include('Administrador/footer')

@if(empty($resultado->idEmpresa)&& empty($resultado->idGrupo))
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Por favor ingrese la información correspondiente</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('Estudiante.corroborar')}}" id="formulario">
                        @csrf
                        <ul class="list-group">

                            <li class="list-group-item list-group-item-danger"><strong>Nota:</strong> Si tu centro de prácticas no aparece en la seleccion haz click en añadir centro de prácticas</li>

                        </ul>

                        <div class="form-check mt-1">
                            <input type="checkbox" class="form-check-input" id="miCheckbox">
                            <label class="form-check-label" for="miCheckbox">Añadir centro de prácticas</label>
                        </div>

                        <div class="form-group" hidden>
                            <label for="IdForm" class="col-form-label">Identificador:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="IdForm" name="IdForm" value="1">
                            </div>
                        </div>


                        <div class="form-group">
                            <label  class="col-form-label">Centro de práctica:</label>
                            <div class="input-group" id="seleccion">

                                <select name="Empresa" id="Empresa"   class="form-control company" style="display: none; width: 100%" multiple="multiple" >
                                    <optgroup label="Centros de prácticas">

                                        @foreach($empresas as $empresa)
                                            @if($empresa->Estado==1 && $empresa->IdEmpresa>6)
                                                <option value="{{$empresa->IdEmpresa}}">{{$empresa->Nombre}}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                </select>

                            </div>
                            <div class="input-group" id="nombreEmpresa" hidden="">

                                <span class="input-group-text">
                                    <i class="fa-solid fa-building"></i>
                                </span>
                                <input type="text" class="form-control" id="EmpresaName" name="EmpresaName">
                            </div>

                        </div>

                        <div class="form-group" hidden="" id="frmDescripcion">
                            <label for="Descripcion" class="col-form-label">Descripción:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </span>
                                <textarea type="text" style="resize: none" class="form-control" rows="4" cols="50" id="Descripcion" name="Descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group" hidden="" id="frmResponsable">
                            <label for="Responsable" class="col-form-label">Responsable del centro de prácticas:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-building"></i>
                                </span>
                                <input type="text" class="form-control" id="Responsable" name="Responsable">
                            </div>
                        </div>

                        <div class="form-group" hidden="" id="frmTelefono">
                            <label for="Telefono">Teléfono responsable:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-phone"></i>
                                </span>
                                <input type="text" required class="form-control" minlength="8" maxlength="8" name="Telefono" id="Telefono">
                            </div>
                        </div>


                        <div class="form-group">
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
                    <button type="button" form="formulario" id="btnGuardar" onclick="guardarGrupo('{{route('Estudiante.corroborar')}}')" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>

                    @auth
                        <form action="{{route('logoutAlumno')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                        </form>
                    @endauth



                </div>
            </div>
        </div>
    </div>
@endif
@if(empty($resultado->idGrupo))
    <div class="modal fade" id="staticBackGroup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Por favor ingrese la información correspondiente</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('Estudiante.corroborar')}}" id="formulario">
                        @csrf

                        <div class="form-group" hidden>
                            <label for="IdForm" class="col-form-label">Identificador:</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="IdForm" name="IdForm" value="2">
                            </div>
                        </div>


                        <div class="form-group">
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
                    <button type="button" form="formulario" id="btnGuardar" onclick="guardarGrupo('{{route('Estudiante.corroborar')}}')" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>

                    @auth
                        <form action="{{route('logoutAlumno')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                        </form>
                    @endauth



                </div>
            </div>
        </div>
    </div>
@endif

<script>

    $(document).ready(function()
        {
            $('#example').dataTable({
                responsive:true,
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

@if(empty($resultado->idEmpresa)&&empty($resultado->idGrupo))
    <script src="{{asset('js/modalSeguro.js')}}"></script>
@elseif(empty($resultado->idGrupo))
    <script src="{{asset('js/GrupoVerify.js')}}"></script>
@endif


</body>
</html>
