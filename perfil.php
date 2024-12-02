<?php
include ('conexion.php');
session_start();

$tipusuario = $_SESSION['rol_id'];
$id = $_SESSION['id_usu'];

$query = "SELECT * FROM usuarios WHERE id = '$id'";
$result = mysqli_query($conexion, $query);
$datos = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/perfil.css">
</head>
<body>
<div class="card">
    <div class="user-profile">
        <?php
        // Verificar si existe una imagen y mostrarla
        $imagenPath = $datos['imagen'];
        
        // Verifica que el archivo exista
        if (!empty($imagenPath) && file_exists($imagenPath)) {
            echo "<img src='$imagenPath' class='img-radius' alt='User-Profile-Image'>";
        } else {
            // Imagen predeterminada si no hay imagen cargada
            echo "<img src='https://img.icons8.com/bubbles/100/000000/user.png' class='img-radius' alt='User-Profile-Image'>";
        }
        ?>
        <h6 class="f-w-600"><?php echo $datos['nombre']; ?></h6>
        <p class="role"><?php echo $datos['rol_id']; ?></p>
    </div>
    <div class="card-block">
        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Información</h6>
        <div class="info-columns">
            <div class="info-row">
                <p class="label">Cédula:</p>
                <span class="text-muted"><?php echo $datos['cedula']; ?></span>
            </div>
            <div class="info-row">
                <p class="label">Email:</p>
                <span class="text-muted"><?php echo $datos['correo']; ?></span>
            </div>
            <div class="info-row">
                <p class="label">Teléfono:</p>
                <span class="text-muted"><?php echo $datos['telefono']; ?></span>
            </div>
            <div class="info-row">
                <p class="label">Proyecto Reciente:</p>
                <span class="text-muted">Sam Disuja</span>
            </div>
            <div class="info-row">
                <p class="label">Más Visto:</p>
                <span class="text-muted">Dinoter Husain</span>
            </div>
        </div>
        <ul class="social-link list-unstyled">
            <li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
            <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
            <li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
        </ul>
        <button class="edit-button" onclick="location.href='actualizaruser.php'">Editar</button>
    </div>
</div>
</body>
</html>
