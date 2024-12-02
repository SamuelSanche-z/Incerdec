<?php
require_once('conexion.php');
session_start();

// Inicializamos la variable de búsqueda
$search_id = isset($_POST['search_id']) ? $_POST['search_id'] : '';

// Consulta principal para obtener todas las reservas o filtrar por ID de reserva si se ingresó uno
$query = "SELECT * FROM reservas";
if ($search_id != '') {
    $query .= " WHERE id_reser = '$search_id'";
}

$result = mysqli_query($conexion, $query) or die("Problemas en el select: " . mysqli_error($conexion));

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
    <title>Reservas Actuales</title>
</head>
<body>

    <!-- Formulario de búsqueda -->
    <div style="text-align: center; margin-bottom: 20px;">
        <form method="POST" action="">
            <input type="text" name="search_id" placeholder="Buscar por ID de Reserva" value="<?php echo htmlspecialchars($search_id); ?>" style="padding: 8px; font-size: 14px; width: 200px;">
            <button type="submit" style="padding: 8px 20px; background-color: #32CD32; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Buscar
            </button>
        </form>
    </div>

    <!-- Mostrar mensaje de éxito si existe -->
    <?php if (isset($_GET['mensaje'])): ?>
        <div style="color: green; text-align: center; margin-bottom: 20px;">
            <?php echo htmlspecialchars($_GET['mensaje']); ?>
        </div>
    <?php endif; ?>

    <!-- Tabla de reservas -->
    <table border="1" width="80%" align="center">
        <tr>
            <td>ID Reserva</td>
            <td>ID Usuario</td>
            <td>ID Cancha</td>
            <td>Fecha de Reserva</td>
            <td>Hora de Inicio</td>
            <td>Hora de Fin</td>
            <td>Estado</td>
            <td>Cantidad de Participantes</td>
            <td>Eliminar</td>
            <td>Ver Participantes</td>
            <td>Confirmar Reserva</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row['id_reser']; ?></td>
                <td><?php echo $row['id_usu']; ?></td>
                <td><?php echo $row['id_cancha']; ?></td>
                <td><?php echo $row['fecha_reserva']; ?></td>
                <td><?php echo $row['hora_inicio']; ?></td>
                <td><?php echo $row['hora_fin']; ?></td>
                <td><?php echo $row['estado']; ?></td> 
                <td><?php echo $row['can_participantes']; ?></td>
                <td><a href="eliminarreserva.php?id=<?php echo $row['id_reser']; ?>">Eliminar</a></td>
                <td><a href="verpar.php?id_reser=<?php echo $row['id_reser']; ?>">Ver Participantes</a></td>
                <td><a href="confirreser.php?id_reser=<?php echo $row['id_reser']; ?>">Confirmar Reserva</a></td>
            </tr>
        <?php } ?>
    </table>

    <!-- Botones -->
    <div style="text-align: center; margin-top: 20px;">
        <button onclick="window.location.href='indexad.php'" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver al Index
        </button>
        <button onclick="window.location.href='adcanchas.php'" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Ir a canchas
        </button>
    </div>
</body>
</html>
