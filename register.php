<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form action="registerd.php" method="POST" class="login">
                <div class="login__field">
                    <input type="text" class="login__input" placeholder="Cedula" name="cedula">
                </div>
                <div class="login__field">
                    <input type="text" class="login__input" placeholder="Nombre" name="nombre">
                </div>
                <div class="login__field">
                    <input type="text" class="login__input" placeholder="Apellidos" name="apellido">
                </div>
                <div class="login__field">
                    <input type="text" class="login__input" placeholder="Telefono" name="telefono">
                </div>
                <div class="login__field">
                    <input type="text" class="login__input" placeholder="Correo" name="correo">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" placeholder="Contraseña" name="contrasena">
                </div>
                <button class="button login__submit">
                    <span class="button__text">Registrarse</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>
</body>
</html>
