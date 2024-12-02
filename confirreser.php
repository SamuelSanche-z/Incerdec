<?php
require_once('conexion.php');

// Obtener el ID de la reserva desde la URL
$id_reser = $_GET['id_reser'] ?? null;

if ($id_reser) {
    // Actualizar el estado de la reserva a 'confirmado'
    $query = "UPDATE reservas SET estado = 'confirmada' WHERE id_reser = $id_reser";
    if (mysqli_query($conexion, $query)) {
        // Redirigir con un mensaje de éxito
        header("Location: mostrareservas.php?mensaje=Reserva confirmada exitosamente.");
    } else {
        // Redirigir con un mensaje de error si ocurre un problema
        header("Location: mostrareservas.php?mensaje=Error al confirmar la reserva.");
    }
} else {
    // Redirigir con un mensaje de error si no se proporciona el ID de reserva
    header("Location: mostrareservas.php?mensaje=ID de reserva no proporcionado.");
}
exit;
