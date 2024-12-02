<?php
include('conexion.php');
session_start();

// Verificar si la sesión contiene los valores necesarios (id_reser e id_usu)
if (!isset($_SESSION['id_reser']) || !isset($_SESSION['id_usu'])) {
    header("Location: error.php");
    exit;
}


$id_reser = $_SESSION['id_reser'];
$id_usu = $_SESSION['id_usu'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Realizada</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #32CD32;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .message {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #555;
        }

        .details {
            font-size: 1.1em;
            margin-bottom: 20px;
            color: #444;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
        }

        .important {
            font-weight: bold;
            color: #e74c3c;
        }

        .contact-info {
            margin-top: 30px;
            font-size: 1.1em;
            color: #333;
        }

        .contact-info a {
            color: #32CD32; 
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
            background-color: #32CD32; 
            color: white;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .btn:hover {
            background-color: #28a745; 
        }

        .btn:active {
            background-color: #218838; 
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Reserva realizada exitosamente</h1>
        <p class="message">Su reserva se ha realizado con éxito y está en un estado de pendiente. Para confirmarla, escriba al siguiente número y envíe los datos que ve a continuación:</p>

        <div class="details">
            <p><span class="important">ID de la Reserva:</span> <?php echo $id_reser; ?></p>
            <p><span class="important">ID del Usuario:</span> <?php echo $id_usu; ?></p>
        </div>

        <p class="contact-info">Para confirmar su reserva, por favor, contáctenos al siguiente número: <strong>+123 456 7890</strong> y proporcione los datos mencionados.</p>

        <a href="indexusu.php" class="btn">Volver al inicio</a>
    </div>

</body>
</html>
