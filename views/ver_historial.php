<?php
session_start();
$usuario = "Administrador"; // Usuario logueado
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ver Historial - Veterinaria Tessa</title>
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
    <h1><i class="bi bi-journal-text"></i> Detalles del Historial</h1>
    <p class="text-muted">Consulta toda la información registrada de la atención de la mascota.</p>
  </header>

  <!-- CONTENIDO -->
  <div class="container my-5">
    <div class="card shadow p-4 border-0">
      <h5 class="text-warning"><i class="bi bi-paw"></i> Información de la Mascota</h5>
      <table class="table table-bordered mt-3">
        <tr><th>Nombre</th><td>Rocky</td></tr>
        <tr><th>Especie</th><td>Perro</td></tr>
        <tr><th>Raza</th><td>Labrador</td></tr>
        <tr><th>Edad</th><td>3 años</td></tr>
        <tr><th>Sexo</th><td>Macho</td></tr>
      </table>

      <h5 class="text-warning mt-4"><i class="bi bi-person-lines-fill"></i> Información del Dueño</h5>
      <table class="table table-bordered mt-3">
        <tr><th>Cliente</th><td>Ana López</td></tr>
        <tr><th>Teléfono</th><td>987654321</td></tr>
        <tr><th>Correo</th><td>ana@email.com</td></tr>
      </table>

      <h5 class="text-warning mt-4"><i class="bi bi-file-medical"></i> Detalles de la Atención</h5>
      <table class="table table-bordered mt-3">
        <tr><th>Fecha</th><td>2025-10-10</td></tr>
        <tr><th>Motivo</th><td>Vacunación anual</td></tr>
        <tr><th>Tratamiento</th><td>Vacuna antirrábica</td></tr>
        <tr><th>Veterinario</th><td>Dr. Ramírez</td></tr>
        <tr><th>Observaciones</th><td>Mascota en buen estado general.</td></tr>
      </table>

      <div class="text-center mt-4">
        <a href="historial.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
        <a href="editar_historial.php?id=1" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Editar</a>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <p class="mb-0">© 2025 Veterinaria Tessa | Ver Historial</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
