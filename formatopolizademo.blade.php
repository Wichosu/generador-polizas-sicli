<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>FORMATO PÓLIZA | SICLI | OPLE VERACRUZ</title> 
</head>
<style type="text/css">
	body{font-family: 'Didact Gothic', sans-serif;padding-top: 25px;}
  table, th, td, tr {
    border: 2px solid black;
    border-collapse: collapse;
    border-spacing: 0;
  }
  th {
    padding: 8px;
    text-align: center;
    background-color: #ccc;
    font-size: 14px;
  }
  td {
    text-align: center;
    font-size: 14px;
  }

  .rotate {
    /* FF3.5+ */
    -moz-transform: rotate(-90.0deg);
    /* Opera 10.5 */
    -o-transform: rotate(-90.0deg);
    /* Saf3.1+, Chrome */
    -webkit-transform: rotate(-90.0deg);
    /* Standard */
    transform: rotate(-90.0deg);
  }

  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: right;
  }

  .page-number:after { content: counter(page); }
</style>
<body>
  <div style="border-left: solid 2px #000;  border-top: solid 2px #000; border-right: solid 2px #000; text-align: center; padding-top: 0px;  font-size: 20px; font-weight: bold;"></div>
  <div style="border-left: solid 2px #000; border-right: solid 2px #000; text-align: center; padding-top: 0px;  font-size: 20px; font-weight: bold; text-transform: uppercase; padding: 10px;">{{ $ape->nombre }}</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">R. F. C.</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ strtoupper($ape->rfc)}}</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Dirección</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">Dirección: {{ $ape->direccion }} Col. {{ $ape->colonia }}, Ciudad: {{ $ape->ciudad }}, {{ $ape->estado }}. C.P. {{ $ape->cp }}</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Correo Electrónico</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ $ape->email }}</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Teléfono</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-bottom: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ $ape->telefono }}</div>
  <br>
  <div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Número de Póliza</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ $polizas[0]->numero }}</div>
  <div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Tipo de Póliza</div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ $polizas[0]->tipo }}</div>
  <div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Descripción de la Póliza</div>
<div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ $polizas[0]->descripcion }}</div>
<div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Fecha de Operación</div>
<div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ Date::parse($polizas[0]->fecha)->format('d/m/Y') }}</div>
<div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">Evidencias Adjuntadas</div>
@foreach(explode(',',$polizas[0]->evidencias) as $row)
  <div style="text-align: center; padding-top: 0px; border-bottom: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">{{ $row }}</div>
@endforeach
  <table style="width: 100%; padding-top: 0px;" border="0" cellpadding="0" cellspacing="0">
    <thead>
      <tr>      
        <th style="width: 25%">CUENTA</th>
        <th style="width: 45%">NOMBRE</th>
        <th style="width: 15%">DEBE</th>
        <th style="width: 15%">HABER</th>
      </tr>
    </thead>
    <tbody>
     @foreach($polizas as $poliza)
     <tr>
      @if($poliza->cargo == 0)
        <td style="padding-left: 20px;">{{ $poliza->clave }}</td>
        <td style="padding-left: 20px;">{{ $poliza->cuenta }}</td>
        <td style="text-align: right; padding-right: 2px">{{ '$'.number_format($poliza->cargo, 2) }}</td>
        <td style="text-align: right; padding-right: 2px">{{ '$'.number_format($poliza->abono, 2) }}</td>
      @else
        <td style="padding-right: 20px;">{{ $poliza->clave }}</td>
        <td style="padding-right: 20px;">{{ $poliza->cuenta }}</td>
        <td style="text-align: right; padding-right: 2px">{{ '$'.number_format($poliza->cargo, 2) }}</td>
        <td style="text-align: right; padding-right: 2px">{{ '$'.number_format($poliza->abono, 2) }}</td>
      @endif
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th colspan="2" style="text-align:left">SUMAS IGUALES:</th>
      <th style="text-align: right; padding-right: 2px">{{'$'.number_format($polizas->sum('cargo'),2)}}</th>
      <th style="text-align: right; padding-right: 2px">{{'$'.number_format($polizas->sum('abono'),2)}}</th>
    </tr>
  </tfoot>
</table>

<div style="page-break-after:always;"></div>
<div style="width:100%">
  <!--Inicio de generación de sello digital-->
  <div><h1>SELLO DIGITAL GENERADO POR EL SICLI</h1></div>
      <div style="text-align: left;"><strong>REVISADO POR: </strong> {{$presidente}}</div>
      <div style="text-align: left;"><strong>RFC: </strong> {{$rfc}}</div>
      <div style="text-align: left;"><strong>FECHA Y HORA DE EMISIÓN: </strong> {{ $dataHora }}</div>
      <div style="text-align: left;"><strong>IDENTIFICADOR ÚNICO DEL EMISOR: </strong> {{ $identificador }}</div>
      <div style="text-align: left; overflow: hidden;text-overflow: ellipsis;"><strong>SELLO DIGITAL DE LA APE: </strong> {{ $selloDigital }}</div>
      <div style="text-align: left;"><strong>FOLIO INTERNO: </strong>{{$rest1.'-'.$rest2.'-'.$rest3.'-'.$rest4.'-'.$rest5}}</div>
      <div colspan="2" style="text-align: left;"><strong>Haz clic en el siguiente link para revisar la integridad de este documento: </strong><br><span style="color: blue;">http://sistemas.oplever.org.mx/sicli/verificador</span></div>
  </div>
<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->errorCorrection('H')->generate('RFC | '.$dataHora.' | 000004F75T9MG21 | '.$rest1.'-'.$rest2.'-'.$rest3.'-'.$rest4.'-'.$rest5)) !!} " width="150">
<div class="footer">
  <span class="page-number" style="font-size: 10px;">Página </span>
</div>
</body> 
</html>

