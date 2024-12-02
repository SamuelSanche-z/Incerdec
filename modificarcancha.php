<?php
require_once('conexion.php'); // Incluye la conexión a la base de datos

// Verifica si se ha pasado el ID de la cancha por la URL
if (isset($_GET['id_cancha']) && !empty($_GET['id_cancha'])) {
    $id_cancha = $_GET['id_cancha'];
} else {
    die("ID de la cancha no especificado o es inválido");
}

// Consulta para obtener los datos de la cancha
$result = mysqli_query($conexion, "SELECT * FROM canchas WHERE id_cancha = '$id_cancha'") or die("Error en la consulta: " . mysqli_error($conexion));

// Si no se encuentra la cancha, muestra un mensaje de error
if (mysqli_num_rows($result) == 0) {
    die("La cancha no existe");
}

// Obtener los datos de la cancha
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/actuser.css"> 
    <title>Actualizar Cancha</title>
    <script>
        function confiractu() {
            return confirm("¿Realizar el cambio?");
        }
    </script>
</head>
<body>
    <div class="form-card">
        <h2>Actualizar Información de la Cancha</h2>
        <form method="POST" action="actualizarcancha.php" enctype="multipart/form-data" onsubmit="return confiractu();">

            <input type="hidden" name="id_cancha" value="<?php echo $row['id_cancha']; ?>">

            <div class="form-group">
                <label for="nombre">Nombre de la Cancha</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de Cancha</label>
                <select name="tipo" id="tipo" required>
                    <option value="futbol" <?php echo ($row['tipo'] == 'futbol') ? 'selected' : ''; ?>>Fútbol</option>
                    <option value="basquetbol" <?php echo ($row['tipo'] == 'basquetbol') ? 'selected' : ''; ?>>Básquetbol</option>
                    <option value="tenis" <?php echo ($row['tipo'] == 'tenis') ? 'selected' : ''; ?>>Tenis</option>
                    <option value="otros" <?php echo ($row['tipo'] == 'otros') ? 'selected' : ''; ?>>Otros</option>
                </select>
            </div>

            <div class="form-group">
                <label for="capacidad">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad" value="<?php echo $row['capacidad']; ?>" required>
            </div>

            <div class="form-group">
                <label for="horario_apertura">Horario de Apertura</label>
                <input type="time" name="horario_apertura" id="horario_apertura" value="<?php echo $row['horario_apertura']; ?>" required>
            </div>

            <div class="form-group">
                <label for="horario_cierre">Horario de Cierre</label>
                <input type="time" name="horario_cierre" id="horario_cierre" value="<?php echo $row['horario_cierre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="disponibilidad">Disponibilidad</label>
                <select name="disponibilidad" id="disponibilidad" required>
                    <option value="disponible" <?php echo ($row['disponibilidad'] == 'disponible') ? 'selected' : ''; ?>>Disponible</option>
                    <option value="reservada" <?php echo ($row['disponibilidad'] == 'reservada') ? 'selected' : ''; ?>>Reservada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" required><?php echo $row['descripcion']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" accept="image/*">
            </div>

            <button type="submit" class="submit-button">Actualizar</button>
        </form>
    </div>
</body>
</html>
