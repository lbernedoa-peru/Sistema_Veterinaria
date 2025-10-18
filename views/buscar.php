<?php
// views/inicio.php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Buscar";
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
    <!-- CONTENIDO BUSCAR -->
      <div class="container my-5">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card border-0 shadow p-4">
              <h4 class="text-center mb-4 text-warning"><i class="bi bi-search-heart"></i> Buscar Cliente</h4>

              <form method="GET" action="buscar_cliente.php">
                <div class="input-group mb-4">
                  <input type="text" name="busqueda" class="form-control" placeholder="Ingrese nombre o DNI del cliente" required>
                  <button class="btn btn-warning fw-bold" type="submit">
                    <i class="bi bi-search"></i> Buscar
                  </button>
                </div>
              </form>

              <!-- RESULTADOS -->
              <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>DNI</th>
                      <th>Teléfono</th>
                      <th>Mascota</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Ejemplo de datos (simulados) -->
                    <tr>
                      <td>1</td>
                      <td>Ana López</td>
                      <td>76543210</td>
                      <td>987654321</td>
                      <td>Rocky</td>
                      <td>
                        <a href="ver_historial.php" class="btn btn-outline-warning btn-sm">
                          <i class="bi bi-eye"></i> Ver
                        </a>
                        <a href="editar_historial.php" class="btn btn-outline-success btn-sm">
                          <i class="bi bi-pencil-square"></i> Editar
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Carlos Pérez</td>
                      <td>76543211</td>
                      <td>976543210</td>
                      <td>Tommy</td>
                      <td>
                        <a href="ver_cliente.php?id=2" class="btn btn-outline-warning btn-sm">
                          <i class="bi bi-eye"></i> Ver
                        </a>
                        <a href="editar_cliente.php?id=2" class="btn btn-outline-success btn-sm">
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