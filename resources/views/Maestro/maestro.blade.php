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
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

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
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar grupo"
                               aria-label="Search" id="barraBusqueda" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Buscar grupo" id="barraBusqueda2" aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


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
                    <h1 class="h3 mb-0 text-gray-800">Grupos</h1>
                    <a id="btnGrupo" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                           <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                                        </span>
                        <span class="text">Crear grupo</span>
                    </a>

                </div>



                <!-- Content Row -->


                <!-- Content Row -->
                <div class="row" id="contenedor">

                    <!-- Content Column -->

                    @foreach($datos as $grupo)
                        @if($grupo->GruposMaestro->Estado==1)
                    <div class="col-lg-4 mb-2 objeto">
                        <!-- Illustrations -->
                        <div class="card shadow mb-4 ">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{$grupo->GruposMaestro->Nombre}} </h6>
                            </div>
                            <div class="card-body">
                                @if(isset($grupo->GruposMaestro->RutaImagen))

                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                             src="{{asset(Storage::url($grupo->GruposMaestro->RutaImagen))}}" alt="">
                                    </div>

                                @else
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                             src="{{asset('img/undraw_posting_photo.svg')}}" alt="foto del grupo">
                                    </div>
                                @endif
                                <p><b>Codigo: </b>  {{$grupo->IdGrupo}}<br>
                                    @if($grupo->conteo>0)
                                        <b>Numero de estudiantes: </b>  {{$grupo->conteo}}<br>
                                    @else
                                        <b>Numero de estudiantes: </b> 0<br>
                                    @endif

                                    @if($grupo->GruposMaestro->Estado==1)
                                    <b>Estado: </b> Activo
                                    @endif
                                    </p>
                                    <div class="dropdown  btn-block">
                                        <button class="btn btn-unan btn-block dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu animated--fade-in"
                                             aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{route('AlumnoListado',['id'=>$grupo->IdGrupo])}}">
                                                <i class="fa-solid fa-eye"></i>
                                                Ver alumnos
                                            </a>
                                            <button onclick="editar('{{$grupo->GruposMaestro->Nombre}}','{{$grupo->IdGrupo}}','{{asset(Storage::url($grupo->GruposMaestro->RutaImagen))}}')"  class="dropdown-item">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                Editar grupo
                                            </button>
                                            <form method="post" action="{{url('/maestro/'.$grupo->IdGrupo)}}" class="form-eliminar">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-trash"></i>
                                                    Eliminar grupo
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
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

<!--Formulario para agregar grupo-->
<div id="ModalGrupo" class="modal fade"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar grupo</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="errores"></div>
                <form method="POST" id="formulario" action="{{route('GrupoSave')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" hidden>
                        <label for="IdGrupo" class="col-form-label">Identificador:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                            <input type="text" class="form-control" id="IdGrupo" name="IdGrupo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NombreGrupo" class="col-form-label">Nombre del Grupo:</label>
                        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-group"></i>
                                </span>
                            <input type="text" class="form-control" required id="NombreGrupo" name="NombreGrupo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fotoGrupo" class="col-form-label">Foto:</label>

                        <div class="rounded mx-auto d-block mb-2">
                            <!-- Imagen con tamaño específico y clase modal-img -->
                            <img id="imgGrupo" src="" alt="Imagen grupo"   class="modal-img">
                        </div>


                        <div class="input-group">
                                <span class="input-group-text">
                                   <i class="fa-solid fa-image"></i>
                                </span>
                            <input type="file" class="form-control" name="fotoGrupo" id="fotoGrupo" accept=".jpg, .jpeg, .png" >
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnGuardar" onclick="guardarGrupo()" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>





@include('footer')
<script src="{{asset('js/modalGrupo.js')}}"></script>


<script>
    $('.form-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro de eliminar este grupo?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {


                this.submit();
            }
        });
    });
    function guardarGrupo(){
        var formData = new FormData($('#formulario')[0]);

        // Realiza la llamada AJAX
        $.ajax({
            type: 'POST',
            url: '{{ route('GrupoSave') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Si la llamada es exitosa, puedes cerrar el modal, mostrar un mensaje, etc.
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: response.success,
                    showConfirmButton: false,
                    timer: 1500
                });
                console.log(response);
                setTimeout(function() {
                    window.location.reload();
                }, 1550);


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
</body>
</html>
