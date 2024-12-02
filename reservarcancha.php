<?php
require_once('conexion.php'); // Incluye la conexión a la base de datos

// Verifica si se ha pasado el ID de la cancha por la URL
if (isset($_GET['id_cancha']) && !empty($_GET['id_cancha'])) {
    $id_cancha = $_GET['id_cancha'];

    // Actualiza la disponibilidad de la cancha a "reservada"
    $sql = "UPDATE canchas SET disponibilidad = 'reservada' WHERE id_cancha = '$id_cancha'";

    if (mysqli_query($conexion, $sql)) {
        // Redirige al usuario con un mensaje de éxito
        header("Location: adcanchas.php?mensaje=Cancha reservada correctamente");
    } else {
        die("Error al actualizar la disponibilidad: " . mysqli_error($conexion));
    }
} else {
    die("ID de la cancha no especificado o es inválido");
}
?>
