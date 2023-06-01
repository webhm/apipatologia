<!DOCTYPE html>
<html>
<head>
    <title>Informe - Servicio de Patologia</title>
</head>
<body>
{{--    <img style="float: right;" src="{{ asset('img/logo.png') }}">
    <h5 style="float: right;margin-top: 0;margin-right: 10px;">SERVICIO DE PATOLOGíA</h5>
    <div style="width:100%;float: right;">  </div>
    <div style="width:100%;float: right;">  </div>--}}

    <h3 style="text-align: center">ANATOMÍA PATOLÓGICA </h3>

    <table>
        <tr>
            <td>
                <label style="width: 100px; font-weight: bold;"> Nombre :</label>  <bold style="">NOMBRE Y APELLIDOS PACIENTE</bold> <br>
                <label style="width: 100px; font-weight: bold;"> Historia C :</label>  <bold style="">{!! $data->nohistoriaclinicamv !!}</bold> <br>
                <label style="width: 100px; font-weight: bold;"> Edad :</label>  <bold style=""></bold> <br>
                <label style="width: 100px; font-weight: bold;"> Cédula :</label>  <bold style=""></bold> <br>
                <label style="width: 100px; font-weight: bold;"> Instruccion :</label>  <bold style="">OTROS</bold> <br>
            </td>
            <td>
                <label style="width: 100px; font-weight: bold;"> Servicio :</label>  <bold style="">NOMBRE SERVICIO</bold> <br>
                <label style="width: 100px; font-weight: bold;"> Habitacion :</label>  <bold style=""></bold> <br>
                <label style="width: 100px; font-weight: bold;"> Plan :</label>  <bold style=""></bold> <br>
                <label style="width: 100px; font-weight: bold;"> Fecha Pedido :</label>  <bold style="">{!! $data->fechadocumento !!}</bold> <br>
                <label style="width: 100px; font-weight: bold;"> Pedido No :</label>  <bold style="">{!! $data->nopedidomv !!}</bold> <br>
            </td>
        </tr>
    </table>
    <div >


    </div>

    <div >



    </div>

    <div style="width: 99%; float: left">
        <label> MEDICO (S) SOLICITANTE (S) </label>
        <br>
        <label style="">{!! $data->medicosolicitante !!}</label>
{{--        {!! $data !!}--}}
    </div>
    <div style="width: 99%; float: left">
        <label> INFORMACION CLINICA </label>
        <br>
        <label style="">{!! $data->informacionclinica !!}</label>
    </div>
    <div style="width: 99%; float: left">
        <label> MUESTRAS ENVIADAS </label>
        <br>
        <label style="">{!! $data->informacionclinica !!}</label>
    </div>
    <div style="width: 99%; float: left">
        <label> MACROSCOPICO</label>
        <br>
        <label style="">MACROSCOPICO</label>
    </div>
    <div style="width: 99%; float: left">
        <label> DIAGNOSTICO</label>
        <br>
        <label style="">DIAGNOSTICO</label>
    </div>

{{--    {!! $data !!}--}}
<br>

</body>
</html>
