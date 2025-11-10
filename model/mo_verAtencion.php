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

        // ✅ Historial con LIMIT para paginación
        $inicio = ($pagina - 1) * $registros_por_pagina;

        $historialQuery = "SELECT 
                            a.id_atencion,
                            a.f_registro,
                            a.tipo_servicio,
                            a.descripcion,
                            a.costo,
                            e.p_nombre AS nom_empleado,
                            e.p_apellido AS ape_empleado
                        FROM atencion a
                        INNER JOIN empleado e ON a.id_empleado = e.id_empleado
                        WHERE a.id_relacion = :id_relacion
                        ORDER BY a.f_registro DESC
                        LIMIT :inicio, :registros_por_pagina";

        $stmtHist = $conn->prepare($historialQuery);
        $stmtHist->bindValue(':id_relacion', $id_relacion, PDO::PARAM_INT);
        $stmtHist->bindValue(':inicio', $inicio, PDO::PARAM_INT);
        $stmtHist->bindValue(':registros_por_pagina', $registros_por_pagina, PDO::PARAM_INT);
        $stmtHist->execute();
        $historial = $stmtHist->fetchAll(PDO::FETCH_ASSOC) ?: [];

        return ["info" => $info, "historial" => $historial];

    } catch (PDOException $e) {
        error_log("Error en obtener_historial_completo: " . $e->getMessage());
        return ["info" => [], "historial" => []];
    }
}

// ✅ Nueva función para contar el total de atenciones
function contar_total_atenciones($id_relacion) {
    try {
        $database = new Database();
        $conn = $database->getConnection();

        $query = "SELECT COUNT(*) as total
                  FROM atencion
                  WHERE id_relacion = :id_relacion";

        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id_relacion', $id_relacion, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];

    } catch (PDOException $e) {
        error_log("Error al contar atenciones: " . $e->getMessage());
        return 0;
    }
}