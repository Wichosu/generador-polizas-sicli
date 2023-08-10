<?php
  use chillerlan\QRCode\QROptions;
  use chillerlan\QRCode\QRCode;
  
  require_once __DIR__ . '/vendor/autoload.php';

  $APE = $_SESSION['id_ape']; 
  $POLIZA = $_SESSION['id_poliza'];

  $server = "localhost";
  $username = "root";
  $password = "Osu!W1ch0";
  $db = "sicli";

  $conn = new mysqli($server, $username, $password, $db);

  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT
    polizas.fecha as fecha,
    polizas.descripcion as descripcion,
    polizas.evidencia as evidencias,
    movimientos.cargo as cargo,
    movimientos.abono as abono,
    movimientos.clave as clave,
    movimientos.nombre as cuenta,
    polizas.numero as numero,
    polizas.tipo_poliza as tipo,
    folios.fecha_hora as fecha_hora,
    folios.folio_interno as folio_interno
    FROM polizas
    INNER JOIN movimientos ON movimientos.id_poliza = polizas.id
    INNER JOIN folios ON folios.id_doc = polizas.id
    WHERE polizas.id_ape = $APE 
    AND polizas.id = $POLIZA
    ";

  /**
   * Notas
   * Buscar Folio con identificador
   * Iterar con el identificador
   * use GET method for varibles
   */

  $result = $conn->query($sql);

  $polizas = $result->fetch_assoc();

  $sql_ape = "SELECT * FROM apes WHERE id = $APE";

  $result_ape = $conn->query($sql_ape);

  $ape = $result_ape->fetch_assoc();

  if(!function_exists('encriptar')) {
    function encriptar($folio) {
      $metodo = "AES-256-CBC";
      $llave = hash('sha256', 'LEON ES EL HIJO MAS BONITO DEL MUNDO');
      $iv = substr(hash('sha256', '07.0216171089'), 0, 16);
  
      $output = openssl_encrypt($folio, $metodo, $llave, 0, $iv);
  
      $output = base64_encode($output);
  
      $resto1 = substr($output, 0, 7);
      $resto2 = substr($output, 7, 5);
      $resto3 = substr($output, 12, 8);
      $resto4 = substr($output, 20, 6);
      $resto5 = substr($output, 26, 6);
  
      $folio_interno = $resto1 . '-' . $resto2 . '-' . $resto3 . '-' . $resto4 . '-' . $resto5;
  
      return $folio_interno;
    }
  }

  $folio_hash = encriptar($polizas['folio_interno']);
  $fecha_hora = $polizas['fecha_hora'];
?>
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
  <div style="border-left: solid 2px #000; border-right: solid 2px #000; text-align: center; padding-top: 0px;  font-size: 20px; font-weight: bold; text-transform: uppercase; padding: 10px;">
    <?php echo $ape['nombre'] ?>
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
    R. F. C.
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
    <?php echo strtoupper($ape['rfc']) ?>
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
    Dirección
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
    Dirección: <?php echo $ape['direccion'] ?> Col. <?php echo $ape['colonia'] ?>, Ciudad: <?php echo $ape['ciudad'] ?>, <?php echo $ape['estado'] ?>. C.P. <?php echo $ape['cp'] ?> 
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
    Correo Electrónico
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
    <?php echo $ape['email'] ?>
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
    Teléfono
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-bottom: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
    <?php echo $ape['telefono'] ?>
  </div>
  <br>
  <div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
    Número de Póliza
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
    <?php echo $polizas['numero'] ?>
  </div>
  <div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
    Tipo de Póliza
  </div>
  <div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
    <?php echo $polizas['tipo'] ?>
  </div>
  <div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
    Descripción de la Póliza
  </div>
<div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
  <?php echo $polizas['descripcion'] ?>
</div>
<div style="text-align: center; margin-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
  Fecha de Operación
</div>
<div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;">
  <?php echo substr($polizas['fecha'], 0, 10) ?>
