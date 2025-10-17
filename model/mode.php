<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria Tessa - Panel Principal</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand {
            color: #ffc107 !important;
            font-weight: bold;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-weight: bold;
        }
        footer {
            text-align: center;
            padding: 15px;
            background-color: #343a40;
            color: white;
            margin-top: 30px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">🐾 Veterinaria Tessa</a>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="container my-5">
        <h2 class="text-center mb-4 text-secondary fw-bold">Panel Principal</h2>
        <div class="row g-4 justify-content-center">

            <!-- REGISTRAR CLIENTE -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <i class="bi bi-person-plus display-5 text-warning mb-2"></i>
                    <h5 class="card-title">Registrar Cliente</h5>
                    <p class="text-muted small">Agrega un nuevo cliente a la base de datos.</p>
                    <a href="registro_cliente.php" class="btn btn-outline-warning btn-sm">
                        <i class="bi bi-pencil-square"></i> Ir
                    </a>
                </div>
            </div>

            <!-- BUSCAR CLIENTE -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <i class="bi bi-search display-5 text-secondary mb-2"></i>
                    <h5 class="card-title">Buscar Cliente</h5>
                    <p class="text-muted small">Encuentra clientes registrados rápidamente.</p>
                    <a href="buscar_cliente.php" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-arrow-right-circle"></i> Ir
                    </a>
                </div>
            </div>

            <!-- REGISTRAR MASCOTA -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <i class="bi bi-heart-pulse display-5 text-danger mb-2"></i>
                    <h5 class="card-title">Registrar Mascota</h5>
                    <p class="text-muted small">Añade una nueva mascota para un cliente.</p>
                    <a href="registro_mascota.php" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-pencil-square"></i> Ir
                    </a>
                </div>
            </div>

            <!-- HISTORIAL CLÍNICO -->
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <i class="bi bi-folder2-open display-5 text-success mb-2"></i>
                    <h5 class="card-title">Historial Clínico</h5>
                    <p class="text-muted small">Consulta el historial médico de las mascotas.</p>
                    <a href="historial.php" class="btn btn-outline-success btn-sm">
                        <i class="bi bi-folder"></i> Ir
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        &copy; 2025 Veterinaria Tessa | Todos los derechos reservados 🐶🐱
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
