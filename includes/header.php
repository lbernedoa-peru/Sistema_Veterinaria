<!-- includes/header.php -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#e4b332;">
      <div class="container">
        <a class="navbar-brand fw-bold" href="inicio.php"><img src="../assets/img/logo_vet02.png" alt="logo_vet" class="img-fluid" style="width:50px; height:50px; object-fit:cover;">Veterinaria Tessa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link <?php echo ($pagina == 'Inicio') ? 'active' : ''; ?>" href="inicio.php"><i class="bi bi-house-heart"></i> Inicio</a></li>
            <li class="nav-item"><a class="nav-link <?php echo ($pagina == 'Buscar') ? 'active' : ''; ?>" href="buscar.php"><i class="bi bi-search-heart"></i> Buscar Cliente</a></li>
            <li class="nav-item"><a class="nav-link <?php echo ($pagina == 'Registrar') ? 'active' : ''; ?>" href="registro.php"><i class="bi bi-person-plus"></i> Registrar Cliente</a></li>
            <li class="nav-item"><a class="nav-link <?php echo ($pagina == 'Historial') ? 'active' : ''; ?>" href="historial.php"><i class="bi bi-journal-text"></i> Historial</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-person-circle"></i> <?php echo $usuario; ?></a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> Cuenta</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="cerrar_sesion.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
  </nav>

