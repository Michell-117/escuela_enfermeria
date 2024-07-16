<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear contacto</title>
</head>
<body>
    <h1>Formulario agregar profesor contacto</h1>
    <form action="" method="post">

        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor" required>
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="email">Correo electronico</label>
        <input type="email" name="email" id="email" placeholder="profesor@gmail.com" maxlength="45">

        <label for="telefono_fijo">Teléfono fijo</label>
        <input type="tel" name="telefono_fijo" id="telefono_fijo" placeholder="Teléfono casa" maxlength="10">

        <label for="telefono_celular">Teléfono celular</label>
        <input type="tel" name="telefono_celular" id="telefono_celular" placeholder="Teléfono celular" maxlength="10">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="crear_profesor_contacto">

        <input type="submit" value="Agregar">

    </form>
</body>
</html>