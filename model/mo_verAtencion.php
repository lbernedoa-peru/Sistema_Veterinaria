<?php
require_once "../config/Database.php";

function obtener_historial_completo($id_relacion, $pagina = 1, $registros_por_pagina = 10) {
    try {
        $database = new Database();
        $conn = $database->getConnection();

        // ✅ Datos del dueño y mascota (sin cambios)
        $infoQuery = "SELECT 
                        d.dni AS dni,
                        d.p_nombre,
                        d.p_apellido, 
                        d.correo_electronico, 
                        d.telefono, 
                        d.direccion,
                        m.id_mascota,
                        m.nombre AS mascota,
                        m.especie,
                        m.raza,
                        m.edad,
                        m.sexo,
                        c.tipo_relacion
                    FROM mascota_dueño c
                    INNER JOIN dueño d ON c.id_dueño = d.id_dueño
                    INNER JOIN mascota m ON c.id_mascota = m.id_mascota
                    WHERE c.id_relacion = :id_relacion";

        $stmtInfo = $conn->prepare($infoQuery);
        $stmtInfo->bindValue(':id_relacion', $id_relacion, PDO::PARAM_INT);
        $stmtInfo->execute();
        $info = $stmtInfo->fetch(PDO::FETCH_ASSOC) ?: [];

        // ✅ Si encontramos la mascota, buscamos TODAS sus atenciones
        $historial = [];
        if (!empty($info) && isset($info['id_mascota'])) {
            $inicio = ($pagina - 1) * $registros_por_pagina;

            $historialQuery = "SELECT 
                                a.id_atencion,
                                a.f_registro,
                                a.tipo_servicio,
                                a.descripcion,
                                a.costo,
                                e.p_nombre AS nom_empleado,
                                e.p_apellido AS ape_empleado,
                                d.p_nombre,
                                d.p_apellido,
                                md.tipo_relacion
                            FROM atencion a
                            INNER JOIN empleado e ON a.id_empleado = e.id_empleado
                            INNER JOIN mascota_dueño md ON a.id_relacion = md.id_relacion
                            INNER JOIN dueño d ON md.id_dueño = d.id_dueño
                            WHERE md.id_mascota = :id_mascota
                            ORDER BY a.f_registro DESC
                            LIMIT :inicio, :registros_por_pagina";

            $stmtHist = $conn->prepare($historialQuery);
            $stmtHist->bindValue(':id_mascota', $info['id_mascota'], PDO::PARAM_INT);
            $stmtHist->bindValue(':inicio', $inicio, PDO::PARAM_INT);
            $stmtHist->bindValue(':registros_por_pagina', $registros_por_pagina, PDO::PARAM_INT);
            $stmtHist->execute();
            $historial = $stmtHist->fetchAll(PDO::FETCH_ASSOC) ?: [];
        }

        return ["info" => $info, "historial" => $historial];

    } catch (PDOException $e) {
        error_log("Error en obtener_historial_completo: " . $e->getMessage());
        return ["info" => [], "historial" => []];
    }
}

// ✅ Contar TODAS las atenciones de la mascota
function contar_total_atenciones($id_relacion) {
    try {
        $database = new Database();
        $conn = $database->getConnection();

        // Primero obtenemos el id_mascota
        $queryMascota = "SELECT id_mascota FROM mascota_dueño WHERE id_relacion = :id_relacion";
        $stmtMascota = $conn->prepare($queryMascota);
        $stmtMascota->bindValue(':id_relacion', $id_relacion, PDO::PARAM_INT);
        $stmtMascota->execute();
        $resultado = $stmtMascota->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) return 0;

        // Contamos todas las atenciones de esa mascota
        $query = "SELECT COUNT(*) as total
                  FROM atencion a
                  INNER JOIN mascota_dueño md ON a.id_relacion = md.id_relacion
                  WHERE md.id_mascota = :id_mascota";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_mascota', $resultado['id_mascota'], PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];

    } catch (PDOException $e) {
        error_log("Error al contar atenciones: " . $e->getMessage());
        return 0;
    }
}