<?php
  include 'db_conection.php';

  session_start();

  if($_SERVER["REQUEST_METHOD"] == "GET") {
    $_SESSION['id_ape'] = $_GET['id_ape'];
  }

  if(!isset($_SESSION['id_ape'])) {
    $_SESSION['id_ape'] = '2';
  }

  $id_ape = $_SESSION['id_ape'];

  $sql_apes = "SELECT id FROM apes";

  $result_sql_apes = $conn->query($sql_apes);

  $sql_polizas = "SELECT 
    id,
    id_ape,
    numero,
    tipo_poliza,
    subtipo_poliza,
    descripcion,
    fecha
    FROM polizas
    WHERE id_ape = '$id_ape'";

  $result_sql_polizas = $conn->query($sql_polizas);

  $polizas = [];

  while($poliza = $result_sql_polizas->fetch_assoc()) {
    array_push($polizas, $poliza);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Polizas</title>
  <link rel="stylesheet" href="styles/index.css">
</head>
<body>
  <form action='#' method='GET'>
    <label>ID Ape</label>
    <select name='id_ape'>
      <?php 
        while($ape = $result_sql_apes->fetch_assoc()) {
          echo 
          "
            <option>{$ape['id']}</option>
          ";
        }
      ?>
    </select>
    <button>Seleccionar APE</button>
  </form>
  <table>
    <caption>Polizas ID APE <?php echo $_SESSION['id_ape'] ?></caption>
    <thead>
      <tr>
        <td>id</td>
        <td>id_ape</td>
        <td>numero</td>
        <td>tipo_poliza</td>
        <td>subtipo_poliza</td>
        <td>descripcion</td>
        <td>fecha</td>
        <td>Generar PDF</td>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($polizas as $poliza) {
          $id_poliza = $poliza['id'];

          echo
          "
          <tr>
            <td>{$poliza['id']}</td>
            <td>{$poliza['id_ape']}</td>
            <td>{$poliza['numero']}</td>
            <td>{$poliza['tipo_poliza']}</td>
            <td>{$poliza['subtipo_poliza']}</td>
            <td>{$poliza['descripcion']}</td>
            <td>{$poliza['fecha']}</td>
            <td>
              <form action='makePoliza.php' method='POST'>
                <input type='hidden' value='$id_poliza' name='id_poliza' />
                <button>Generar PDF</button>
              </form>
            </td>
          </tr>
          ";
        }
      ?>
    </tbody>
  </table>
</body>
</html>