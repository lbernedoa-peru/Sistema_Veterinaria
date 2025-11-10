<?php
require_once "../config/Database.php";

function registrar_atencion($datos_atencion) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Veterinario fijo para pruebas
    $id_empleado = 1;

    $db = new Database();
    $conn = $db->getConnection();

    try {
        $sql = "SELECT md.id_relacion, md.id_dueño
                FROM mascota_dueño md
                INNER JOIN mascota m ON md.id_mascota = m.id_mascota
                INNER JOIN dueño d ON md.id_dueño = d.id_dueño
                WHERE d.dni = ? AND m.nombre = ? AND md.tipo_relacion = 'Dueño'
                LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$datos_atencion['dni'], $datos_atencion['n_mascota']]);
        $rel = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$rel) return "cliente_no_existe";

        $sql_insert = "INSERT INTO atencion 
                       (id_empleado, id_relacion, id_responsable, tipo_servicio, descripcion, costo)
                       VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql_insert);
        return $stmt->execute([
            $id_empleado,
            $rel['id_relacion'],
            $rel['id_dueño'],
            $datos_atencion['tipo_servicio'],
            $datos_atencion['motivo'],
            $datos_atencion['costo']
        ]) ? true : "insert_fallido";

    } catch (PDOException $e) {
        error_log("ERROR: " . $e->getMessage());
        return "error_bd: " . $e->getMessage();
    }
}
?>