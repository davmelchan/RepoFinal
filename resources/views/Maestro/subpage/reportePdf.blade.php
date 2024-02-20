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
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,400;1,700&display=swap');

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
        <p class="text-right mb-0">CENTRO UNIVERSITARIO REGIONAL</p>
        <p class="text-right mt-0">{{$infoReporte->Departamento}}</p>


    </div>
</div>
</header>
<div style="color: black" class="row mt-3 ml-5 mr-5">
    <p class="text-right">{{$fechaCompleta}}</p>

</div>
<div style="color: black" class="row mt-3 ml-5 mr-5">
    <p class="text-left mb-0"><strong>{{$nomProf}}</strong></p>
    <p class="text-left mb-0">{{$especialidad}}</p>
    <p class="text-left">UNAN-CUR Carazo</p>

</div>
<div style="color: black" class="row mt-5 ml-5 mr-5">
    <p class="text-left mb-0">Reciba mis más cordiales saludos.</p>


</div>
<div style="color: black" class="row mt-3 ml-5 mr-5">
    <p class="text-justify mb-0">Por este medio presento a <strong>{{$consulta->Nombres}} {{$consulta->Apellidos}}</strong> con carnet
        <strong>{{$consulta->Identificacion}}</strong>, quien es estudiante activo del V año de la carrera de ingles
    de nuestra facultad, y quien ha finalizado sus Prácticas de formación Profesional en el centro de prácticas
    <strong>{{strtolower($consulta->Empresa->Nombre)}}</strong> donde realizo sus prácticas en el área de <strong>{{strtolower($infoReporte->Area)}}</strong>
    desempeñandose en funcion de <strong>{{strtolower($infoReporte->RolAsignado)}}</strong> cumpliendo sus asignaciones en un total
        de {{$infoReporte->HorasPracticas}} horas, mismas que fueron desarrolladas en un horario de <strong>{{strtolower($infoReporte->HoraEntrada)}}</strong> a <strong>{{strtolower($infoReporte->HoraSalida)}}</strong>
    obteniendo una valoración de <strong>{{$empreEv->Nota}}%</strong> en conformidad del cumplimiento de sus asignaciones, realizada por el responsable del centro de práctica
        <strong>{{$consulta->Empresa->Responsable}}</strong> de igual manera se obtuvieron los siguientes parametros:</p>

</div>
<div style="color: black" class="row mt-2 ml-5 mr-5">
    <ul>
        <li>
            Supervisiones realizadas: {{$conteoSupervision}}
        </li>
        <li>
            Evidencias guardadas: {{$conteoEvidencias}}
        </li>
        <li>
            Evaluaciones asignadas: {{$conteoNotas}}
        </li>
    </ul>

</div>
<div style="color: black" class="row mt-2 ml-5 mr-5">
    <p class="text-left mb-3"><strong>OBSERVACIÓN: </strong></p>
</div>

<div style="color:black" class="row mt-3 ml-5 mr-5">
    <p class="text-justify mb-0 ">
        {{$infoReporte->Observacion}}.
    </p>

</div>
<div style="color: black" class="row mt-4 ml-5 mr-5">
    <p class="text-center mb-0">__________________________</p>
    <p class="text-center mb-0"><strong>{{$infoReporte->Coordinador}}</strong></p>
    <p class="text-center mb-0">Coordinador(a) de la carrera de ingles</p>
</div>
<footer class="mt-4">

    <p class="text-center" style="color: #1a2040;   font-size: 20px;  font-family: 'Roboto', sans-serif; font-weight: bold ">¡A la libertad por la Universidad!</p>
</footer>
@include('footer')
</body>


</html>
