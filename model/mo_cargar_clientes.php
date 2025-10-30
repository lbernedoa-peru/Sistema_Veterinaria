<?php
// model/mo_cargar_clientes.php
require_once "../config/Database.php";

function cargar_clientes($filtro_buscar = '') {
    $database = new Database();
    $conn = $database->getConnection();

    if ($conn === null) {
        error_log("Error: No se pudo establecer la conexión a la base de datos");
        return [];
    }

    $query = "SELECT 
                    c.id_cliente AS Id,
                    d.p_nombre AS Nombre,
                    d.dni AS Dni,
                    d.telefono AS Telefono,
                    m.nombre AS N_Mascota
                FROM cliente c
                INNER JOIN dueño d ON c.id_dueño = d.id_dueño
                INNER JOIN mascota m ON c.id_mascota = m.id_mascota";

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