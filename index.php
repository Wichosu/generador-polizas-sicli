<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="#" method='POST'>
    <label>IDENTIFICADOR APE</label>
    <input type='text' name='ape' />
    <label>Id APE</label>
    <input type='text' name='id_ape' />
    <button>Obtener pdfs</button>
  </form>
<?php
  use Dompdf\Dompdf;
  use Dompdf\Options;

  require_once __DIR__ . '/vendor/autoload.php';

  $server = "localhost";
  $username = "root";
  $password = "Osu!W1ch0";
  $db = "sicli";

  $conn = new mysqli($server, $username, $password, $db);

  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $identificador_ape = $_POST['ape'];
    $id_ape = $_POST['id_ape'];

    $_SESSION['ape'] = $id_ape;

    $sql_folios = "SELECT id FROM folios WHERE identificador = '$identificador_ape'";

    $result_folios = $conn->query($sql_folios);

    while($folio = $result_folios->fetch_assoc()) {
      $id_folio = $folio['id'];
      $_SESSION['id_folio'] = $folio['id'];

      $options = new Options();
      $options->set('isHtml5ParserEnabled', true);
    
      $dompdf = new Dompdf($options);
    
      ob_start();
    
      include 'formatopoliza.php';
    
      $htmlContent = ob_get_clean();
    
      $dompdf->loadHtml($htmlContent);
    
      $dompdf->setPaper('A4', 'portrait');
    
      $dompdf->render();

      $sql_nombre = "SELECT doc FROM folios WHERE id = '$id_folio'";
    
      $result = $conn->query($sql_nombre);

      $nombre = $result->fetch_assoc();

      $dompdf->stream($nombre['doc']);
    }
  }
?>
</body>
</html>