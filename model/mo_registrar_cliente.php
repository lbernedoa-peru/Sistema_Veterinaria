<?php
require_once "../config/Database.php";

function registrar_cliente($datos_dueño, $datos_mascota) {
    $conexion = new Database();
    $conn = $conexion->getConnection();

    try {
        $conn->beginTransaction();
        
        // Verificar si el DNI ya existe
        $sql_check_dni = "SELECT COUNT(*) FROM dueño WHERE dni = ?";
        $stmt_check = $conn->prepare($sql_check_dni);
        $stmt_check->execute([$datos_dueño['dni']]);
        if ($stmt_check->fetchColumn() > 0) {
            return "dni_existente";
        }

        // Insertar dueño
        $sql_dueño = "INSERT INTO dueño 
            (p_nombre, s_nombre, p_apellido, m_apellido, dni, telefono, correo_electronico, direccion)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_dueño = $conn->prepare($sql_dueño);
        $stmt_dueño->execute([
            $datos_dueño['p_nombre'],
            $datos_dueño['s_nombre'],
            $datos_dueño['p_apellido'],
            $datos_dueño['m_apellido'],
            $datos_dueño['dni'],
            $datos_dueño['telefono'],
            $datos_dueño['correo_electronico'],
            $datos_dueño['direccion']
        ]);

        $id_dueño = $conn->lastInsertId();

        // Insertar mascota
        $sql_mascota = "INSERT INTO mascota (nombre, especie, raza, edad, sexo)
                        VALUES (?, ?, ?, ?, ?)";
        $stmt_mascota = $conn->prepare($sql_mascota);
        $stmt_mascota->execute([
            $datos_mascota['nombre'],
            $datos_mascota['especie'],
            $datos_mascota['raza'],
            $datos_mascota['edad'],
            $datos_mascota['sexo']
        ]);

        $id_mascota = $conn->lastInsertId();

        // Insertar cliente (relación)
        $sql_cliente = "INSERT INTO mascota_dueño (id_mascota, id_dueño) VALUES (?, ?)";
        $stmt_cliente = $conn->prepare($sql_cliente);
        $stmt_cliente->execute([$id_mascota, $id_dueño]);

        $conn->commit();
        return true;
    } catch (PDOException $e) {
        $conn->rollBack();
        error_log("Error en registrar_cliente: " . $e->getMessage());
        return false;
    }
}
?>
