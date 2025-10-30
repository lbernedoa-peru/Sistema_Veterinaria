<?php
require_once "../model/mo_registrar_cliente.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btnregistro'])) {
    $datos_dueño = [
        'p_nombre' => $_POST['p_nombre'] ?? '',
        's_nombre' => $_POST['s_nombre'] ?? '',
        'p_apellido' => $_POST['p_apellido'] ?? '',
        'm_apellido' => $_POST['m_apellido'] ?? '',
        'dni' => $_POST['dni'] ?? '',
        'telefono' => $_POST['telefono'] ?? '',
        'correo_electronico' => $_POST['correo_electronico'] ?? '',
        'direccion' => $_POST['direccion'] ?? ''
    ];

    $datos_mascota = [
        'nombre' => $_POST['nombre_mascota'] ?? '',
        'especie' => $_POST['especie'] ?? '',
        'raza' => $_POST['raza'] ?? '',
        'edad' => $_POST['edad'] ?? '',
        'sexo' => $_POST['sexo'] ?? '',
    ];

    // validadr el registro 
    $exito = registrar_cliente($datos_dueño, $datos_mascota);

    if ($exito === true) {
        $mensaje = "Cliente registrado exitosamente.";
        $alerta = "success";
    } elseif ($exito === "dni_existente") {
        $mensaje = "El DNI ingresado ya está registrado.";
        $alerta = "warning";
    } else {
        $mensaje = "Error al registrar cliente.";
        $alerta = "danger";
    }

}
?>