</div>
<div style="text-align: center; padding-top: 0px; border-top: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; background-color: #ccc; font-size: 14px; font-weight: bold;">
  Evidencias Adjuntadas
</div>
<?php
  foreach(explode(',', $polizas['evidencias']) as $row) {
    echo 
    "
      <div style='text-align: center; padding-top: 0px; border-bottom: solid 2px #000; border-right: solid 2px #000; border-left: solid 2px #000; font-size: 14px;'>$row</div>
    ";
  }
?>
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
      <?php
        $CARGO_SUMA = 0;
        $ABONO_SUMA = 0;

        do{
          $CARGO_SUMA += $polizas['cargo'];
          $ABONO_SUMA += $polizas['abono'];
          
          echo
          "
          <tr>
          ";
          
          if($polizas['cargo'] == 0) {
            $cargo = number_format($polizas['cargo'], 2);
            $abono = number_format($polizas['abono'], 2);

            echo
            "
            <td style='padding-left: 20px;'>{$polizas['clave']}</td>
            <td style='padding-left: 20px;'>{$polizas['cuenta']}</td>
            <td style='text-align: right; padding-right: 2px'>\${$cargo}</td>
            <td style='text-align: right; padding-right: 2px'>\${$abono}</td>
            ";
          } else {
            $cargo = number_format($polizas['cargo'], 2);
            $abono = number_format($polizas['abono'], 2);

            echo
            "
            <td style='padding-right: 20px;'>{$polizas['clave']}</td>
            <td style='padding-right: 20px;'>{$polizas['cuenta']}</td>
            <td style='text-align: right; padding-right: 2px'>\${$cargo}</td>
            <td style='text-align: right; padding-right: 2px'>\${$abono}</td>
            ";
          }
          echo "</tr>";
        }while($polizas = $result->fetch_assoc())
      ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="2" style="text-align:left">SUMAS IGUALES:</th>
      <th style="text-align: right; padding-right: 2px">$<?php echo number_format($CARGO_SUMA, 2)?></th>
      <th style="text-align: right; padding-right: 2px">$<?php echo number_format($ABONO_SUMA, 2)?></th>
    </tr>
  </tfoot>
</table>

<div style="page-break-after:always;"></div>
<div style="width:100%">
  <!--Inicio de generación de sello digital-->
  <div><h1>SELLO DIGITAL GENERADO POR EL SICLI</h1></div>
      <div style="text-align: left;"><strong>REVISADO POR: </strong><?php echo $ape['presidente'] ?></div>
      <div style="text-align: left;"><strong>RFC: </strong><?php echo $ape['rfc'] ?></div>
      <div style="text-align: left;"><strong>FECHA Y HORA DE EMISIÓN: </strong><?php echo $fecha_hora ?></div>
      <div style="text-align: left;"><strong>IDENTIFICADOR ÚNICO DEL EMISOR: </strong><?php echo $ape['identificador']?></div>
      <div style="text-align: left; overflow: hidden;text-overflow: ellipsis;"><strong>SELLO DIGITAL DE LA APE: </strong><?php echo $ape['sello_digital']?></div>
      <div style="text-align: left;"><strong>FOLIO INTERNO: </strong><?php echo $folio_hash ?></div>
      <div colspan="2" style="text-align: left;"><strong>Haz clic en el siguiente link para revisar la integridad de este documento: </strong><br><span style="color: blue;">http://sistemas.oplever.org.mx/sicli/verificador</span></div>
  </div>
<?php 
  $options = new QROptions;
  $options->version = 7;
  $options->imageBased64 = true;

  $data = 'RFC | '.$fecha_hora.' | 000004F75T9MG21 | '.$folio_hash;

  $qr_code = (new QRCode)->render($data);

  echo '<img src="'.$qr_code.'" alt="QR Code" />';
?>
<div class="footer">
  <span class="page-number" style="font-size: 10px;">Página </span>
</div>
</body> 
</html>
