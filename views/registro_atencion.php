<?php
// views/registro_atencion.php
session_start();

// Al inicio del archivo, justo después de session_start()
$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? 'buscar.php'; // fallback si no hay referer

// FORZAMOS SESIÓN PARA PRUEBAS
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = 'admin';
    $_SESSION['nombre_completo'] = 'Administrador';
}

// === VARIABLES QUE USA TU HEADER ===
$usuario = $_SESSION['usuario'];
$pagina = "Registro_Atencion";

// === BOTÓN CANCELAR PERFECTO (vuelve al historial con el mismo id) ===
$pagina_anterior = $_SERVER['HTTP_REFERER'] ?? 'buscar.php';
$id_relacion = $_GET['id'] ?? '';
if ($id_relacion !== '') {
    $pagina_anterior = "ver_historial.php?id=" . urlencode($id_relacion);
}
// ===================================

$dni = htmlspecialchars($_GET['dni'] ?? '');
$mascota = htmlspecialchars($_GET['mascota'] ?? '');

include('../controller/co_registro_atencion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <?php include('../includes/head.php'); ?>
  <title>Nueva Atención - <?= $mascota ?: 'Mascota' ?></title>
</head>
<body>
    <header>
        <?php include('../includes/header.php'); ?>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-white text-center">
                        <h3 class="mb-0">NUEVA ATENCIÓN MÉDICA</h3>
                    </div>
                    <div class="card-body p-4">

                        <?php if (isset($mensaje)): ?>
                            <div class="alert alert-<?= $alerta ?> alert-dismissible fade show">
                                <strong><?= $mensaje ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">DNI del Dueño</label>
                                    <input type="text" class="form-control" value="<?= $dni ?>" readonly>
                                    <input type="hidden" name="dni" value="<?= $dni ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nombre de la Mascota</label>
                                    <input type="text" class="form-control" value="<?= $mascota ?>" readonly>
                                    <input type="hidden" name="n_mascota" value="<?= $mascota ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Veterinario</label>
                                    <input type="text" class="form-control" value="Administrador" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Tipo de Servicio</label>
                                    <select name="tipo_servicio" class="form-select" required>
                                        <option value="">Seleccionar servicio...</option>
                                        <option value="Consulta General">Consulta General</option>
                                        <option value="Vacuna">Vacuna</option>
                                        <option value="Desparasitación">Desparasitación</option>
                                        <option value="Cirugía">Cirugía</option>
                                        <option value="Peluquería">Peluquería</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Costo (S/.)</label>
                                    <input type="number" step="0.01" name="costo" class="form-control" min="0" placeholder="50.00" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Motivo, Diagnóstico y Tratamiento</label>
                                    <textarea name="motivo" class="form-control" rows="8" placeholder="Describe aquí todo..." required></textarea>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a href="<?= htmlspecialchars($pagina_anterior) ?>" class="btn btn-outline-danger fw-bold">
                                    Cancelar
                                </a>
                                <button type="submit" name="btnregistro" class="btn btn-outline-success fw-bold">
                                    Guardar Atención
                                </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <?php include('../includes/footer.php'); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>