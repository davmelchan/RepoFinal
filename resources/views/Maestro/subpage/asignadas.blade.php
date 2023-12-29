
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
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href=" {{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">



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
                    <a class="collapse-item active" href="{{url('evaluacionasignada')}}">Asignadas</a>
                    <a class="collapse-item" href="../ECompletadas.html">Completadas</a>
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
            <a class="nav-link" href="../Supervision.html">
                <i class="fas fa-fw fa-building"></i>
                <span>Supervision</span></a>
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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nombre usuario</span>
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
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Grupos de prácticas</h1>
                    <a id="btnAsignacion" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">

                        <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                        Agregar asignación</a>
                </div>

                <div class="col-md-6">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">All Items</h3>
                            <div class="btn-group"><a class="btn btn-unan" id="btnEditar"><i
                                        class="fa-solid fa-pen-to-square"></i></a><a class="btn btn-unan"
                                                                                     onclick="eliminar()"><i class="fa-solid fa-trash"></i></a></div>
                        </div>
                        <div class="tile-body">
                            <b>Card with button group </b><br>
                            Hey there, I am a very simple card. I am good at containing small bits of information. I
                            am quite convenient because I require little markup to use effectively.

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


<!--Formulario para agregar grupo-->
<div id="ModalAsignacion" class="modal fade"  tabindex="-1" role="dialog"
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
                <form>
                    <div class="form-group" hidden>
                        <label for="IdEvaluacion" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdEvaluacion" name="IdEvaluacion">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Titulo" class="col-form-label">Titulo:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <input type="text" class="form-control" id="Titulo" name="Titulo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="FechaEvaluacion" class="col-form-label">Fecha de evaluacion:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <input type="date" class="form-control" id="FechaEvaluacion" name="FechaEvaluacion">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Puntaje" class="col-form-label">Puntaje:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <input type="number" min="0" max="20" class="form-control" id="Puntaje" name="Puntaje">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="IdUnidad" class="col-form-label">Unidad:</label>
                        <div class="input-group">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="TipoEvaluacion" class="col-form-label">Tipo de evaluacion:</label>
                        <div class="input-group">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Descripcion" class="col-form-label">Descripción:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <textarea class="form-control" id="Descripcion" onresize="false" name="Descripcion" cols="30" rows="10"></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="IdGrupo" class="col-form-label">Grupo:</label>
                        <div class="input-group">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Estado" class="col-form-label">Estado:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-book-open"></i>
                                </span>
                            <select class="form-control" id="Estado" name="Estado">
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>

                        </div>
                    </div>







                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>






@include('footer')
<script src="{{asset('js/modalAsignacion.js')}}"></script>
</body>
</html>
