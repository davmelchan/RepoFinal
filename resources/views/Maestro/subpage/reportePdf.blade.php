<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portafolio</title>

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,400;1,700&display=swap')

        /* Estilos para la imagen */
        .imagen-container {
            position: absolute;
            top: -5px;
            left: -30px;

        }

        /* Estilos para el texto */
        .texto-container {
            position: absolute;
            top: -7px;
            left: 300px;
            color: #25325a;
            font-weight: bold;
            font-size: 13px;
            font-family: 'Roboto', sans-serif;
            line-height: 1.3;
            width: 60%;

        }

    </style>
</head>
<body>
<header>
<div class="position-relative" style=" height:10%; width: 100%;" >
    <img src="{{asset('img/logoReporteunan.png')}}" class="imagen-container" width="33%" alt="Logotipo UNAN" >
    <div class="texto-container">
        <p class="text-right">FACULTAD REGIONAL MULTIDISPLINARIA DE CARAZO   DEPARTAMENTO DE CIENCIAS DE LA EDUCACIÓN</p>

    </div>
</div>
</header>
<div class="row mt-5">
    <p>{{$fechaLarga}}</p>

</div>

<footer>

</footer>
@include('footer')
</body>


</html>
