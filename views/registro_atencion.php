<?php
// views/registro.php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Registro_Atencion";

include('../config/Database.php');
include('../controller/co_registro_atencion.php');
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
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow p-4">
                    <h4 class="text-center mb-4 text-warning"><i class="bi bi-person-lines-fill"></i> Registro Atención</h4>

                    <?php if (isset($mensaje)): ?>
                        <div class="alert alert-<?= $alerta ?> alert-dismissible fade show" role="alert">
                            <?= $mensaje ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                        unset($mensaje, $alerta);
                    endif; ?>



                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">DNI</label>
                                <input type="text" name="dni" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Mascota</label>
                                <input type="text" name="n_mascota" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Veterinario</label>
                                <input type="text" name="veterinario" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tipo Servicio</label>
                                <input type="text" name="tipo_servicio" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Costo</label>
                                <input type="text" name="costo" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Motivo</label>
                                <textarea type="text" name="motivo" class="form-control " style="resize: none; height: 220px;"required></textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" name="btnregistro" value="ok" class="btn btn-warning w-50 fw-bold">
                                <i class="bi bi-check2-circle"></i> Registrar
                            </button>
                        </div>
                    </form>
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
