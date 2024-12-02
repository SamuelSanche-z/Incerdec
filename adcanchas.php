<?php
require_once('conexion.php'); 
session_start();

// Consulta para obtener todas las canchas
$result = mysqli_query($conexion, "SELECT * FROM canchas;") or die("Error en la consulta: " . mysqli_error($conexion));
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
    <link rel="stylesheet" href="css/mostrar.css"> 
    <title>Lista de Canchas</title>
</head>
<body>

    <!-- mensaje si se hace correctamente la consulta -->
    <?php if (isset($_GET['mensaje'])): ?>
        <div style="color: green; text-align: center; margin-bottom: 20px;">
            <?php echo htmlspecialchars($_GET['mensaje']); ?>
        </div>
    <?php endif; ?>

    <h2 style="text-align: center;">Lista de Canchas</h2>

    <table border="1" width="90%" align="center">
        <tr>
            <th>ID Cancha</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Capacidad</th>
            <th>Horario Apertura</th>
            <th>Horario Cierre</th>
            <th>Disponibilidad</th>
            <th>Descripción</th>
            <th>Eliminar</th>
            <th>Modificar</th>
            <th>Reservar</th>
            <th>Abrir</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row['id_cancha']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['capacidad']; ?></td>
                <td><?php echo $row['horario_apertura']; ?></td>
                <td><?php echo $row['horario_cierre']; ?></td>
                <td><?php echo $row['disponibilidad']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><a href="eliminarcancha.php?id_cancha=<?php echo $row['id_cancha']; ?>">Eliminar</a></td>
                <td><a href="modificarcancha.php?id_cancha=<?php echo $row['id_cancha']; ?>">Modificar</a></td>
                <td><a href="reservarcancha.php?id_cancha=<?php echo $row['id_cancha']; ?>">Reservada</a></td>
                <td><a href="abrircancha.php?id_cancha=<?php echo $row['id_cancha']; ?>">Disponible</a></td>
            </tr>
        <?php } ?>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <button onclick="window.location.href='indexad.php'" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver al Index
        </button>
    </div>
</body>
</html>
