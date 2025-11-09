<?php
require_once "../config/Database.php";

function obtener_historial_completo($id_relacion) {
    try {
        $database = new Database();
        $conn = $database->getConnection();

        // ✅ Datos del dueño y mascota
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
                        m.sexo
                    FROM mascota_dueño c
                    INNER JOIN dueño d ON c.id_dueño = d.id_dueño
                    INNER JOIN mascota m ON c.id_mascota = m.id_mascota
                    WHERE c.id_relacion = :id_relacion";

        $stmtInfo = $conn->prepare($infoQuery);
        $stmtInfo->bindValue(':id_relacion', $id_relacion, PDO::PARAM_INT);
        $stmtInfo->execute();
        $info = $stmtInfo->fetch(PDO::FETCH_ASSOC) ?: [];

        // ✅ Historial del perro
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
                        ORDER BY a.f_registro DESC";

        $stmtHist = $conn->prepare($historialQuery);
        $stmtHist->bindValue(':id_relacion', $id_relacion, PDO::PARAM_INT);
        $stmtHist->execute();
        $historial = $stmtHist->fetchAll(PDO::FETCH_ASSOC) ?: [];

        return ["info" => $info, "historial" => $historial];

    } catch (PDOException $e) {
        // En caso de error de conexión o SQL
        error_log("Error en obtener_historial_completo: " . $e->getMessage());
        return ["info" => [], "historial" => []];
    }
}
