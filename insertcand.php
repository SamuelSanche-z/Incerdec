<?php
include('conexion.php'); // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
    $disponibilidad = mysqli_real_escape_string($conexion, 
        $_POST['disponibilidad'] == 'disponible' ? 'disponible' : 
        ($_POST['disponibilidad'] == 'reservada' ? 'reservada' : 'mantenimiento')
    );
    $capacidad = mysqli_real_escape_string($conexion, $_POST['capacidad']);
    $horario_apertura = mysqli_real_escape_string($conexion, $_POST['horario_apertura']);
    $horario_cierre = mysqli_real_escape_string($conexion, $_POST['horario_cierre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    // Procesar la imagen
    $imagen = $_FILES['imagen']['name'];
    $ruta_imagen = "rentaimages/" . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen);

    // Insertar en la base de datos
    $sql = "INSERT INTO canchas (nombre, tipo, disponibilidad, capacidad, horario_apertura, horario_cierre, imagen, descripcion) 
            VALUES ('$nombre', '$tipo', '$disponibilidad', '$capacidad', '$horario_apertura', '$horario_cierre', '$imagen', '$descripcion')";

    if (mysqli_query($conexion, $sql)) {
        echo "Cancha insertada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar conexión
    mysqli_close($conexion);
}
?>
