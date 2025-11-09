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
    //se hizo cambio  de cliente a nombre de tabla mascota_dueño
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