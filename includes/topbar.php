<div class="topbar">
  <div>
    <span class="fw-bold">👋 Bienvenido, <?php echo $usuario ?? "Giuliana"; ?></span>
  </div>
  <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
      <i class="bi bi-person-circle"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
      <li><a class="dropdown-item" href="#"><i class="bi bi-person-lines-fill"></i> Cuenta</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item text-danger" href="../index.php"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a></li>
    </ul>
  </div>
</div>
