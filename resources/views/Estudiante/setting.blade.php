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
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">





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


        <!-- Nav Item - Pages Collapse Menu -->
        @foreach($secciones as $seccion)
            <!-- Nav Item - Pages Collapse Menu -->
            @if(Route::currentRouteName() == $seccion->permisos->Ruta )
            <li class="nav-item active">
                <a class="nav-link" href="{{route($seccion->permisos->Ruta)}}">
                    <i class="{{$seccion->Icono}}"></i>
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
                            <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
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
                <div class="row">
                <!-- Profile picture card-->
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Foto de perfil</div>
                            <div class="card-body ">
                                <div class="text-center">
                                <!-- Profile picture image-->
                                    @if(empty($resultado->rutaImagen))
                                    <a href="#" id="seleccionarImagen">
                                        <img id="imagenActual" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('img/undraw_profile.svg')}}">

                                    </a>
                                    @else
                                        <a href="#" id="seleccionarImagen">
                                            <img  id="imagenActual" class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset($resultado->rutaImagen)}}">

                                        </a>
                                    @endif

                                    <input type="file" id="inputImagen" style="display: none;">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no mayor a 5 MB</div>
                                <!-- Profile picture upload button-->

                                <button onclick="subirImagen('{{route('GuardarImg',":id")}}','{{$resultado->Identificacion}}')" class="btn btn-primary" type="button">Subir foto de perfil</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Información del usuario</div>
                        <div class="card-body">
                            <form>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">Nombres</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Ingrese sus nombres" value="{{$resultado->Nombres}}">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Apellidos</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Ingrese sus apellidos" value="{{$resultado->Apellidos}}">
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Empresa</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="" readonly value="{{$resultado->Empresa->Nombre}}">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputTelefono">Teléfono</label>
                                        <input class="form-control" id="inputTelefono" type="text" placeholder="ingrese numero de teléfono" value="{{$resultado->Telefono}}">
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Dirección</label>
                                    <textarea class="form-control" style="resize: none;" required id="Dirección" onresize="false" name="Dirección" cols="30" rows="10">{{$resultado->Direccion}}</textarea>

                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Identificación</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" readonly placeholder="Enter your email address" value="{{$resultado->Identificacion}}">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputBirthday">Género</label>
                                        <input class="form-control" id="inputBirthday" type="text" name="birthday" readonly placeholder="Enter your birthday" value="{{$resultado->Genero->Nombre}}">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="button">Save changes</button>
                            </form>
                        </div>
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
@include('footer')


<script>
    document.getElementById('seleccionarImagen').addEventListener('click', function () {
        document.getElementById('inputImagen').click();

    });

    document.getElementById('inputImagen').addEventListener('change', function () {
        var inputImagen = document.getElementById('inputImagen');
        var imagenActual = document.getElementById('imagenActual');

        if (inputImagen.files && inputImagen.files[0]) {
            var lectorImagen = new FileReader();

            lectorImagen.onload = function (e) {
                imagenActual.src = e.target.result;
            };

            lectorImagen.readAsDataURL(inputImagen.files[0]);
        }
    });



    function subirImagen(ruta,id) {
        var inputImagen = document.getElementById('inputImagen');
        var imagen = inputImagen.files[0];

        if (imagen) {
            var formData = new FormData();
            formData.append('imagen', imagen);

            $.ajax({
                type: 'POST',
                url: ruta.replace(':id',id),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Si la llamada es exitosa, puedes cerrar el modal, mostrar un mensaje, etc.

                    console.log(response.success);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    });

                 /*   setTimeout(function() {
                        window.location.reload();
                    }, 1550);
*/

                },
                error: function(xhr) {
                    console.log(xhr);
                    Swal.fire(
                        'Error',
                        xhr.responseJSON.errors,
                        'error'
                    )


                }
            })


        } else {
            alert('Selecciona una imagen antes de subirla.');
        }
    }
</script>




</body>
</html>
