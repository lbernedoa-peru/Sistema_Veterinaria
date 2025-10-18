<?php
// views/inicio.php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "Registrar";
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <?php include ('../includes/head.php'); ?>
</head>
<body>
    <header>
        <?php include ('../includes/header.php'); ?>
    </header>
    <!-- CONTENIDO REGISTRO -->
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
    <footer>
    <?php include('../includes/footer.php'); ?>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>