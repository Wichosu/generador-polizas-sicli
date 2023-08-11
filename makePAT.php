<?php
  use Dompdf\Options;
  use Dompdf\Dompdf;

  require_once __DIR__ . '/vendor/autoload.php';

  include "db_connection.php";
  include "./helpers/encriptar.php";

  session_start();

  $id_ape = '5';
  $folio_interno = '83421824';
  $id_pat = '10';

  $_SESSION['folio_encriptado'] = encriptar($folio_interno);

  $sql_data_ape = "SELECT
    sello_digital,
    identificador,
    sufijo,
    rfc,
    presidente,
    nombre,
    mision,
    vision
    FROM apes
    WHERE id = '$id_ape'
  ";

  $result_sql_data_ape = $conn->query($sql_data_ape);

  $_SESSION['datos_ape'] = $datos_ape = $result_sql_data_ape->fetch_assoc();

//  error_log(json_encode($datos_ape));
//  datos ape recolectados
  $sql_data_folio = "SELECT
    fecha_hora,
    doc
    FROM folios
    WHERE folio_interno = '$folio_interno' 
  ";

  $_SESSION['folio'] = $folio = $conn->query($sql_data_folio)->fetch_assoc();

  $sql_datos_pat = "SELECT
    id,
    nombre,
    objetivos,
    justificacion,
    metas
    FROM datospats
    WHERE id = '$id_pat'
  ";

  $_SESSION['datos_pat'] = $datos_pat = $conn->query($sql_datos_pat)->fetch_assoc();

  $sql_lineas = "SELECT
    lineas.id as linea_id,
    lineas.linea as linea,
    lineas.monto as monto,
    lineas.rubro as rubro,
    lineas.inicio as inicioLinea,
    lineas.final as finalLinea,
    eventolineas.encargado as encargado
    FROM lineas
    LEFT JOIN eventolineas ON lineas.id = eventolineas.id_linea
    WHERE lineas.id_pat = '$id_pat'
    ORDER BY 'lineas.inicio' ASC
  ";

  $result_sql_lineas = $conn->query($sql_lineas);

  $array_lineas = [];

  while($linea = $result_sql_lineas->fetch_assoc()) {
    array_push($array_lineas, $linea);
  }

  $_SESSION['array_lineas'] = $array_lineas;

  $array_eventos = [];

  foreach($array_lineas as $linea) {
    $id_linea = $linea['linea_id'];

    $sql_eventos = "SELECT 
      *
      FROM eventolineas
      WHERE id_linea = '$id_linea'
      ORDER BY inicio ASC
    ";

    $evento = $conn->query($sql_eventos)->fetch_assoc();
    
    if($evento != null) {
      array_push($array_eventos, $evento);
    }
  }

  $_SESSION['array_eventos'] = $array_eventos;

  ob_start();

  include "patformat.php";

  $htmlContent = ob_get_clean();

  //Options for Dompdf
  $options = new Options();
  $options->set('isHtml5ParserEnabled', true);

  //Dompdf configuration
  $dompdf = new Dompdf();
  $dompdf->loadHtml($htmlContent);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();

  $dompdf->stream($folio['doc']);