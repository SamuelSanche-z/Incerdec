<?php 
include('conexion.php');

$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

// Comprobar si se subió un archivo
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTemp = $_FILES['imagen']['tmp_name'];

    // Definir el destino del archivo (por ejemplo, en una carpeta 'uploads/')
    $imagenDestino = "uploads/" . basename($imagenNombre);

    // Mover la imagen subida a la carpeta destino
    if (move_uploaded_file($imagenTemp, $imagenDestino)) {
        // Si la imagen se subió correctamente, actualizar el campo 'imagen' en la base de datos
        $query = "UPDATE usuarios SET cedula='$cedula', nombre='$nombre', correo='$correo', telefono='$telefono', imagen='$imagenDestino' WHERE id='$id'";
    } else {
        echo "Error al subir la imagen.";
        exit;
    }
} else {
    // Si no se subió una imagen, actualizar solo los otros campos
    $query = "UPDATE usuarios SET cedula='$cedula', nombre='$nombre', correo='$correo', telefono='$telefono' WHERE id='$id'";
}

// Ejecutar la consulta
if (mysqli_query($conexion, $query)) {
    header("location: perfil.php"); // Redirigir a la página de perfil
    exit; // Terminar el script después de la redirección
} else {
    echo "Hubo un error al actualizar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
