<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guardar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container mt-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <?php
 
          date_default_timezone_set('America/Argentina/Buenos_Aires');

          $nombre = "";
          if (isset($_GET["nombre"])) {
              $nombre = $_GET["nombre"];
          }
          $apellido = "";
          if (isset($_GET["apellido"])) {
              $apellido = $_GET["apellido"];
          }
          $dni = "";
          if (isset($_GET["dni"])) {
              $dni = $_GET["dni"];
          }
          $email = "";
          if (isset($_GET["email"])) {
              $email = $_GET["email"];
          }
          $telefono = "";
          if (isset($_GET["telefono"])) {
              $telefono = $_GET["telefono"];
          }

          $errores = "";
          if ($nombre == "" || $apellido == "" || $dni == "" || $email == "" || $telefono == "") {
              $errores = "Completar todos los campos<br>";
          }

          if ($errores != "") {
              print '<div class="alert alert-danger">' . $errores . '</div>';
          } else {
              $archivo = "preinscripciones.csv";
              $registro = "$nombre,$apellido,$dni,$email,$telefono," . date("d-m-Y H:i:s") . "\n";
              $f = fopen($archivo, "a");
              fwrite($f, $registro);
              fclose($f);
              print '<div class="alert alert-success">Datos guardados</div>';
          }
          ?>
          <a href="formulario.php" class="btn btn-primary mt-3">Volver</a>
          <a href="listar.php" class="btn btn-outline-secondary mt-3">Ver listado</a>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
