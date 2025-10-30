<?php
// controller/co_cargar_clientes.php
header('Content-Type: application/json');

require_once '../model/mo_cargar_clientes.php';

$filtro_buscar = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';

$clientes = cargar_clientes($filtro_buscar);

echo json_encode($clientes);
?>