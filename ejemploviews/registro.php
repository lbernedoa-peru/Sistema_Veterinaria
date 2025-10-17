<?php
// views/main.php
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Clínica - Página Principal</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#"><i class="bi bi-shield-plus"></i> Veterinaria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="main.php"><i class="bi bi-house"></i> Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="formulario.php"><i class="bi bi-calendar-event"></i> Reserva de citas</a></li>
          <li class="nav-item"><a class="nav-link " href="registro.php"><i class="bi bi-heart-fill"></i> Registro</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-clipboard2-pulse"></i> Historial Clínico</a></li>
          <li class="nav-item"><a class="nav-link" href="ayuda.php"><i class="bi bi-info-circle"></i> Ayuda</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- Contenido -->
  <div class="container">
    <div class="container-box">
      <h1 class="mb-3 text-warning"><i class="bi bi-person-plus"></i> Registro de Nuevo Cliente</h1>
      <p class="text-muted">Completa los datos para poder agendar una cita en la clínica.</p>

      <form id="formRegistro" method="POST" action="../controllers/registrarPaciente.php">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">DNI</label>
            <input id="dni" name="dni" type="text" class="form-control" placeholder="12345678" required />
          </div>
          <div class="col-md-6">
            <label class="form-label">Nombre completo</label>
            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Juan Perez" required />
          </div>
          <div class="col-md-6">
            <label class="form-label">Correo</label>
            <input id="correo" name="correo" type="email" class="form-control" placeholder="correo@ejemplo.com" required />
          </div>
          <div class="col-md-6">
            <label class="form-label">Teléfono</label>
            <input id="telefono" name="telefono" type="text" class="form-control" placeholder="999999999" required />
          </div>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-warning"><i class="bi bi-check-circle"></i> Registrar</button>
          <a href="formulario.php" class="btn btn-secondary"><i class="bi bi-arrow-left-circle"></i> Volver a agendar cita</a>
        </div>
      </form>
    </div>
  </div>
  <!-- Footer -->
  <footer>
    <p class="mb-0">© 2025 Clínica | Página Principal</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>