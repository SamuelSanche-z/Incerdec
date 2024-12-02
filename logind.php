<?php
include('conexion.php');

session_start();

$user = $_POST["cedula"];
$pass = $_POST["contrasena"];

// Preparar la consulta
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE cedula=?");
if ($stmt === false) {
    die('Error en la preparación de la consulta: ' . $conexion->error);
}

$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
//Si fila igual a resultado que accede a la clase fetch
if ($fila = $result->fetch_assoc()) {
    // Verificar la contraseña
    if (password_verify($pass, $fila['contrasena'])) {
        $name = $fila['nombre'];
        $rol_id = $fila['rol_id'];
        $id = $fila['id'];

        $_SESSION['nombre'] = $name;
        $_SESSION['id_usu'] = $id; 
        $_SESSION['rol_id'] = $rol_id;

        if ($rol_id == '2') {
            header("Location: indexad.php");
        } elseif ($rol_id == '1') {
            header("Location: indexusu.php");
        } elseif ($rol_id == '3') {
            header("Location: indexsuperad.php"); 
        }
        exit();
    }
}

// Mensaje de error genérico
echo "<script>alert('Usuario o contraseña incorrecto. Por favor, inténtalo de nuevo.');</script>";
?>
