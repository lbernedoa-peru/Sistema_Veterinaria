<?php
// views/registro_cliente.php
session_start();
$usuario = "Administrador"; // Cambiar por el usuario logueado
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <title>Registrar Cliente - Veterinaria Tessa</title>
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
          <li class="nav-item"><a class="nav-link active" href="registro_cliente.php"><i class="bi bi-person-plus"></i> Registrar Cliente</a></li>
          <li class="nav-item"><a class="nav-link" href="historial.php"><i class="bi bi-journal-text"></i> Historial</a></li>
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
  <!-- FORMULARIO -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card border-0 shadow p-4">
          <h4 class="text-center mb-4 text-warning"><i class="bi bi-person-lines-fill"></i> Datos del Dueño</h4>

          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nombre completo</label>
                <input type="text" class="form-control" placeholder="Ej. Ana López" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">DNI</label>
                <input type="text" class="form-control" placeholder="Ej. 76543210" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" placeholder="Ej. ana@email.com">
              </div>
              <div class="col-md-6">
                <label class="form-label">Teléfono</label>
                <input type="tel" class="form-control" placeholder="Ej. 987654321">
              </div>
              <div class="col-12">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control" placeholder="Ej. Calle Los Jazmines 120">
              </div>
            </div>

            <hr class="my-4">

            <h4 class="text-center mb-4 text-warning"><i class="bi bi-paw"></i> Datos de la Mascota</h4>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" placeholder="Ej. Rocky" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Especie</label>
                <select class="form-select">
                  <option selected>Seleccione...</option>
                  <option>Perro</option>
                  <option>Gato</option>
                  <option>Ave</option>
                  <option>Conejo</option>
                  <option>Otro</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Raza</label>
                <input type="text" class="form-control" placeholder="Ej. Labrador">
              </div>
              <div class="col-md-3">
                <label class="form-label">Edad (años)</label>
                <input type="number" class="form-control" min="0" placeholder="Ej. 2">
              </div>
              <div class="col-md-3">
                <label class="form-label">Sexo</label>
                <select class="form-select">
                  <option>Macho</option>
                  <option>Hembra</option>
                </select>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-warning w-50 fw-bold">
                <i class="bi bi-check2-circle"></i> Registrar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <p class="mb-0">© 2025 Veterinaria Tessa | Registro de Clientes</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

