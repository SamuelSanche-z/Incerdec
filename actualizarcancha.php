<?php
require_once('conexion.php'); // Incluye la conexión a la base de datos

// Verifica si se ha pasado el ID de la cancha por la URL
if (isset($_POST['id_cancha']) && !empty($_POST['id_cancha'])) {
    $id_cancha = $_POST['id_cancha'];
} else {
    die("ID de la cancha no especificado o es inválido");
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$capacidad = $_POST['capacidad'];
$horario_apertura = $_POST['horario_apertura'];
$horario_cierre = $_POST['horario_cierre'];
$disponibilidad = $_POST['disponibilidad'];
$descripcion = $_POST['descripcion'];

// Manejo de la imagen
$imagen = $_FILES['imagen'];
$imagen_nombre = "";  // Variable para almacenar el nombre de la nueva imagen

// Verificar si se ha subido una nueva imagen
if ($imagen['name'] != "") {
    // Eliminar la imagen anterior de la carpeta rentaimages/
    $result = mysqli_query($conexion, "SELECT imagen FROM canchas WHERE id_cancha = '$id_cancha'");
    $row = mysqli_fetch_array($result);
    $imagen_antigua = $row['imagen'];
    if (!empty($imagen_antigua)) {
        $imagen_antigua_path = "rentaimages/" . $imagen_antigua;
        if (file_exists($imagen_antigua_path)) {
            unlink($imagen_antigua_path); // Eliminar la imagen antigua
        }
    }

    // Subir la nueva imagen
    $imagen_nombre = $imagen['name'];
    $imagen_temp = $imagen['tmp_name'];
    $imagen_destino = "rentaimages/" . $imagen_nombre;

    if (move_uploaded_file($imagen_temp, $imagen_destino)) {
        // Si la imagen se sube correctamente, actualizamos la ruta en la base de datos
    } else {
        die("Error al subir la imagen.");
    }
} else {
    // Si no se sube una nueva imagen, mantener la imagen actual
    $result = mysqli_query($conexion, "SELECT imagen FROM canchas WHERE id_cancha = '$id_cancha'");
    $row = mysqli_fetch_array($result);
    $imagen_nombre = $row['imagen']; // Mantener la imagen antigua si no se subió una nueva
}

// Actualizar los datos de la cancha en la base de datos
$sql = "UPDATE canchas SET
            nombre = '$nombre',
            tipo = '$tipo',
            capacidad = '$capacidad',
            horario_apertura = '$horario_apertura',
            horario_cierre = '$horario_cierre',
            disponibilidad = '$disponibilidad',
            descripcion = '$descripcion',
            imagen = '$imagen_nombre'
        WHERE id_cancha = '$id_cancha'";

if (mysqli_query($conexion, $sql)) {
    header("Location: adcanchas.php?mensaje=Cancha actualizada correctamente");
} else {
    die("Error al actualizar la cancha: " . mysqli_error($conexion));
}

?>
