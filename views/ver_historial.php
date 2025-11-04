<?php
// views/ver_historial.php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
$pagina = "";

include('../config/Database.php');
include('../controller/co_registrar_cliente.php');
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

  <!-- CONTENIDO -->
<main class="container my-5 flex-grow-1">
  <div class="card shadow p-4 border-0">

    <div class="row">
  
      <!-- Información Dueño -->
      <div class="col-12 col-md-6">
        <h5 class="text-warning"><i class="bi bi-person-lines-fill"></i> Información del Dueño</h5>
        <table class="table table-bordered mt-3">
          <tr>
            <th>
              Dni
            </th>
            <!-- Mostrara todos los dueños asignados segun 
             se seleccione cambiara los datos del dueño 
             datos del perro seguiran msotrandose-->
            <td>
              <select class="form-select" name="id_dueño" required>
                <?php foreach ($duenos as $d): ?>
                  <option value="<?php echo $d['id_dueño']; ?>">
                    <?php echo $d['dni'] . " - " . $d['nombres'] . " " . $d['p_apellido']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr><th>Nombres</th><td>Ana López</td></tr>
          <tr><th>Apellidos</th><td>Ana López</td></tr>
          <tr><th>Correo</th><td>ana@email.com</td></tr>
          <tr><th>Teléfono</th><td>987654321</td></tr>
          <tr><th>Dirección<td>Fiscal s/n Km 1048</td></th></tr>
        </table>
      </div>
      <!-- Información Mascota -->
      <div class="col-12 col-md-6">
        <h5 class="text-warning"><i class="bi bi-paw"></i> Información de la Mascota</h5>
        <table class="table table-bordered mt-3">
          <tr><th>Nombre</th><td>Rocky</td></tr>
          <tr><th>Especie</th><td>Perro</td></tr>
          <tr><th>Raza</th><td>Labrador</td></tr>
          <tr><th>Edad</th><td>3 años</td></tr>
          <tr><th>Sexo</th><td>Macho</td></tr>
        </table>
      </div>
    </div>

    <!-- Detalles de Atención -->
    <!-- Mostrar la ultima atención -->
    <div class="col-12 mt-4">
      <h5 class="text-warning"><i class="bi bi-file-medical"></i> Detalles de la Atención</h5>
      <table class="table table-bordered mt-3">
        <tr><th>Fecha</th><td>2025-10-10</td></tr>
        <tr><th>Motivo</th><td>Vacunación anual</td></tr>
        <tr><th>Tratamiento</th><td>Vacuna antirrábica</td></tr>
        <tr><th>Veterinario</th><td>Dr. Ramírez</td></tr>
        <tr><th>Observaciones</th><td>Mascota en buen estado general.</td></tr>
      </table>
    </div>

    <div class="text-center mt-4">
      <a href="buscar.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
      <a href="editar_historial.php" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Editar</a>
      <a href="#" class="btn btn-warning"><i class="bi bi-pencil"></i> Nuevo Dueño</a>
    </div>

  </div>
</main>


  <!-- FOOTER -->
  <footer>
    <?php include('../includes/footer.php'); ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
