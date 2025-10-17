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
  <!-- Encabezado -->
  <header class="text-center text-dark py-5 bg-white" >
    <div class="container">
      <h1 class="fw-bold"><i class="bi bi-paw-fill"></i> ¡Bienvenidos a Veterinaria Tessa!</h1>
      <p class="lead">Cuidamos con amor y dedicación la salud de tus mejores amigos 🐕🐈</p>
      <a href="#" class="btn btn-light btn-lg mt-3"><i class="bi bi-calendar-heart"></i> Reserva tu cita</a>
    </div>
  </header>




  
  <!-- Footer -->
  <footer class="text-center text-white py-3 bg-warning " >
    <p class="mb-1 fw-bold">© 2025 Veterinaria</p>
    <small><i class="bi bi-geo-alt"></i> Lima | <i class="bi bi-telephone"></i> +51 987 654 321</small>
  </footer>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>