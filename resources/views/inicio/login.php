<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <section>
        <form action="inicio_usuario" method="post">
            <label for="usuario_login">Usuario:
                <input type="text" name="usuario_login" id="usuario_login">
            </label>

            <label for="password_login">Contraseña:
                <input type="password" name="password_login" id="password_login">
            </label>

            <input type="hidden" name="method" value="post">
            <input type="hidden" name="formulario" value="iniciar_sesion">

            <input type="submit" value="Iniciar Sesión">
        </form>
    </section>
</body>
</html>