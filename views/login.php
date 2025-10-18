<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  // ⚠️ Aquí puedes conectar con tu base de datos luego
  if ($usuario === 'admin' && $password === '1234') {
    $_SESSION['usuario'] = $usuario;
    header('Location: inicio.php');
    exit;
  } else {
    $error = "Usuario o contraseña incorrectos.";
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include('../includes/head_login.php'); ?>
</head>
<body>
  <div class="login-card">
    <div class="logo mb-3">
      <img src="../assets/img/logo_vet.png" alt="logo_vet" class="img-fluid" style="width:200px; height:200px; object-fit:cover;">
    </div>
    <p class="text-muted mb-4">Accede a tu cuenta</p>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST">
      <div class="mb-3 text-start">
        <label for="usuario" class="form-label"><i class="bi bi-person-circle"></i> Usuario</label>
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingresa tu usuario" required>
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label"><i class="bi bi-lock-fill"></i> Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
      </div>

      <button type="submit" class="btn btn-login w-100 mt-3">
        <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
      </button>
    </form>
    <p class="mt-4 mb-0 text-muted">
      <a href="https://wa.link/j2r1aq" style="color:#999999;">¿Olvidaste tu contraseña?</a>
    </p>

  </div>
</body>
</html>
