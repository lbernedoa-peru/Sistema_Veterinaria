<?php
session_start();

// Si el usuario ya inició sesión, lo mandamos al inicio del sistema
if (isset($_SESSION['usuario'])) {
  header("Location: views/inicio.php");
  exit;
} else {
  // Si no hay sesión, lo enviamos al login
  header("Location: views/login.php");
  exit;
}
?>


