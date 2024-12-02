<?php
require_once('conexion.php'); 

// Verifica si se ha pasado el ID de la cancha por la URL
if (isset($_GET['id_cancha']) && !empty($_GET['id_cancha'])) {
    $id_cancha = $_GET['id_cancha'];
    
    // Se obtiene ID asociado a esta cancha
    $result_reserva = mysqli_query($conexion, "SELECT id_reser FROM reservas WHERE id_cancha = '$id_cancha'");
    $reserva = mysqli_fetch_array($result_reserva);
    $id_reser = $reserva['id_reser'] ?? null;

    // Si hay una reserva asociada, eliminamos participantes
    if ($id_reser) {
        $delete_participantes = "DELETE FROM participantes WHERE id_reser = '$id_reser'";
        mysqli_query($conexion, $delete_participantes) or die("Error al eliminar los participantes: " . mysqli_error($conexion));
        
        // eliminamos la reserva asociada a la cancha
        $delete_reserva = "DELETE FROM reservas WHERE id_reser = '$id_reser'";
        mysqli_query($conexion, $delete_reserva) or die("Error al eliminar la reserva: " . mysqli_error($conexion));
    }

    // Obtenemos la imagen de la cancha para eliminarla 
    $result = mysqli_query($conexion, "SELECT imagen FROM canchas WHERE id_cancha = '$id_cancha'");
    $row = mysqli_fetch_array($result);
    $imagen = $row['imagen'];

    // Verificar si la imagen existe y eliminarla de la carpeta rentaimages/
    if (!empty($imagen)) {
        $imagen_path = "rentaimages/" . $imagen;
        if (file_exists($imagen_path)) {
            unlink($imagen_path); 
        }
    }

    // Eliminamos la cancha de la base de datos
    $sql = "DELETE FROM canchas WHERE id_cancha = '$id_cancha'";
    if (mysqli_query($conexion, $sql)) {
        header("Location: adcanchas.php?mensaje=Cancha eliminada correctamente");
        exit;
    } else {
        die("Error al eliminar la cancha: " . mysqli_error($conexion));
    }
} else {
    die("ID de la cancha no especificado o es inválido");
}
?>
