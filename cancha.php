<?php 
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cancha.css">
    <title>Detalles de Cancha</title>
</head>
<body>
    <section class="contenido">
        <div class="mostrador" id="mostrador">
            <?php
            // Comprobar si se ha recibido el id_cancha en la URL
            if (isset($_GET['id_cancha'])) {
                // Obtener el id_cancha
                $id_cancha = intval($_GET['id_cancha']);

                // Consulta para obtener los detalles de la cancha seleccionada
                $query = "SELECT nombre, tipo, disponibilidad, capacidad, horario_apertura, horario_cierre, descripcion, imagen 
                          FROM canchas WHERE id_cancha = $id_cancha";
                $result = mysqli_query($conexion, $query);

                // Verificar si hay resultados
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    // Formatear los horarios de apertura y cierre
                    $hora_apertura = DateTime::createFromFormat ('H:i:s.u', $row['horario_apertura'])->format('g:i A');
                    $hora_cierre = DateTime::createFromFormat('H:i:s.u', $row['horario_cierre'])->format('g:i A');

                    echo '<div class="detalle-cancha">';
                    echo '<h2>' . htmlspecialchars($row['nombre']) . '</h2>';
                    echo '<img src="rentaimages/' . htmlspecialchars($row['imagen']) . '" alt="' . htmlspecialchars($row['nombre']) . '">';
                    echo '<p><strong>Tipo:</strong> ' . htmlspecialchars($row['tipo']) . '</p>';
                    echo '<p><strong>Disponibilidad:</strong> ' . htmlspecialchars($row['disponibilidad']) . '</p>';
                    echo '<p><strong>Capacidad:</strong> ' . htmlspecialchars($row['capacidad']) . ' personas</p>';
                    echo '<p><strong>Horario:</strong> ' . $hora_apertura . ' - ' . $hora_cierre . '</p>';
                    echo '<p><strong>Descripción:</strong> ' . htmlspecialchars($row['descripcion']) . '</p>';
                    echo '<button class="rentar-btn" onclick="window.location.href=\'reserd.php?id_cancha=' . urlencode($id_cancha) . '\'">Rentar</button>';
                    echo '</div>';
                } else {
                    echo "<p>No se encontró información para esta cancha.</p>";
                }
            } else {
                echo "<p>No se ha seleccionado ninguna cancha.</p>";
            }

            // Cerrar la conexión
            mysqli_close($conexion);
            ?>
        </div>
    </section>

    <script src="js/renta.js"></script>
</body>
</html>
