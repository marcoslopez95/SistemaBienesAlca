<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <table align="center">
        <thead>
            <tr>
                <td colspan="2" style="border-bottom: 1px solid black">
                    <img src="/img/escudo.png" width="150px" height="150px">
                </td>
                <td align="center" colspan="3" style="font-size: 20px;border-bottom: 1px solid black">
                    República Bolivariana de Venezuela <br>
                    Alcaldia del Municipio Fernández Feo<br>
                    Estado Táchira<br>
                    RIF: G-20001459-8
                </td>
                <td align="right" colspan="2" colspan="2" style="border-bottom: 1px solid black">
                    <img src="/img/lado-dere.jpg" width="150px" height="150px">
                </td>
            </tr>

        </thead>
        @if ($membrete)
            <tr>
                <td>
                    <span style="float: left">N° ______</span>
                </td>
                <td colspan="5" style="display: flex">
                </td>
                <td align="right">
                    <span style="float: right">Fecha ____________</span>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    Yo, <b>{{auth()->user()->full_name}}</b>, con cedula de identidad N° <b>{{auht()->user()->cedula_usu}}</b>,
                    en mi carácter de <b>Directora de Bienes Muebles</b>, adscrita a la Alcaldía Bolivariana y Socialista del municipio Fernández Feo,
                    hago constar que se hace acto de presencia a la <b>{{$departamento->nombre_dep}}</b>, representada legalmente
                    por el ciudadano (a), <b>{{$departamento->director->full_name}}</b>, con cedula de identidad <b>{{$departamento->director->cedula_dire}}</b>.
                    Para su respectivo INVENTARIO
                </td>
            </tr>
        @endif
        @yield('body')

    </table>
</body>

</html>
