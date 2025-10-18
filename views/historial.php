<?php
// views/historial.php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Historial";
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
    <!-- CONTENIDO HISTORIAL -->
      <div class="container my-5">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="card border-0 shadow p-4">
              <h4 class="text-center mb-4 text-warning"><i class="bi bi-journal-text"></i> Historial Clínico de Mascotas</h4>

              <form method="GET" action="historial.php">
                <div class="input-group mb-4">
                  <input type="text" name="busqueda" class="form-control" placeholder="Buscar por nombre de mascota o cliente" required>
                  <button class="btn btn-warning fw-bold" type="submit">
                    <i class="bi bi-search"></i> Buscar
                  </button>
                </div>
              </form>

              <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fecha</th>
                      <th>Cliente</th>
                      <th>Mascota</th>
                      <th>Motivo</th>
                      <th>Tratamiento</th>
                      <th>Veterinario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Ejemplo de registros simulados -->
                    <tr>
                      <td>001</td>
                      <td>2025-10-10</td>
                      <td>Ana López</td>
                      <td>Rocky</td>
                      <td>Vacunación</td>
                      <td>Vacuna antirrábica</td>
                      <td>Dr. Ramírez</td>
                      <td>
                        <a href="ver_historial.php?id=1" class="btn btn-outline-warning btn-sm">
                          <i class="bi bi-eye"></i> Ver
                        </a>
                        <a href="editar_historial.php?id=1" class="btn btn-outline-success btn-sm">
                          <i class="bi bi-pencil-square"></i> Editar
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>002</td>
                      <td>2025-09-28</td>
                      <td>Carlos Pérez</td>
                      <td>Tommy</td>
                      <td>Consulta general</td>
                      <td>Desparasitación interna</td>
                      <td>Dra. Torres</td>
                      <td>
                        <a href="ver_historial.php?id=2" class="btn btn-outline-warning btn-sm">
                          <i class="bi bi-eye"></i> Ver
                        </a>
                        <a href="editar_historial.php?id=2" class="btn btn-outline-success btn-sm">
                          <i class="bi bi-pencil-square"></i> Editar
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="text-center mt-4">
                <a href="registro.php" class="btn btn-outline-warning fw-bold">
                  <i class="bi bi-person-plus"></i> Registrar nuevo cliente
                </a>
                <a href="#" class="btn btn-outline-secondary fw-bold ms-6">
                  <i class="bi bi-arrow-left-circle"></i> Volver
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <footer>
    <?php include('../includes/footer.php'); ?>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>