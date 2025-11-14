<?php
// model/mo_historial_cliente.php
require_once "../config/Database.php";

function cargar_historial($filtro_buscar = '', $pagina = 1, $registros_por_pagina = 10) {
    $database = new Database();
    $conn = $database->getConnection();

    if ($conn === null) {
        error_log("Error: No se pudo establecer la conexión a la base de datos");
        return [];
    }

    $inicio = ($pagina - 1) * $registros_por_pagina;

    $query = "SELECT 
      atc.id_atencion   AS Id,
      atc.f_registro    AS Fecha_registro,
      COALESCE(d.p_nombre, 'Sin datos')  AS Nombre,
      COALESCE(d.dni, 'Sin DNI')         AS Dni,
      COALESCE(m.nombre, 'Sin mascota')  AS N_Mascota,
      atc.tipo_servicio AS Tratamiento,
      atc.descripcion   AS Motivo,
      COALESCE(e.p_nombre, 'Sin asignar') AS Veterinario,
      atc.costo         AS Costo
      FROM atencion atc
      LEFT JOIN mascota_dueño md ON atc.id_relacion = md.id_relacion
      LEFT JOIN mascota m ON md.id_mascota = m.id_mascota
      LEFT JOIN dueño d ON md.id_dueño = d.id_dueño
      LEFT JOIN empleado e ON atc.id_empleado = e.id_empleado
      ";

    if (!empty($filtro_buscar)) {
        $filtro_buscar = trim(str_replace("'", "''", $filtro_buscar));
        $query .= " WHERE d.p_nombre LIKE :filtro OR d.dni LIKE :filtro OR m.nombre LIKE :filtro";
    }

    $query .= " ORDER BY atc.f_registro ASC LIMIT :inicio, :registros_por_pagina";

    try {
        $stmt = $conn->prepare($query);
        if (!empty($filtro_buscar)) {
            $stmt->bindValue(':filtro', "%$filtro_buscar%", PDO::PARAM_STR);
        }
        $stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
        $stmt->bindValue(':registros_por_pagina', $registros_por_pagina, PDO::PARAM_INT);
        $stmt->execute();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    } catch (PDOException $e) {
        error_log("Error en la consulta: " . $e->getMessage() . " - Query: " . $query);
        return [];
    }
}

// Nueva función para contar el total de registros
function contar_total_historial($filtro_buscar = '') {
    $database = new Database();
    $conn = $database->getConnection();

    if ($conn === null) {
        return 0;
    }

    $query = "SELECT COUNT(*) as total
              FROM atencion atc
              LEFT JOIN mascota_dueño md ON atc.id_relacion = md.id_relacion
              LEFT JOIN mascota m ON md.id_mascota = m.id_mascota
              LEFT JOIN dueño d ON md.id_dueño = d.id_dueño
              LEFT JOIN empleado e ON atc.id_responsable = e.id_empleado
            ";

    if (!empty($filtro_buscar)) {
        $filtro_buscar = trim(str_replace("'", "''", $filtro_buscar));
        $query .= " WHERE d.p_nombre LIKE :filtro OR d.dni LIKE :filtro OR m.nombre LIKE :filtro";
    }

    try {
        $stmt = $conn->prepare($query);
        if (!empty($filtro_buscar)) {
            $stmt->bindValue(':filtro', "%$filtro_buscar%", PDO::PARAM_STR);
        }
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    } catch (PDOException $e) {
        error_log("Error al contar registros: " . $e->getMessage());
        return 0;
    }
}