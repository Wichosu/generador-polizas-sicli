<?php
  use Dompdf\Dompdf;
  use Dompdf\Options;
  /**
   * Para el generador por id de ape
   * haz una session y pasa el id de poliza por ahi
   */

  require_once __DIR__ . '/vendor/autoload.php';

  $server = "localhost";
  $username = "root";
  $password = "Osu!W1ch0";
  $db = "sicli";

  $conn = new mysqli($server, $username, $password, $db);

  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    
    $dompdf = new Dompdf($options);
    
    ob_start();
    
    include 'formatopoliza.php';
    
    $htmlContent = ob_get_clean();
    
    $dompdf->loadHtml($htmlContent);
    
    $dompdf->setPaper('A4', 'portrait');
    
    $dompdf->render();

    
    $APE = '6';
    $POLIZA = '564';
    
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
      folios.folio_interno as folio_interno,
      folios.doc as doc
      FROM polizas
      INNER JOIN movimientos ON movimientos.id_poliza = polizas.id
      INNER JOIN folios ON folios.id_doc = polizas.id
      WHERE polizas.id_ape = $APE 
      AND polizas.id = $POLIZA
      ";

    $result = $conn->query($sql);

    $nombre = $result->fetch_assoc();

    $dompdf->stream($nombre['doc']);
?>