<?php
require_once('conexion.php');
session_start();

$result = mysqli_query($conexion, "SELECT * FROM usuarios;") or die("Problemas en el select: ".mysqli_error($conexion));

if ($_SESSION['rol_id'] != '2'){
    header("location: indexcli.php");
    exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mostrar.css">
    <title>Usuarios</title>
</head>
<body>
    <table border="1" width="80%" align="center">
        <tr>
            <td>Cédula</td><td>Nombre</td><td>Apellido</td><td>Correo</td><td>Teléfono</td><td>Rol</td><td>Imagen</td><td>Eliminar</td><td>Modificar</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row['cedula']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['rol_id']; ?></td>
                <td>
                    <img width="50%" src="<?php echo $row['imagen']; ?>" alt="Imagen no encontrada">
                </td>
                <td><a href="eliminarpro.php?cod=<?php echo $row['cedula']; ?>">Eliminar</a></td>
                <td><a href="modificaruser.php?code=<?php echo $row['cedula']; ?>">Modificar</a></td>
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
