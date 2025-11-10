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

// Configuración de paginación
$registros_por_pagina = 10; // Puedes cambiar este número
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_actual < 1) $pagina_actual = 1;

// Obtener el filtro del formulario
$filtro_buscar = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';
// Mantener el filtro si viene por GET (al cambiar de página)
if (empty($filtro_buscar) && isset($_GET['busqueda'])) {
    $filtro_buscar = trim($_GET['busqueda']);
}

// Cargar los clientes con paginación
$clientes = cargar_historial($filtro_buscar, $pagina_actual, $registros_por_pagina);
$total_registros = contar_total_historial($filtro_buscar);
$total_paginas = ceil($total_registros / $registros_por_pagina);

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

              <form method="POST" action="">
                <div class="input-group mb-4">
                  <input type="text" name="busqueda" class="form-control" placeholder="Buscar por nombre de mascota o cliente" value="<?php echo htmlspecialchars($filtro_buscar); ?>">
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
                      <th>Fecha Y Hora</th>
                      <th>Cliente</th>
                      <th>Dni</th>
                      <th>Mascota</th>
                      <th>Tratamiento</th>
                      <th>Descripcion</th>
                      <th>Veterinario</th>
                      <th>Costo</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($clientes)): ?>
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
                          <td>S/. <?php echo htmlspecialchars($cliente['Costo']); ?></td>
                          <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">
                              <a href="ver_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" 
                                class="btn btn-outline-warning btn-sm">
                                <i class="bi bi-eye"></i> 
                              </a>
                              <a href="editar_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" 
                                class="btn btn-outline-success btn-sm">
                                <i class="bi bi-pencil-square"></i> 
                              </a>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="10" class="text-center text-muted">No se encontraron registros.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>

              <!-- PAGINACIÓN -->
              <?php if ($total_paginas > 1): ?>
                <nav aria-label="Paginación">
                  <ul class="pagination justify-content-center">
                    <!-- Botón Anterior -->
                    <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
                      <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1; ?>&busqueda=<?php echo urlencode($filtro_buscar); ?>">
                        Anterior
                      </a>
                    </li>

                    <!-- Números de página -->
                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                      <li class="page-item <?php echo ($i == $pagina_actual) ? 'active' : ''; ?>">
                        <a class="page-link" href="?pagina=<?php echo $i; ?>&busqueda=<?php echo urlencode($filtro_buscar); ?>">
                          <?php echo $i; ?>
                        </a>
                      </li>
                    <?php endfor; ?>

                    <!-- Botón Siguiente -->
                    <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
                      <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1; ?>&busqueda=<?php echo urlencode($filtro_buscar); ?>">
                        Siguiente
                      </a>
                    </li>
                  </ul>
                </nav>

                <!-- Info de registros -->
                <p class="text-center text-muted">
                  Mostrando página <?php echo $pagina_actual; ?> de <?php echo $total_paginas; ?> 
                  (Total: <?php echo $total_registros; ?> registros)
                </p>
              <?php endif; ?>

              <div class="text-center mt-4">
                <a href="registro_atencion.php" class="btn btn-success fw-bold">
                  <i class="bi bi-person-plus"></i> Registrar nueva atención
                </a>
                <a href="inicio.php" class="btn btn-secondary fw-bold ms-3">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>