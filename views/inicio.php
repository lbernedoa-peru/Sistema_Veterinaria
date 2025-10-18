<?php
// views/inicio.php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Inicio";
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <?php include ('../includes/head.php'); ?>
</head>
<body>
    <header>
        <?php include ('../includes/header.php'); ?>
    </header>
    <!-- CONTENIDO INICIO -->
     <main class="container my-5">
      <h2 class="text-center mb-4">Panel Principal</h2>
      <div class="row g-4 justify-content-center">
        <div class="col-md-3">
          <div class="card shadow-sm text-center p-3">
            <i class="bi bi-search-heart display-4 text-warning"></i>
            <h5 class="mt-3">Buscar cliente</h5>
            <a href="#" class="btn btn-outline-warning mt-2">Ir</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm text-center p-3">
            <i class="bi bi-person-plus display-4 text-warning"></i>
            <h5 class="mt-3">Registrar Cliente</h5>
            <a href="#" class="btn btn-outline-warning mt-2">Ir</a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card shadow-sm text-center p-3">
            <i class="bi-heart display-4 text-warning"></i>
            <h5 class="mt-3">Ver Mascotas</h5>
            <a href="#" class="btn btn-outline-warning mt-2">Ir</a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card shadow-sm text-center p-3">
            <i class="bi-journal-medical display-4 text-warning"></i>
            <h5 class="mt-3">Ver historias</h5>
            <a href="#" class="btn btn-outline-warning mt-2">Ir</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm text-center p-3">
            <i class="bi-scissors display-4 text-warning"></i>
            <h5 class="mt-3">Peluqueria</h5>
            <a href="#" class="btn btn-outline-warning mt-2">Ir</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm text-center p-3">
            <i class="bi bi-bag-check display-4 text-warning"></i>
            <h5 class="mt-3">Historial de Atenciones</h5>
            <a href="#" class="btn btn-outline-warning mt-2">Ir</a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm text-center p-3">
            <i class="bi-shield-plus display-4 text-warning"></i>
            <h5 class="mt-3">Vacunas</h5>
            <a href="#" class="btn btn-outline-warning mt-2">Ir</a>
          </div>
        </div>

      </div>
    </main>

    <footer>
    <?php include('../includes/footer.php'); ?>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
