<?php
require_once "../config/Database.php";

function registrar_atencion($datos_atencion) {
    session_start();
    
    if (!isset($_SESSION['id_usuario'])) {
        return false; // seguridad
    }

    $id_empleado = $_SESSION['id_usuario'];

    $conexion = new Database();
    $conn = $conexion->getConnection();

    try {
        // 1️⃣ Verificar si existe cliente con mascota
        $sql_cliente = "SELECT c.id_cliente FROM cliente c
                        INNER JOIN mascota m ON c.id_mascota = m.id_mascota
                        INNER JOIN dueño d ON c.id_dueño = d.id_dueño
                        WHERE d.dni = ? AND m.nombre = ?";
        $stmt = $conn->prepare($sql_cliente);
        $stmt->execute([$datos_atencion['dni'], $datos_atencion['n_mascota']]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$cliente) {
            return "cliente_no_existe";
        }

        $id_cliente = $cliente['id_cliente'];

        // 2️⃣ Insertar en atención
        $sql_insert = "INSERT INTO atencion 
        (id_empleado, id_cliente, f_registro, tipo_servicio, descripcion, costo)
        VALUES (?, ?, NOW(), ?, ?, ?)";
        
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->execute([
            $id_empleado,
            $id_cliente,
            $datos_atencion['tratamiento'],
            $datos_atencion['motivo'],
            $datos_atencion['costo']
        ]);

        return true;
    } 
    catch (PDOException $e) {
        error_log("ERROR: " . $e->getMessage());
        return false;
    }
}
?>
