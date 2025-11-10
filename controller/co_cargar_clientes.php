<?php
// controller/co_cargar_clientes.php
header('Content-Type: application/json');

require_once '../model/mo_cargar_clientes.php';

$filtro_buscar = isset($_POST['busqueda']) ? trim($_POST['busqueda']) : '';
$pagina = isset($_POST['pagina']) ? (int)$_POST['pagina'] : 1;
$registros_por_pagina = isset($_POST['registros_por_pagina']) ? (int)$_POST['registros_por_pagina'] : 10;

$clientes = cargar_clientes($filtro_buscar, $pagina, $registros_por_pagina);
$total = contar_total_clientes($filtro_buscar);

echo json_encode([
    'clientes' => $clientes,
    'total' => $total,
    'total_paginas' => ceil($total / $registros_por_pagina)
]);
?>