<?php

include("conexion.php");

// Obtener los datos del formulario
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$pass = $_POST["contrasena"];

// Hashear la contraseña
$hash = password_hash($pass, PASSWORD_DEFAULT); // Hasheamos la contraseña

$rol_id = "1";

// Usar declaraciones preparadas para prevenir inyecciones SQL
$stmt = $conexion->prepare("INSERT INTO usuarios (cedula, nombre, apellido, telefono, correo, contrasena, rol_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssi", $cedula, $nombre, $apellido, $telefono, $correo, $hash, $rol_id);

if ($stmt->execute()) {
    header("location:indexcli.php");
} else {
    die("Problemas en el insert: " . $stmt->error);
}

$stmt->close();
$conexion->close();
?>
