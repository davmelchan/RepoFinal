<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Categoría supervisión</title>

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
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <div class="sidebar-heading">
            Usuarios
        </div>
        <li class="nav-item ">
            <a class="nav-link" href="{{url('administrador')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Agregar maestro</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{url('estudiante')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Agregar estudiante</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Evaluaciones
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('unidades')}}">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Unidades</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('categoriaEvaluacion')}}">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Categorías evaluación</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{url('categoriaSupervision')}}">
                <i class="fas fa-fw fa-list"></i>
                <span>Categorías de supervisión</span></a>
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
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Catalogos
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('empresa')}}">
                <i class="fas fa-fw fa-building"></i>
                <span>Centro de prácticas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('genero')}}">
                <i class="fas fa-fw fa-venus-mars"></i>
                <span>Género</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('rol')}}">
                <i class="fas fa-fw fa-user"></i>
                <span>Rol</span></a>
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
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
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
                <h1 class="h3 mb-2 text-center text-gray-800">Categorías de supervisión de las prácticas de formación profesional
                </h1>

                <button id="btnValoracion" class="btn btn-primary btn-icon-split my-3">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-list"></i>
                        </span>
                    <span class="text">Agregar categoría de supervisión</span>
                </button>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Categorías de supervisíon</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive table-bordered nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>Nombre</th>
                                <th>Id</th>

                                <th>Estado</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($supervisiones as $supervision)
                                @if($supervision->Estado==1)
                                    <tr>

                                        <td class="text-center">
                                            <button id="btnEditar" onclick="editar({{$supervision}})" class="btn btn-unan btn-circle">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>


                                            <button onclick="eliminar('{{$supervision->IdCatSupervision }}')" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                        <td>{{$supervision->Nombre}}</td>
                                        <td>{{$supervision->IdCatSupervision}}</td>

                                        @if($supervision->Estado==1)
                                            <td>Activo</td>
                                        @else
                                            <td>No Activo</td>
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



<!--Formulario para agregar valoracion-->

<div id="ModalValoracion" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar categoría de supervisión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario" method="POST">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="IdValoracion" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdValoracion" name="IdValoracion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NombreValoracion" class="col-form-label">Nombre categoría de supervisión:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-fw fa-list"></i>
                                </span>
                            <input type="text" class="form-control" id="NombreValoracion" name="NombreValoracion">
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnGuardar" form="formulario"  class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


@include('Administrador/footer')
<script src="{{asset('js/modalValoracion.js')}}"></script>

<script>





    function eliminar(id){

        Swal.fire({
            title: '¿Estás seguro de eliminar esta categoría de supervisión?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar el formulario de eliminación

                $.ajax({
                    type: 'DELETE',
                    url: '{{route("supervision.destroy",":id")}}'.replace(':id',id),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.success,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1550);

                    },
                    error: function(errores) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: errores.error,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });










            }
        });




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


</body>
</html>
