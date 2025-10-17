<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Veterinaria Tessa</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #fdf8e1, #e4b33233); /* dorado suave */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      padding: 40px;
      width: 100%;
      max-width: 380px;
      text-align: center;
    }
    .login-card h3 {
      color: #e4b332;
      font-weight: bold;
    }
    .form-control {
      border-radius: 10px;
      border-color: #999999;
    }
    .form-control:focus {
      border-color: #e4b332;
      box-shadow: 0 0 5px #e4b332aa;
    }
    .btn-login {
      background-color: #e4b332;
      color: #fff;
      border-radius: 10px;
      font-weight: 600;
    }
    .btn-login:hover {
      background-color: #caa12a;
    }
    .logo {
      font-size: 3rem;
      color: #e4b332;
    }
    .text-muted {
      color: #999999 !important;
    }
    a {
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <div class="logo mb-3">
      <img src="../img/logo_vet.png" alt="logo_vet.png" class="img-fluid " style="width:300px; height:300px; object-fit:cover;">
    </div>
    <p class="text-muted mb-4">Accede a tu cuenta</p>

    <form action="main.php" method="POST">
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
      <a href="recuperar_contraseña.php" style="color:#999999;">¿Olvidaste tu contraseña?</a>
    </p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
