<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="#" method='POST'>
    <label>Folio</label>
    <input type="text" name='folio' />
    <button>Encriptar</button>
  </form>
  <br/>
  <br/>
  <form action="#" method='GET'>
    <label>Folio Encriptado</label>
    <input type="text" name='folio_encriptado'>
    <button>desencriptar</button>
  </form>
  <?php
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

    function desencriptar($folio_interno) {
      $metodo = "AES-256-CBC";
      $llave = hash('sha256', 'LEON ES EL HIJO MAS BONITO DEL MUNDO');
      $iv = substr(hash('sha256', '07.0216171089'), 0, 16);

      $folio_interno = str_replace('-', '', $folio_interno);

      $decodificado = base64_decode($folio_interno);

      $folio = openssl_decrypt($decodificado, $metodo, $llave, 0, $iv);

      echo "<br/>Este es el folio: " . $folio_interno;

      return $folio;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $folio = $_POST['folio'];

      $folio_interno = encriptar($folio);

      echo "<br/>" . $folio_interno;

      echo "<br/><br/>Desencriptado:<br/>" . desencriptar($folio_interno);
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
      $encriptado = $_GET['folio_encriptado'];

      echo $encriptado;

      echo "<br/><br/>Desencriptado:<br/><br/>" . desencriptar($encriptado);
    }
  ?>
</body>
</html>
