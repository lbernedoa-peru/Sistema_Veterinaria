<?php
require_once '../model/mo_verAtencion.php';

// Obtener el ID desde la URL
$id_relacion = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Configuración de paginación
$registros_por_pagina = 5; // Puedes cambiar este número
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina_actual < 1) $pagina_actual = 1;

// Si no hay ID válido, devolver vacíos
if ($id_relacion <= 0) {
    $info = [];
    $historial = [];
    $total_registros = 0;
    $total_paginas = 0;
    $tituloRelacion = "Información del Dueño";
} else {
    $data = obtener_historial_completo($id_relacion, $pagina_actual, $registros_por_pagina);
    $info = isset($data['info']) && is_array($data['info']) ? $data['info'] : [];
    $historial = isset($data['historial']) && is_array($data['historial']) ? $data['historial'] : [];
    
    // Contar total de registros para la paginación
    $total_registros = contar_total_atenciones($id_relacion);
    $total_paginas = ceil($total_registros / $registros_por_pagina);
    
    // Determinar texto según el tipo
    $tipo_relacion = isset($info['tipo_relacion']) ? $info['tipo_relacion'] : 'Dueño';
    $tituloRelacion = "Información del " . ucfirst($tipo_relacion);
}