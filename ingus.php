<?php
include ('conexion.php');
session_start();

if ($_SESSION['rol_id'] != '2'){
   header("location: indexcli.php");
   exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/ingus.css">
</head>
<body>
    <div class="form-card">
        <h2>Registrar Usuario</h2>
        <form method="POST" action="ingusc.php">
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" name="cedula" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" required>
            </div>

            <div class="form-group">
                <label for="rol_id">Rol:</label>
                <select name="rol_id" required>
                    <option value="1">Usuario</option>
                    <option value="2">Admin</option>
                </select>
            </div>

            <button type="submit" class="submit-button">Registrar</button>
        </form>
    </div>
</body>
</html>
