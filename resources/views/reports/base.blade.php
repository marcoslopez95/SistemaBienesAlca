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

        @page {
            margin-bottom: 130px;
            margin-top: 190px;
            header: html_myHeader1;
            footer: html_myFooter1;
        }
    </style>
</head>

<body>
    <htmlpagefooter name="myFooter1" style="display:none; ">
        <div style="font-size: 12px" align='center'>
            "UNIDOS POR FERNANDEZ FEO"<br>
            Calle 3 entre carreras 3 y 4 Palacio Municipal,<br>
            El Piñal, Municipio Fernández Feo, Estado Táchira,<br>
            Telf: 0277-2341029. FAX: 0277-23341029<br>
            e-mail: adlcaldiaff18.21@gmail.com / rrhhfernandezfeo@gmail.com
        </div>

    </htmlpagefooter>

    <htmlpageheader name="myHeader1" style="display:none">
        <table>
            <tr>
                <td style="border-bottom: 1px solid black">
                    <img src="public/img/escudo.png" width="150px" height="150px">
                </td>
                <td align="center" style="font-size: 20px;border-bottom: 1px solid black">
                    República Bolivariana de Venezuela <br>
                    Alcaldia del Municipio Fernández Feo<br>
                    Estado Táchira<br>
                    RIF: G-20001459-8
                </td>
                <td align="right" style="border-bottom: 1px solid black">
                    <img src="public/img/lado-dere.jpg" width="150px" height="150px">
                </td>
            </tr>
        </table>
    </htmlpageheader>

    <table align="center">
        @if ($membrete)
            <tr>
                <td style="height: 15px"></td>
            </tr>
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
                <td style="height: 15px"></td>
            </tr>
            <tr>
                <td colspan="7" style="padding: 0 20px; font-size: 18px" align="center">
                    Yo, <b>{{ Auth::user()->full_name }}</b>, con cedula de identidad N°
                    <b>{{ Auth::user()->cedula_usu }}</b>,
                    en mi carácter de <b>Directora de Bienes Muebles</b>, adscrita a la Alcaldía Bolivariana y
                    Socialista del municipio Fernández Feo,
                    hago constar que se hace acto de presencia a la <b>{{ $departamento->nombre_dep }}</b>, representada
                    legalmente
                    por el ciudadano (a), <b>{{ $departamento->director->full_name }}</b>, con cedula de identidad
                    <b>{{ $departamento->director->cedula_dire }}</b>.
                    <br>Para su respectivo INVENTARIO
                </td>
            </tr>
            <tr>
                <td style="height: 15px"></td>
            </tr>
        @endif
        @yield('body')
    </table>
    @if ($membrete)
        <pagebreak>
            <table align="center" style="height: 100%">
                <tbody>
                    <tr>
                        <td style="height: 150px"></td>
                    </tr>
                    <tr>
                        <td></td>

                        <td style="border-top: 1px solid black;" align="center">

                            {{ Auth::user()->full_name }}<br>
                            {{ Auth::user()->cedula_usu }}<br>
                            Directora de Bienes
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="border-top: 1px solid black;" align="center">
                            {{ $departamento->director->full_name }}<br>
                            {{ $departamento->director->cedula_dire }}<br>
                            Director de {{ $departamento->nombre_dep }}
                        </td>
                        <td></td>

                    </tr>
                    <tr>
                        <td style="height: 25px" colspan="8"></td>
                    </tr>
                    <tr>
                        <td style="height: 25px" colspan="8">OBSERVACIONES</td>
                    </tr>
                    @for ($i = 0; $i < 15; $i++)
                        <tr>
                            <td colspan="8" style="height: 25px;border-bottom: 1px solid black">

                            </td>
                        </tr>
                    @endfor
                </tbody>
                {{-- <tfoot> --}}
                {{-- <tr>
                <td >
                    "UNIDOS POR FERNANDEZ FEO"<br>
                    Calle 3 entre carreras 3 y 4 Palacio Municipal,<br>
                    El Piñal, Municipio Fernández Feo, Estado Táchira,<br>
                    Telf: 0277-2341029. FAX:  0277-23341029<br>
                    e-mail: adlcaldiaff18.21@gmail.com / rrhhfernandezfeo@gmail.com
                </td>
            </tr> --}}
                {{-- </tfoot> --}}
            </table>
    @endif
</body>

</html>
