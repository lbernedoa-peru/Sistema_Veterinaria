<?php
require_once "../model/mo_registro_atencion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btnregistro'])) {
    
    $datos_atencion = [
        'dni' => $_POST['dni'] ?? '',
        'n_mascota' => $_POST['n_mascota'] ?? '',
        'veterinario' => $_POST['veterinario'] ?? '',
        'tipo_servicio' => $_POST['tipo_servicio'] ?? '',
        'costo' => $_POST['costo'] ?? '',
        'motivo' => $_POST['motivo'] ?? '',
    ];

    // Ejecutar registro en el modelo
    $exito = registrar_atencion($datos_atencion);

    if ($exito === true) {
        $mensaje = "✅ Atención registrada exitosamente.";
        $alerta = "success";
    } elseif ($exito === "dni_no_encontrado") {
        $mensaje = "⚠️ El DNI ingresado no está registrado en el sistema.";
        $alerta = "warning";
    } elseif ($exito === "mascota_no_valida") {
        $mensaje = "⚠️ La mascota no pertenece al dueño con ese DNI.";
        $alerta = "info";
    } else {
        $mensaje = "❌ Error al registrar atención.";
        $alerta = "danger";
    }
}
?>
