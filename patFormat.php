<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>PROGRAMA ANUAL DE TRABAJO | SICLI | OPLE VERACRUZ</title> 
</head>
<style type="text/css">
  body{font-family: 'Didact Gothic', sans-serif;padding-top: 25px;}
  table, th, td, tr {
    border-collapse: collapse !important;
    border: 1px solid #000;
  }
  th {
    text-align: center;
    font-size: 14px;
    padding: 16px;
    background-color: #ccc;
  }
  td {
    text-align: center;
    font-size: 12px;
    padding: 16px;
  }
  .right {
    border-right:1px solid #000;
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
  <div style="border-left: 1px solid #000;  border-top: 1px solid #000; border-right: 1px solid #000; text-align: center; padding-top: 0px;  font-size: 20px; font-weight: bold;"></div>
  <div style="border-left: 1px solid #000; border-right: 1px solid #000; text-align: right; padding-right: 2px;"><strong>FORMATO: PAT</strong></div>
  <div style="border-left: 1px solid #000; border-right: 1px solid #000; text-align: center; padding-top: 0px;  font-size: 20px; font-weight: bold;">PROGRAMA ANUAL DE TRABAJO</div>
  <div style="border-left: 1px solid #000; border-right: 1px solid #000; text-align: right; padding-right: 2px;"><strong>EJERCICIO: <?php echo date("Y") ?></strong></div>  
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">NOMBRE DE LA ASOCIACIÓN POLÍTICA ESTATAL</div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;">
    <?php echo $pat_file->ape->nombre ?>
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">NOMBRE DEL PROGRAMA</div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;">
    <?php echo $pat_file->pat->nombre ?>
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">MISIÓN</div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;">
    <?php echo $pat_file->ape->mision ?>
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">VISIÓN</div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;">
    <?php echo $pat_file->ape->vision ?>
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">OBJETIVOS</div>
  <?php
    foreach(explode('@', $pat_file->pat->objetivos) as $objetivo) {
      echo
      "
        <div style='text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;'>
          $objetivo 
        </div>
      ";
    }
  ?>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">METAS</div>
  <div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;">
    <?php echo $pat_file->pat->metas ?>
  </div>
<table style="width: 100%;">
<thead>
  <tr>
    <th rowspan="2" style="width: 20%">LÍNEAS DE ACCIÓN</th>
    <th colspan="2" style="width: 20%">PERIODO</th>
    <th rowspan="2" style="width: 20%">MONTO</th>
    <th rowspan="2" style="width: 20%">PRESUPUESTO</th>
  </tr>
  <tr>
    <th style="word-break: break-all;width: 20%">Inicio</th>
    <th style="word-break: break-all;width: 20%">Fin</th>
  </tr>
</thead>
  <?php
    foreach($pat_file->lines as $linea) {
      $inicio_linea_format = date('d/m/Y', strtotime($linea['inicioLinea']));
      $final_linea_format = date('d/m/Y', strtotime($linea['finalLinea']));
      $monto = number_format($linea['monto'], 2);

      echo 
      "
        <tr>
          <td style='width: 20% !important'>{$linea['linea']}</td>
          <td style='width: 20% !important'>$inicio_linea_format<br>
          <td style='width: 20% !important'>$final_linea_format<br></td>
          <td style='width: 20% !important'>\$$monto</td>
          <td style='width: 20% !important'>{$linea['rubro']}</td>
        </tr>
      ";
    }
  ?>
</table>
<div style="text-align: center; padding-top: 0px; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">CRONOGRAMA DE EJECUCIÓN DEL PROGRAMA (ANEXO A)</div>
<div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;">&nbsp;</div>
<div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">JUSTIFICACIÓN</div>
<div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px;">
  <?php echo $pat_file->pat->justificacion ?>
</div>
<div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; background-color: #ccc; font-size: 14px; font-weight: bold;">NOMBRE Y FIRMA DEL PRESIDENTE DE LA ASOCIACIÓN POLÍTICA</div>
<div style="text-align: center; padding-top: 0px; border-top: 1px solid #000; border-bottom: 1px solid #000; border-right: 1px solid #000; border-left: 1px solid #000; font-size: 14px; height: 100px;">FIRMA</div>
<div class="footer">
  <span class="page-number" style="font-size: 10px;">Página </span>
</div>
<div style="page-break-after:always;"></div>
<div style="text-align: center; padding-top: 0px;  font-size: 16px;">CRONOGRAMA DEL PROGRAMA ANUAL DE TRABAJO "Anexo A"</div>
<div style="text-align: center; padding-top: 0px;  font-size: 14px; font-weight: bold;">
  <?php echo $pat_file->ape->nombre ?>
</div>
<div style="text-align: right; padding-right: 2px; font-size: 14px;">EJERCICIO: <strong><?php echo date("Y") ?></strong></div>
<table style="width: 100%;">
<thead>
  <tr>
    <th rowspan="2" style="width: 20%">LÍNEAS DE ACCIÓN</th>
    <th colspan="2" style="width: 20%">PERIODO</th>
    <th rowspan="2" style="width: 20%">RESPONSABLE DEL SEGUIMIENTO</th>
  </tr>
  <tr>
    <th style="word-break: break-all;width: 20%">Inicio</th>
    <th style="word-break: break-all;width: 20%">Fin</th>
  </tr>
</thead>
  <?php
    foreach($pat_file->lines as $linea) {
      $inicio_linea = date('d/m/Y', strtotime($linea['inicioLinea']));
      $final_linea = date('d/m/Y', strtotime($linea['finalLinea']));

      echo
      "
        <tr>
          <td style='width: 20% !important'>{$linea['linea']}</td>
          <td style='width: 20% !important'>$inicio_linea</td>
          <td style='width: 20% !important'>$final_linea</td>
          <td style='width: 20% !important'>{$linea['encargado']}</td>
        </tr>
      ";
    }
  ?>
</table>
<br>
<br>
<hr size="3" style="width: 70%">
<div style="text-align: center; padding-top: 0px; font-size: 12px;">NOMBRE Y FIRMA DEL PRESIDENTE DE LA ASOCIACIÓN POLÍTICA</div>
<div style="text-align: center; padding-top: 0px; font-size: 12px; font-weight: bold;">
  <?php echo $pat_file->ape->presidente ?>
</div>
<div style="page-break-after:always;"></div>
<div style="width:100%">
  <!--Inicio del sello digital-->
  <div><h1>SELLO DIGITAL GENERADO POR EL SICLI</h1></div>
      <div style="text-align: left;"><strong>REVISADO POR: </strong><?php echo $pat_file->ape->presidente ?></div>
      <div style="text-align: left;"><strong>RFC: </strong><?php echo $pat_file->ape->rfc ?></div>
      <div style="text-align: left;"><strong>FECHA Y HORA DE EMISIÓN: </strong><?php echo $pat_file->folio->fecha_hora ?></div>
      <div style="text-align: left;"><strong>IDENTIFICADOR ÚNICO DEL EMISOR: </strong><?php echo $pat_file->ape->identificador ?></div>
      <div style="text-align: left; overflow: hidden;text-overflow: ellipsis;"><strong>SELLO DIGITAL DE LA APE: </strong><?php echo $pat_file->ape->sello_digital ?></div>
      <div style="text-align: left;"><strong>FOLIO INTERNO: </strong><?php echo $pat_file->getEncriptedFolio() ?></div>
      <div colspan="2" style="text-align: left;"><strong>Haz clic en el siguiente link para revisar la integridad de este documento: </strong><br><span style="color: blue;">http://sistemas.oplever.org.mx/sicli/verificador</span></div>
  </div>
<?php 
  echo '<img src="'.$pat_file->getQrCode().'" alt="QR Code" />';
?>
<div class="footer">
  <span class="page-number" style="font-size: 10px;">Página </span>
</div>
</body>
</html>