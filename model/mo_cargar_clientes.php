<?php
// model/mo_cargar_clientes.php
require_once "../config/Database.php";

function cargar_clientes($filtro_buscar = '', $pagina = 1, $registros_por_pagina = 10) {
    $database = new Database();
    $conn = $database->getConnection();

    if ($conn === null) {
        error_log("Error: No se pudo establecer la conexión a la base de datos");
        return [];
    }

    $inicio = ($pagina - 1) * $registros_por_pagina;

    $query = "SELECT 
                    c.id_relacion AS Id,
                    d.p_nombre AS Nombre,
                    d.p_apellido AS Apellido,
                    d.dni AS Dni,
                    d.telefono AS Telefono,
                    c.tipo_relacion AS Relacion,
                    m.nombre AS N_Mascota
                FROM mascota_dueño c
                INNER JOIN dueño d ON c.id_dueño = d.id_dueño
                INNER JOIN mascota m ON c.id_mascota = m.id_mascota
            ";

    if (!empty($filtro_buscar)) {
        $filtro_buscar = trim(str_replace("'", "''", $filtro_buscar));
        $query .= " WHERE d.p_nombre LIKE :filtro OR d.dni LIKE :filtro";
    }

    $query .= " LIMIT :inicio, :registros_por_pagina";

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
function contar_total_clientes($filtro_buscar = '') {
    $database = new Database();
    $conn = $database->getConnection();

    if ($conn === null) {
        return 0;
    }

    $query = "SELECT COUNT(*) as total
                FROM mascota_dueño c
                INNER JOIN dueño d ON c.id_dueño = d.id_dueño
                INNER JOIN mascota m ON c.id_mascota = m.id_mascota
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
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    } catch (PDOException $e) {
        error_log("Error al contar registros: " . $e->getMessage());
        return 0;
    }
}