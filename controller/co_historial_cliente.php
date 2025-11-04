<?php
// controller/co_historial_cliente.php
header('Content-Type: application/json');

require_once '../model/mo_historial_cliente.php';

$filtro_buscar = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';

$clientes = cargar_historial($filtro_buscar);

echo json_encode($clientes);
?>