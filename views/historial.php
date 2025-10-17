<?php
// views/historial.php
session_start();
$usuario = "Administrador"; // Cambiar por el usuario logueado
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Historial Clínico - Veterinaria Tessa</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background-color: #fdfcf7;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    footer {
      margin-top: auto;
      background: #e4b332;
      color: #fff;
      text-align: center;
      padding: 15px 10px;
    }
    .table thead {
      background-color: #e4b332;
      color: #fff;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#e4b332;">
    <div class="container">
      <a class="navbar-brand fw-bold" href="main.php"><i class="bi bi-paw-fill"></i> Veterinaria Tessa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="main.php"><i class="bi bi-house-heart"></i> Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="buscar_cliente.php"><i class="bi bi-search-heart"></i> Buscar Cliente</a></li>
          <li class="nav-item"><a class="nav-link" href="registro_cliente.php"><i class="bi bi-person-plus"></i> Registrar Cliente</a></li>
          <li class="nav-item"><a class="nav-link active" href="historial.php"><i class="bi bi-journal-text"></i> Historial</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-person-circle"></i> <?php echo $usuario; ?></a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> Cuenta</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- CONTENIDO -->
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
            <a href="registro_cliente.php" class="btn btn-outline-warning fw-bold">
              <i class="bi bi-person-plus"></i> Registrar nuevo cliente
            </a>
            <a href="buscar_cliente.php" class="btn btn-outline-secondary fw-bold ms-2">
              <i class="bi bi-arrow-left-circle"></i> Volver
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <!-- FOOTER -->
  <footer>
    <p class="mb-0">© 2025 Veterinaria Tessa | Historial Clínico</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
