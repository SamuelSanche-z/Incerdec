<?php 
include('conexion.php');
session_start();

$id_usu = $_SESSION['id_usu']; // Obtener el ID del usuario desde la sesión

// Comprobar si se ha recibido el id_cancha en la URL
if (isset($_GET['id_cancha'])) {
    $id_cancha = intval($_GET['id_cancha']);
    
    // Obtener la capacidad de la cancha, horario de apertura y cierre desde la base de datos
    $consulta_cancha = $conexion->prepare("SELECT capacidad, horario_apertura, horario_cierre FROM canchas WHERE id_cancha = ?");
    $consulta_cancha->bind_param("i", $id_cancha);
    $consulta_cancha->execute();
    $resultado_cancha = $consulta_cancha->get_result();
    
    if ($resultado_cancha->num_rows > 0) {
        $fila = $resultado_cancha->fetch_assoc();
        $capacidad_maxima = $fila['capacidad'];
        $horario_apertura = $fila['horario_apertura'];
        $horario_cierre = $fila['horario_cierre'];
    } else {
        echo "No se encontró la información de la cancha.";
        exit;
    }

    // Obtener las fechas reservadas que tienen estado "confirmada"
    $consulta_fechas = $conexion->prepare("SELECT fecha_reserva FROM reservas WHERE id_cancha = ? AND estado = 'confirmada'");
    $consulta_fechas->bind_param("i", $id_cancha);
    $consulta_fechas->execute();
    $resultado_fechas = $consulta_fechas->get_result();

    // Guardar las fechas reservadas en un arreglo
    $fechas_reservadas = [];
    while ($fila = $resultado_fechas->fetch_assoc()) {
        $fechas_reservadas[] = $fila['fecha_reserva'];
    }

} else {
    echo "No se ha seleccionado ninguna cancha.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Reserva</title>
    <link rel="stylesheet" href="css/resercrear.css">
</head>
<body>
    <h2>Crear Nueva Reserva</h2>
    <form action="resercrear.php" method="POST" onsubmit="return validarReserva()">
        <input type="hidden" name="id_usu" value="<?php echo htmlspecialchars($id_usu); ?>">
        <input type="hidden" name="id_cancha" value="<?php echo htmlspecialchars($id_cancha); ?>">
        <input type="hidden" id="capacidad_maxima" value="<?php echo htmlspecialchars($capacidad_maxima); ?>">
        <input type="hidden" id="horario_apertura" value="<?php echo htmlspecialchars($horario_apertura); ?>">
        <input type="hidden" id="horario_cierre" value="<?php echo htmlspecialchars($horario_cierre); ?>">

        <!-- Datos de la Reserva -->
        <label for="fecha_reserva">Fecha de la Reserva:</label>
        <input type="date" name="fecha_reserva" id="fecha_reserva" required>

        <label for="hora_inicio">Hora de Inicio:</label>
        <input type="time" name="hora_inicio" id="hora_inicio" required>

        <label for="hora_fin">Hora de Fin:</label>
        <input type="time" name="hora_fin" id="hora_fin" required>

        <label for="can_participantes">Cantidad de Participantes (máximo <?php echo htmlspecialchars($capacidad_maxima); ?>):</label>
        <input type="number" name="can_participantes" id="can_participantes" min="1" max="<?php echo htmlspecialchars($capacidad_maxima); ?>" required>

        <!-- Contenedor para los datos de los participantes -->
        <div id="participantes_container"></div>

        <button type="submit">Confirmar Reserva</button>
    </form>

    <script>
        // Array de fechas reservadas desde PHP
        const fechasReservadas = <?php echo json_encode($fechas_reservadas); ?>;
        
        const fechaInput = document.getElementById('fecha_reserva');
        const horaInicioInput = document.getElementById('hora_inicio');
        const horaFinInput = document.getElementById('hora_fin');
        const horarioApertura = document.getElementById('horario_apertura').value;
        const horarioCierre = document.getElementById('horario_cierre').value;

        // Bloquear las fechas reservadas si están confirmadas
        fechaInput.addEventListener('input', function () {
            const fechaSeleccionada = fechaInput.value;
            if (fechasReservadas.includes(fechaSeleccionada)) {
                alert('Esta fecha ya está reservada.');
                fechaInput.value = '';  // Limpiar el campo
            }
        });

        // Validar las horas de la reserva
        function validarReserva() {
            const horaInicio = horaInicioInput.value;
            const horaFin = horaFinInput.value;

            // Validar si la hora de inicio está dentro del horario de apertura
            if (horaInicio < horarioApertura) {
                alert(`La hora de inicio no puede ser antes de las ${horarioApertura}.`);
                return false;
            }

            // Validar si la hora de fin está dentro del horario de cierre
            if (horaFin > horarioCierre) {
                alert(`La hora de fin no puede ser después de las ${horarioCierre}.`);
                return false;
            }

            // Validar que la hora de inicio no sea mayor que la de fin
            if (horaInicio >= horaFin) {
                alert("La hora de inicio debe ser menor que la hora de fin.");
                return false;
            }

            return true;
        }

   // Actualizar los participantes en base al número de participantes seleccionado
document.getElementById('can_participantes').addEventListener('input', function () {
    let numParticipantes = parseInt(this.value);  // Convertir el valor a número entero
    const container = document.getElementById('participantes_container');
    const capacidadMaxima = parseInt(document.getElementById('capacidad_maxima').value); // Convertir la capacidad máxima a entero

    // Verificar que el número de participantes no exceda la capacidad máxima
    if (numParticipantes > capacidadMaxima) {
        this.value = capacidadMaxima;  // Ajustar el valor del input al máximo permitido si es mayor
        numParticipantes = capacidadMaxima;
    } else if (numParticipantes < 1 || isNaN(numParticipantes)) {  // Validación para números menores que 1 o no numéricos
        this.value = 1;
        numParticipantes = 1;
    }

    container.innerHTML = ''; // Limpiar el contenedor antes de generar los nuevos campos

    // Generar los campos de los participantes
    for (let i = 1; i <= numParticipantes; i++) {
        container.innerHTML += `
            <fieldset>
                <legend>Participante ${i}</legend>
                <label>Documento:</label>
                <input type="text" name="documento_participante_${i}" required>
                <label>Nombre:</label>
                <input type="text" name="nombre_participante_${i}" required>
                <label>Teléfono:</label>
                <input type="text" name="telefono_participante_${i}" required>
            </fieldset>`;
    }
});

    </script>
</body>
</html>
