<?php
// views/registro.php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Registrar";

include('../config/Database.php');
include('../controller/co_registrar_cliente.php');
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
                    <h4 class="text-center mb-4 text-warning"><i class="bi bi-person-lines-fill"></i> Datos del Dueño</h4>

                    <?php if (isset($mensaje)): ?>
                        <div class="alert <?= $exito ? 'alert-success' : 'alert-danger' ?> alert-dismissible fade show" role="alert">
                            <?= $mensaje ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                        // Destruyo las variables para que no se repita al recargar
                        unset($mensaje, $exito); 
                    endif; ?>



                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Primer Nombre</label>
                                <input type="text" name="p_nombre" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Segundo Nombre</label>
                                <input type="text" name="s_nombre" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Apellido Paterno</label>
                                <input type="text" name="p_apellido" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Apellido Materno</label>
                                <input type="text" name="m_apellido" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">DNI</label>
                                <input type="text" name="dni" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" name="telefono" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Correo electrónico</label>
                                <input type="email" name="correo_electronico" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Dirección</label>
                                <input type="text" name="direccion" class="form-control">
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4 class="text-center mb-4 text-warning"><i class="bi bi-paw"></i> Datos de la Mascota</h4>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre_mascota" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Especie</label>
                                <select name="especie" class="form-select" required>
                                    <option value="">Seleccione...</option>
                                    <option>Perro</option>
                                    <option>Gato</option>
                                    <option>Ave</option>
                                    <option>Conejo</option>
                                    <option>Otro</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Raza</label>
                                <input type="text" name="raza" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Edad (años)</label>
                                <input type="number" name="edad" class="form-control" min="0">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Sexo</label>
                                <select name="sexo" class="form-select">
                                    <option value="">Seleccione...</option>
                                    <option>Macho</option>
                                    <option>Hembra</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" name="btnregistro" value="ok" class="btn btn-success fw-bold ms-3">
                                <i class="bi bi-check2-circle"></i> Registrar
                            </button>
                            <a href="inicio.php" class="btn btn-secondary fw-bold ms-3">
                            <i class="bi bi-arrow-left-circle"></i> Volver
                        </a>
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
