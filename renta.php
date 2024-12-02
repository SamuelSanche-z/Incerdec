<?php 
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rentas.css">
    <title>Renta de Canchas Deportivas</title>
</head>
<body>
    <section class="contenido">
        <div class="mostrador" id="mostrador">
            <div class="fila">
                <?php
                // Conectar a la base de datos
                include('conexion.php');

                // Consulta para obtener los datos de las canchas
                $query = "SELECT id_cancha, nombre, imagen, descripcion FROM canchas";
                $result = mysqli_query($conexion, $query);

                // Verificar si hay resultados
                if (mysqli_num_rows($result) > 0) {
                    // Generar cada recuadro con los datos de la base de datos
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="item">';
                        echo '<p class="nombre-cancha">' . htmlspecialchars($row['nombre']) . '</p>'; // Nombre de la cancha
                        echo '<div class="contenedor-foto">';
                        echo '<img src="rentaimages/' . htmlspecialchars($row['imagen']) . '" alt="' . htmlspecialchars($row['nombre']) . '">';
                        echo '</div>';
                        echo '<p class="descripcion">' . htmlspecialchars($row['descripcion']) . '</p>';
                        echo '<button class="rentar-btn" onclick="window.location.href=\'cancha.php?id_cancha=' . urlencode($row['id_cancha']) . '\'">Rentar</button>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No hay canchas disponibles en este momento.</p>";
                }

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </div>
        </div>
    </section>

    <script src="js/renta.js"></script>
</body>
</html>
