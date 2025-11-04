<?php
// views/historial.php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Historial";

// Incluir el modelo
require_once '../model/mo_historial_cliente.php';

// Obtener el filtro del formulario
$filtro_buscar = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';

// Cargar los clientes
$clientes = cargar_historial($filtro_buscar);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../includes/head.php'); ?>
</head>
<body>
    <header>
        <?php include('../includes/header.php'); ?>
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
                      <th>Dni</th>
                      <th>Mascota</th>
                      <th>Tratamiento</th>
                      <th>Motivo</th>
                      <th>Veterinario</th>
                      <th>Costo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($cliente['Id']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Fecha_registro']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Dni']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['N_Mascota']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Tratamiento']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Motivo']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Veterinario']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Costo']); ?></td>
                                        <td>
                                            <a href="ver_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" class="btn btn-outline-warning btn-sm me-1">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="editar_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" class="btn btn-outline-success btn-sm">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($clientes)): ?>
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">No se encontraron clientes.</td>
                                    </tr>
                                <?php endif; ?>
                  </tbody>
                </table>
              </div>

              <div class="text-center mt-4">
                <a href="registro_atencion.php" class="btn btn-outline-warning fw-bold">
                  <i class="bi bi-person-plus"></i> Registrar nueva atención
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
    <!-- Bootstrap JS (Popper incluido) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
