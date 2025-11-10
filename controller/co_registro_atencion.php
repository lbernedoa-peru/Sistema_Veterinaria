<?php
require_once "../model/mo_registro_atencion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btnregistro'])) {

    $dni = trim($_POST['dni'] ?? '');
    $n_mascota = trim($_POST['n_mascota'] ?? '');
    $tipo_servicio = trim($_POST['tipo_servicio'] ?? '');
    $costo = trim($_POST['costo'] ?? '');
    $motivo = trim($_POST['motivo'] ?? '');

    if (empty($dni) || empty($n_mascota) || empty($tipo_servicio) || empty($costo) || empty($motivo)) {
        $mensaje = "Todos los campos son obligatorios.";
        $alerta = "warning";
    } elseif (!preg_match('/^\d{8}$/', $dni)) {
        $mensaje = "El DNI debe tener 8 dígitos.";
        $alerta = "warning";
    } elseif ($costo < 0) {
        $mensaje = "El costo no puede ser negativo.";
        $alerta = "warning";
    } else {
        $datos = [
            'dni' => $dni,
            'n_mascota' => $n_mascota,
            'tipo_servicio' => $tipo_servicio,
            'costo' => $costo,
            'motivo' => $motivo
        ];

        $exito = registrar_atencion($datos);

        if ($exito === true) {
            $mensaje = "¡ATENCIÓN REGISTRADA CON ÉXITO!";
            $alerta = "success";
        } elseif ($exito === "cliente_no_existe") {
            $mensaje = "No se encontró al dueño o la mascota no le pertenece.";
            $alerta = "danger";
        } else {
            $mensaje = "Error al guardar: $exito";
            $alerta = "danger";
        }
    }
}
?>