<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar contactoAlumno</title>
</head>

<body>
    <h1>Modificar Profesor Contacto</h1>  

    <hr>

    <form action="" method="post">

        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor">
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>
            

        <label for="email">Modificar Correo Electronico</label>
        <input type="email" name="email" id="email" placeholder="alumno@gmail.com" maxlength="45">

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_contacto_email">

        <input type="submit" value="Modificar">
    </form>

    <hr>

    <form action="" method="post">

        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor" required>
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="telefono_fijo">Teléfono fijo</label>
        <input type="tel" name="telefono_fijo" id="telefono_fijo" placeholder="Teléfono casa" maxlength="10">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_contacto_telefono_fijo">

        <input type="submit" value="Modificar">
        </form>

    <hr>
    
    <form action="" method="post">

        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor" required>
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="telefono_celular">Teléfono celular</label>
        <input type="tel" name="telefono_celular" id="telefono_celular" placeholder="Teléfono celular" maxlength="10">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_contacto_telefono_celular">

        <input type="submit" value="Modificar">
        </form>

    <hr>

    
</body>
</html>