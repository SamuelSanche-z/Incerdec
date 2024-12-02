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
    <title>Insertar Nueva Cancha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        form h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<form action="insertcand.php" method="POST" enctype="multipart/form-data">
    <h2>Insertar Nueva Cancha</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
        <option value="Fútbol">futbol</option>
        <option value="basquetbol">basquetbol</option>
        <option value="tenis">tenis</option>
        <option value="otros">otros</option>
    </select>

    <label for="disponible">Disponibilidad:</label>
    <select id="disponible" name="disponibilidad" required>
        <option value="disponible">disponible</option>
        <option value="reservada">reservada</option>
        <option value="mantenimiento">mantenimiento</option>
    </select>

    <label for="capacidad">Capacidad:</label>
    <input type="number" id="capacidad" name="capacidad" required>

    <label for="horario_apertura">Horario de Apertura:</label>
    <input type="time" id="horario_apertura" name="horario_apertura" required>

    <label for="horario_cierre">Horario de Cierre:</label>
    <input type="time" id="horario_cierre" name="horario_cierre" required>

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="imagen" accept="image/*" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" rows="3" required></textarea>

    <button type="submit">Guardar Cancha</button>
</form>

</body>
</html>
