<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container mt-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="mb-4">Listado de Preinscripciones</h2>
          <?php
          $archivo = "preinscripciones.csv";

          if (!file_exists($archivo)) {
              print '<div class="alert alert-warning">No hay preinscripciones registradas</div>';
              print '<a href="formulario.php" class="btn btn-primary">Volver al formulario</a>';
          } else {
              $abrir = fopen($archivo, "r");

              print '<table class="table table-striped table-bordered align-middle">';
              print '<thead><tr><th>Nombre</th><th>Apellido</th><th>DNI</th><th>Email</th><th>Teléfono</th><th>Fecha</th></tr></thead><tbody>';

              while ($abrir && $linea = fgets($abrir)) {
                  print "<tr><td>";
                  $largo = strlen($linea);
                  $i = 0;
                  while ($i < $largo) {
                      $car = $linea[$i];
                      if ($car == ",") {
                          print "</td><td>";
                      } elseif ($car != "\n" && $car != "\r") {
                          print $car;
                      }
                      $i = $i + 1;
                  }
                  print "</td></tr>";
              }

              if ($abrir) {
                  fclose($abrir);
              }
              print "</tbody></table>";
          }
          ?>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
