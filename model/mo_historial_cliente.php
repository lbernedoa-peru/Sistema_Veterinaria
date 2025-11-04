<?php
// model/mo_historial_cliente.php
require_once "../config/Database.php";

function cargar_historial($filtro_buscar = '') {
    $database = new Database();
    $conn = $database->getConnection();

    if ($conn === null) {
        error_log("Error: No se pudo establecer la conexión a la base de datos");
        return [];
    }

    $query = "SELECT 
      atc.id_atencion AS Id,
      atc.f_registro AS Fecha_registro,
      d.p_nombre AS Nombre,
      d.dni AS Dni,
      m.nombre AS N_Mascota,
      atc.tipo_servicio AS Tratamiento,
      atc.descripcion AS Motivo,
      atc.id_empleado AS Veterinario,
      atc.costo AS Costo
      FROM atencion atc
      INNER JOIN cliente c on atc.id_cliente = c.id_cliente
      INNER JOIN dueño d ON atc.id_cliente = d.id_dueño
      INNER JOIN mascota m ON atc.id_cliente = m.id_mascota
      INNER JOIN empleado e ON atc.id_empleado = e.id_empleado
      ";

    if (!empty($filtro_buscar)) {
        $filtro_buscar = trim(str_replace("'", "''", $filtro_buscar));
        $query .= " WHERE d.p_nombre LIKE :filtro OR d.dni LIKE :filtro";
    }

    try {
        $stmt = $conn->prepare($query);
        if (!empty($filtro_buscar)) {
            $stmt->bindValue(':filtro', "%$filtro_buscar%", PDO::PARAM_STR);
        }
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    } catch (PDOException $e) {
        error_log("Error en la consulta: " . $e->getMessage() . " - Query: " . $query);
        return [];
    }
}