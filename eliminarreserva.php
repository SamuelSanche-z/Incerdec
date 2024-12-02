<?php
require_once('conexion.php');

if (isset($_GET['id'])) {
    $id_reser = intval($_GET['id']);

    // Eliminar los participantes vinculados a la reserva
    $delete_participantes = "DELETE FROM participantes WHERE id_reser = '$id_reser'";
    if (!mysqli_query($conexion, $delete_participantes)) {
        die("Error al eliminar participantes: " . mysqli_error($conexion));
    }

    // Ahora eliminar la reserva
    $delete_reserva = "DELETE FROM reservas WHERE id_reser = '$id_reser'";
    if (mysqli_query($conexion, $delete_reserva)) {
        // Redireccionar con mensaje de éxito
        header("Location: mostrareservas.php?mensaje=Reserva eliminada con éxito.");
        exit();
    } else {
        echo "Error al eliminar la reserva: " . mysqli_error($conexion);
    }
} else {
    echo "ID de reserva no proporcionado.";
}

mysqli_close($conexion);
?>
