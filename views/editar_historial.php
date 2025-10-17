<?php
session_start();
$usuario = "Administrador"; // Usuario logueado
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Editar Historial - Veterinaria Tessa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f6f4eb;
      color: #333;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    .navbar {
      background-color: #e4b332;
    }
    footer {
      margin-top: auto;
      background: #e4b332;
      color: #fff;
      text-align: center;
      padding: 15px 10px;
    }
    header {
      background: #fff9e5;
      border-bottom: 3px solid #e4b33255;
      text-align: center;
      padding: 40px 20px;
    }
    header h1 {
      color: #e4b332;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="main.php"><i class="bi bi-paw-fill"></i> Veterinaria Tessa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="main.php"><i class="bi bi-house-heart"></i> Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="buscar_cliente.php"><i class="bi bi-search-heart"></i> Buscar</a></li>
          <li class="nav-item"><a class="nav-link" href="registro_cliente.php"><i class="bi bi-person-plus"></i> Registrar</a></li>
          <li class="nav-item"><a class="nav-link active" href="historial.php"><i class="bi bi-journal-text"></i> Historial</a></li>
          <li class="nav-item"><a class="nav-link" href="citas.php"><i class="bi bi-calendar-heart"></i> Citas</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-person-circle"></i> <?php echo $usuario; ?></a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Cuenta</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HEADER -->
  <header>
    <h1><i class="bi bi-pencil-square"></i> Editar Historial</h1>
    <p class="text-muted">Modifica la información registrada de la atención de la mascota.</p>
  </header>

  <!-- FORMULARIO -->
  <div class="container my-5">
    <div class="card border-0 shadow p-4">
      <form>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Cliente</label>
            <input type="text" class="form-control" value="Ana López">
          </div>
          <div class="col-md-6">
            <label class="form-label">Mascota</label>
            <input type="text" class="form-control" value="Rocky">
          </div>
          <div class="col-md-6">
            <label class="form-label">Motivo</label>
            <input type="text" class="form-control" value="Vacunación anual">
          </div>
          <div class="col-md-6">
            <label class="form-label">Tratamiento</label>
            <input type="text" class="form-control" value="Vacuna antirrábica">
          </div>
          <div class="col-md-6">
            <label class="form-label">Veterinario</label>
            <input type="text" class="form-control" value="Dr. Ramírez">
          </div>
          <div class="col-md-6">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" value="2025-10-10">
          </div>
          <div class="col-12">
            <label class="form-label">Observaciones</label>
            <textarea class="form-control" rows="4">Mascota en buen estado general.</textarea>
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-warning w-50 fw-bold">
            <i class="bi bi-save"></i> Guardar Cambios
          </button>
          <a href="historial.php" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Cancelar</a>
        </div>
      </form>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <p class="mb-0">© 2025 Veterinaria Tessa | Editar Historial</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
