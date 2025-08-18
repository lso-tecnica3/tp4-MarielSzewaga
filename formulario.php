<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container mt-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="mb-4">Formulario de Preinscripción</h2>
          <form action="guardar.php" method="get" class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nombre:</label>
              <input type="text" name="nombre" required class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Apellido:</label>
              <input type="text" name="apellido" required class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">DNI:</label>
              <input type="text" name="dni" required class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email:</label>
              <input type="email" name="email" required class="form-control">
            </div>
            <div class="col-md-6">
              <label class="form-label">Teléfono:</label>
              <input type="text" name="telefono" required class="form-control">
            </div>
            <div class="col-12">
              <input type="submit" value="Enviar" class="btn btn-primary">
              <a href="listar.php" class="btn btn-outline-secondary">Ver lista de preinscriptos</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
