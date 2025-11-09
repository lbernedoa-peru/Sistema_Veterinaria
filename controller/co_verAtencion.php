<?php
require_once '../model/mo_verAtencion.php';

// Obtener el ID desde la URL
$id_relacion = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Si no hay ID válido, devolver vacíos
if ($id_relacion <= 0) {
    $info = [];
    $historial = [];
} else {
    $data = obtener_historial_completo($id_relacion);
    $info = isset($data['info']) && is_array($data['info']) ? $data['info'] : [];
    $historial = isset($data['historial']) && is_array($data['historial']) ? $data['historial'] : [];
    // Asumimos que tu consulta también obtiene el tipo_relacion
    $tipo_relacion = isset($info['tipo_relacion']) ? $info['tipo_relacion'] : 'Dueño';

    // Determinar texto según el tipo
    $tituloRelacion = "Información del " . ucfirst($tipo_relacion);
}
