<?php
// views/inicio.php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Buscar";

// Incluir el modelo
require_once '../model/mo_cargar_clientes.php';

// Obtener el filtro del formulario
$filtro_buscar = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';

// Cargar los clientes
$clientes = cargar_clientes($filtro_buscar);
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

    <!-- CONTENIDO BUSCAR CLIENTE -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow p-4">
                    <h4 class="text-center mb-4 text-warning">
                        <i class="bi bi-search-heart"></i> Buscar Cliente
                    </h4>

                    <form method="POST" action="">
                        <div class="input-group mb-4">
                            <input type="text" name="busqueda" class="form-control" placeholder="Ingrese nombre o DNI del cliente" value="<?php echo htmlspecialchars($filtro_buscar); ?>" required>
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
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th>Mascota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clientes as $cliente): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($cliente['Id']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Dni']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['Telefono']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['N_Mascota']); ?></td>
                                        <td>
                                            <a href="ver_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" class="btn btn-outline-primary btn-sm me-1">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="editar_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" class="btn btn-outline-warning btn-sm me-1">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <a href="editar_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" class="btn btn-outline-success btn-sm me-1">
                                                <i class="bi bi-pencil-square"></i> Agregar
                                            </a>
                                            <a href="editar_historial.php?id=<?php echo htmlspecialchars($cliente['Id']); ?>" class="btn btn-outline-danger btn-sm me-1">
                                                <i class="bi bi-pencil-square"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php if (empty($clientes)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No se encontraron clientes.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-4">
                        <a href="registro.php" class="btn btn-outline-warning fw-bold">
                            <i class="bi bi-person-plus"></i> Registrar nuevo cliente
                        </a>
                        <a href="#" class="btn btn-outline-secondary fw-bold ms-3">
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