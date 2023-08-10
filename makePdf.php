<?php
  use Dompdf\Options;
  use Dompdf\Dompdf;

  require_once __DIR__ . '/vendor/autoload.php';

  include 'db_conection.php';

  session_start();

  $id_poliza = $_SESSION['id_poliza'] = $_POST['id_poliza'];

  ob_start();

  include 'formatopoliza.php';

  $htmlContent = ob_get_clean();

  //Options for Dompdf
  $options = new Options();
  $options->set('isHtml5ParserEnabled', true);

  //Dompdf configuration
  $dompdf = new Dompdf();
  $dompdf->loadHtml($htmlContent);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();

  $sql_file_name = "SELECT doc FROM folios WHERE id_doc = '$id_poliza'";

  $result_file_name = $conn->query($sql_file_name);

  $file_name = $result_file_name->fetch_assoc();

  $dompdf->stream($file_name['doc']);