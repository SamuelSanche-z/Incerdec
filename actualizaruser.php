<?php
include('conexion.php');
session_start();

$_SESSION['id_usu'];
$id = $_SESSION['id_usu'];

$result = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id='$id'") or die ("problemas en el select" . mysqli_error($conexion));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/actuser.css">
    <title>Actualizar</title>
    <script>
        function confiractu() {
            return confirm("¿Realizar el cambio?");
        }
    </script>
</head>
<body>
    <div class="form-card">
        <h2>Actualizar Información</h2>
        <form method="POST" action="actuus.php" enctype="multipart/form-data" onsubmit="return confiractu();">
            <?php 
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='form-group'>";
                echo "<label for='cedula'>Cédula</label>";
                echo "<input type='text' name='cedula' id='cedula' value='".$row['cedula']."'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='nombre'>Nombre</label>";
                echo "<input type='text' name='nombre' id='nombre' value='".$row['nombre']."'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='correo'>Correo</label>";
                echo "<input type='email' name='correo' id='correo' value='".$row['correo']."'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='telefono'>Teléfono</label>";
                echo "<input type='text' name='telefono' id='telefono' value='".$row['telefono']."'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='imagen'>Imagen</label>";
                echo "<input type='file' name='imagen' id='imagen' accept='image/*'>";
                echo "</div>";
            }
            ?>
            <input type='hidden' name='id' value='<?php echo $id; ?>'>
            <button type="submit" class="submit-button">Actualizar</button>
        </form>
    </div>
</body>
</html>
