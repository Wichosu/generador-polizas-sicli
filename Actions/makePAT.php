<?php
  require_once '/home/wicho/Desktop/Encriptador_sicli/vendor/autoload.php';

  use Dompdf\Options;
  use Dompdf\Dompdf;
  use Helpers\Pat;


  include "../db_connection.php";

  session_start();

  $id_ape = '3';
  $folio_interno = '836680733';
  $id_pat = '6';


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

  $sql_data_folio = "SELECT
    folio_interno,
    fecha_hora,
    doc
    FROM folios
    WHERE folio_interno = '$folio_interno' 
  ";

  $_SESSION['folio'] = $folio = $conn->query($sql_data_folio)->fetch_assoc();

  $sql_data_pat = "SELECT
    id,
    nombre,
    objetivos,
    justificacion,
    metas
    FROM datospats
    WHERE id = '$id_pat'
  ";

  $_SESSION['datos_pat'] = $datos_pat = $conn->query($sql_data_pat)->fetch_assoc();

  $sql_lineas = "SELECT DISTINCT
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
  $array_lineas_filtrado = [];

  while($linea = $result_sql_lineas->fetch_object()) {
    array_push($array_lineas, $linea);
  }
  function compareObjects($obj1, $obj2) {
    return ($obj1->linea_id === $obj2->linea_id);
  }

  foreach ($array_lineas as $linea) {
    $found = false;
    foreach ($array_lineas_filtrado as $linea_filtrado) {
        if (compareObjects($linea, $linea_filtrado)) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $array_lineas_filtrado[] = $linea;
    }
  }

  $_SESSION['array_lineas'] = $array_lineas_filtrado;

  $pat = new Pat(
    $conn->query($sql_data_ape)->fetch_object(),
    $conn->query($sql_data_pat)->fetch_object(),
    $array_lineas_filtrado,
    $conn->query($sql_data_folio)->fetch_object()
  );

  $_SESSION['pat'] = $pat;

  error_log(json_encode($pat));

  ob_start();

  include "../patformat.php";

  $htmlContent = ob_get_clean();

  //Options for Dompdf
  $options = new Options();
  $options->set('isHtml5ParserEnabled', true);

  //Dompdf configuration
  $dompdf = new Dompdf();
  $dompdf->loadHtml($htmlContent);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();

  //$dompdf->stream($folio['doc']);