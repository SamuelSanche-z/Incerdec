<?php
require_once('conexion.php');

// Obtener el ID de la reserva desde la URL
$id_reser = $_GET['id_reser'] ?? null;

if ($id_reser) {
    // Consultar los participantes que tengan el mismo id_reser
    $result = mysqli_query($conexion, "SELECT * FROM participantes WHERE id_reser = $id_reser") or die("Problemas en el select: " . mysqli_error($conexion));
} else {
    die("ID de reserva no proporcionado.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mostrar.css">
    <title>Participantes de la Reserva <?php echo htmlspecialchars($id_reser); ?></title>
</head>
<body>

    <h2 style="text-align: center; color: #32CD32;">Participantes de la Reserva <?php echo htmlspecialchars($id_reser); ?></h2>

    <table border="1" width="80%" align="center">
        <tr>
            <td>ID Participante</td>
            <td>ID Reserva</td>
            <td>Documento</td>
            <td>Nombre</td>
            <td>Teléfono</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row['id_par']; ?></td>
                <td><?php echo $row['id_reser']; ?></td>
                <td><?php echo $row['documento']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <button onclick="window.location.href='mostrareservas.php'" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver a Reservas
        </button>
    </div>
</body>
</html>
