<?php
// Incluir la conexión a la base de datos
include('conexion.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validación y escape de datos
    $id_usu = mysqli_real_escape_string($conexion, $_POST['id_usu']);
    $id_cancha = mysqli_real_escape_string($conexion, $_POST['id_cancha']);
    $fecha_reserva = mysqli_real_escape_string($conexion, $_POST['fecha_reserva']);
    $hora_inicio = mysqli_real_escape_string($conexion, $_POST['hora_inicio']);
    $hora_fin = mysqli_real_escape_string($conexion, $_POST['hora_fin']);
    $can_participantes = mysqli_real_escape_string($conexion, $_POST['can_participantes']);

    // Verificar si el usuario existe
    $check_usuario = "SELECT * FROM usuarios WHERE id = '$id_usu'";
    $result_usuario = mysqli_query($conexion, $check_usuario);

    if (mysqli_num_rows($result_usuario) === 0) {
        echo "Error: El usuario con ID $id_usu no existe.";
        exit;
    }

    // Verificar si el id_cancha existe 
    $check_cancha = "SELECT * FROM canchas WHERE id_cancha = '$id_cancha'";
    $result_cancha = mysqli_query($conexion, $check_cancha);

    if (mysqli_num_rows($result_cancha) === 0) {
        echo "Error: El id_cancha no existe en la base de datos.";
        exit;
    }

    // Insertar en la tabla reservas
    $query_reserva = "INSERT INTO reservas (id_usu, id_cancha, fecha_reserva, hora_inicio, hora_fin, estado, can_participantes) VALUES ('$id_usu', '$id_cancha', '$fecha_reserva', '$hora_inicio', '$hora_fin', 'pendiente', '$can_participantes')";

    if (mysqli_query($conexion, $query_reserva)) {
        $id_reser = mysqli_insert_id($conexion);

        // Guardar en la sesión los valores de id_reser e id_usu
        $_SESSION['id_reser'] = $id_reser;
        $_SESSION['id_usu'] = $id_usu;

        // Registrar los participantes
        for ($i = 1; $i <= $can_participantes; $i++) {
            $documento = mysqli_real_escape_string($conexion, $_POST["documento_participante_$i"]);
            $nombre = mysqli_real_escape_string($conexion, $_POST["nombre_participante_$i"]);
            $telefono = mysqli_real_escape_string($conexion, $_POST["telefono_participante_$i"]);

            $query_participante = "INSERT INTO participantes (id_reser, documento, nombre, telefono) VALUES ('$id_reser', '$documento', '$nombre', '$telefono')";

            if (!mysqli_query($conexion, $query_participante)) {
                echo "Error al registrar el participante $i: " . mysqli_error($conexion);
            }
        }

     
        header("Location: termreser.php");
        exit; 
    } else {
        echo "Error al registrar la reserva: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "Método de solicitud no permitido.";
}
?>
