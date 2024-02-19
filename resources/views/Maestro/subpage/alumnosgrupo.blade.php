<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listado alumnos</title>

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
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

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


        <!-- Nav Item - Pages Collapse Menu -->
        @foreach($secciones as $seccion)
            @if( $seccion->permisos->Id == 9)
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

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-center text-gray-800">Alumnos del grupo {{$resultado->Nombre}}</h1>



                <!-- DataTales Example -->
                <div class="card shadow mb-4 mt-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de alumnos</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="example" class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Género</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Empresa</th>
                                    <th>Descripción</th>
                                    <th>Responsable</th>
                                    <th>Teléfono responsable</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($alumnos as $alumno)
                                    <tr>
                                        <th>{{$alumno->Identificacion}}</th>
                                        <th>{{$alumno->Nombres}}</th>
                                        <th>{{$alumno->Apellidos}}</th>
                                        <th>{{$alumno->Genero->Nombre}}</th>
                                        <th>
                                            <a href="whatsapp://send?phone={{$alumno->Telefono}}&text=Saludos%20{{$alumno->Nombres}}%20{{$alumno->Apellidos}}%20Soy%20{{session('datos')->first()->infoUser->Nombres}}%20{{session('datos')->first()->infoUser->Apellidos}}%20estare%20a%20cargo%20de%20la%20asignatura%20de%20prácticas%20de%20formación%20profesional%20¿Quisiera%20saber%20cual%20es%20tú%20progreso%20en%20el%20centro%20de%20prácticas%20?%20">
                                                {{$alumno->Telefono}}
                                            </a>
                                        </th>






                                        <th>{{$alumno->Direccion}}</th>

                                        @if(empty($alumno->Empresa->Nombre))
                                            <th>No disponible</th>
                                        @else
                                            <th>{{$alumno->Empresa->Nombre}}</th>
                                        @endif

                                        @if(empty($alumno->Empresa->Descripcion))
                                            <th>No disponible</th>
                                        @else
                                            <th>{{$alumno->Empresa->Descripcion}}</th>
                                        @endif

                                        @if(empty($alumno->Empresa->Responsable))
                                            <th>No disponible</th>
                                        @else
                                            <th>{{$alumno->Empresa->Responsable}}</th>
                                        @endif

                                        @if(empty($alumno->Empresa->TelResponsable))
                                            <th>No disponible</th>
                                        @else
                                            <th>
                                                <a href="whatsapp://send?phone={{$alumno->Empresa->TelResponsable}}&text=Hola%20me%20llamo%20{{session('datos')->first()->infoUser->Nombres}}%20{{session('datos')->first()->infoUser->Apellidos}}%20te%20envío%20este%20mensaje%20porque%20soy%20profesor%20de%20prácticas%20de%20formación%20profesional%20de%20la%20universidad%20UNAN-FAREM%20Carazo%20y%20quisiera%20saber%20¿cómo%20va%20el%20progreso%20del%20estudiante%20{{$alumno->Nombres}}%20{{$alumno->Apellidos}}">
                                                    {{$alumno->Empresa->TelResponsable}}
                                                </a>

                                            </th>
                                        @endif



                                    </tr>
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
<script>

    var tabla;
    $(document).ready(function()
        {



            tabla =  $('#example').dataTable({
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



    $(window).resize(function () {
        // Destruir DataTables
        tabla.destroy();

        // Volver a inicializar DataTables
        tabla = $('.table').DataTable({
            responsive: true,
            // Otras opciones...
        });
    });





</script>


</body>
</html>
