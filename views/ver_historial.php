<?php
// views/ver_historial.php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
require_once '../controller/co_verAtencion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include('../includes/head.php'); ?>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<header>
    <?php include('../includes/header.php'); ?>
</header>

<main class="container my-5 flex-grow-1">
  <div class="card shadow p-4 border-0">

    <div class="row">

      <!-- Información del Dueño -->
      <div class="col-12 col-md-6">
        <h5 class="text-warning"><i class="bi bi-person-lines-fill"></i> <?php echo htmlspecialchars($tituloRelacion); ?></h5>

        <?php if (!empty($info)): ?>
          <table class="table table-bordered mt-3">
            <tr><th>DNI</th><td><?= htmlspecialchars($info['dni'] ?? ''); ?></td></tr>
            <tr><th>Nombres</th><td><?= htmlspecialchars($info['p_nombre'] ?? ''); ?></td></tr>
            <tr><th>Apellidos</th><td><?= htmlspecialchars($info['p_apellido'] ?? ''); ?></td></tr>
            <tr><th>Correo</th><td><?= htmlspecialchars($info['correo_electronico'] ?? ''); ?></td></tr>
            <tr><th>Teléfono</th><td><?= htmlspecialchars($info['telefono'] ?? ''); ?></td></tr>
            <tr><th>Dirección</th><td><?= htmlspecialchars($info['direccion'] ?? ''); ?></td></tr>
          </table>
        <?php else: ?>
          <p class="text-muted">No se encontró información del dueño o mascota.</p>
        <?php endif; ?>
      </div>

      <!-- Información de la Mascota -->
      <div class="col-12 col-md-6">
        <h5 class="text-warning"><i class="bi bi-paw"></i> Información de la Mascota</h5>

        <?php if (!empty($info)): ?>
          <table class="table table-bordered mt-3">
            <tr><th>Nombre</th><td><?= htmlspecialchars($info['mascota'] ?? ''); ?></td></tr>
            <tr><th>Especie</th><td><?= htmlspecialchars($info['especie'] ?? ''); ?></td></tr>
            <tr><th>Raza</th><td><?= htmlspecialchars($info['raza'] ?? ''); ?></td></tr>
            <tr><th>Edad</th><td><?= htmlspecialchars($info['edad'] ?? ''); ?> años</td></tr>
            <tr><th>Sexo</th><td><?= htmlspecialchars($info['sexo'] ?? ''); ?></td></tr>
          </table>
        <?php else: ?>
          <p class="text-muted">No se encontró información de la mascota.</p>
        <?php endif; ?>
      </div>
    </div>

    <!-- Historial de Atenciones -->
    <div class="col-12 mt-4">
      <h5 class="text-warning"><i class="bi bi-file-medical"></i> Historial Médico</h5>

      <table class="table table-bordered table-hover mt-3 text-center">
        <thead class="table-warning">
          <tr>
            <th>Fecha y Hora</th>
            <th>Servicio</th>
            <th>Tratamiento</th>
            <th>Costo</th>
            <th>Veterinario</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($historial)): ?>
            <?php foreach ($historial as $fila): ?>
              <tr>
                <td><?= htmlspecialchars($fila['f_registro'] ?? ''); ?></td>
                <td><?= htmlspecialchars($fila['tipo_servicio'] ?? ''); ?></td>
                <td><?= htmlspecialchars($fila['descripcion'] ?? ''); ?></td>
                <td>S/. <?= htmlspecialchars($fila['costo'] ?? ''); ?></td>
                <td><?= htmlspecialchars(($fila['nom_empleado'] ?? '') . ' ' . ($fila['ape_empleado'] ?? '')); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="5" class="text-muted">No hay atenciones registradas.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>

      <!-- PAGINACIÓN -->
      <?php if ($total_paginas > 1): ?>
        <nav aria-label="Paginación">
          <ul class="pagination justify-content-center">
            <!-- Botón Anterior -->
            <li class="page-item <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">
              <a class="page-link" href="?id=<?php echo $id_relacion; ?>&pagina=<?php echo $pagina_actual - 1; ?>">
                Anterior
              </a>
            </li>

            <!-- Números de página -->
            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
              <li class="page-item <?php echo ($i == $pagina_actual) ? 'active' : ''; ?>">
                <a class="page-link" href="?id=<?php echo $id_relacion; ?>&pagina=<?php echo $i; ?>">
                  <?php echo $i; ?>
                </a>
              </li>
            <?php endfor; ?>

            <!-- Botón Siguiente -->
            <li class="page-item <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">
              <a class="page-link" href="?id=<?php echo $id_relacion; ?>&pagina=<?php echo $pagina_actual + 1; ?>">
                Siguiente
              </a>
            </li>
          </ul>
        </nav>

        <!-- Info de registros -->
        <p class="text-center text-muted">
          Mostrando página <?php echo $pagina_actual; ?> de <?php echo $total_paginas; ?> 
          (Total: <?php echo $total_registros; ?> atenciones)
        </p>
      <?php endif; ?>
    </div>

    <div class="text-center mt-4">
      <a href="buscar.php" class="btn btn-outline-secondary fw-bold ms-3">
        <i class="bi bi-arrow-left"></i> Volver
      </a>
      <a href="registro_atencion.php?dni=<?= urlencode($info['dni']) ?>&mascota=<?= urlencode($info['mascota']) ?>" 
        class="btn btn-outline-success fw-bold ms-3">
        <i class="bi bi-pencil-square"></i> Nueva Atención
      </a>
    </div>

  </div>
</main>

<footer>
    <?php include('../includes/footer.php'); ?>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>