<?php
include('conexion.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $rol_id = $_POST['rol_id'];

    $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO usuarios (cedula, nombre, apellido, correo, telefono, contrasena, rol_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $cedula, $nombre, $apellido, $correo, $telefono, $hashedPassword, $rol_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error al registrar el usuario: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conexion->close();
?>
