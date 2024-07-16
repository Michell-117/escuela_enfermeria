<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar contactoAlumno</title>
</head>

<body>
    <h1>Modificar Alumno Contacto</h1>  

    <hr>

    <form action="" method="post">

        <label for="cuenta_alumno_contacto">Cuenta Alumno</label>
        <select name="cuenta_alumno_contacto" id="cuenta_alumno_contacto" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="email">Modificar Correo Electronico</label>
        <input type="email" name="email" id="email" placeholder="alumno@gmail.com">

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_alumno_contacto_email">

        <input type="submit" value="Modificar">
    </form>

    <hr>

    <form action="" method="post">

        <label for="cuenta_alumno_contacto">Cuenta Alumno</label>
        <select name="cuenta_alumno_contacto" id="cuenta_alumno_contacto" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="telefono_fijo">Teléfono fijo</label>
        <input type="tel" name="telefono_fijo" id="telefono_fijo" placeholder="Teléfono casa" maxlength="10">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_alumno_contacto_telefono_fijo">

        <input type="submit" value="Modificar">
        </form>

    <hr>
    
    <form action="" method="post">

        <label for="cuenta_alumno_contacto">Cuenta Alumno</label>
        <select name="cuenta_alumno_contacto" id="cuenta_alumno_contacto" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="telefono_celular">Teléfono celular</label>
        <input type="tel" name="telefono_celular" id="telefono_celular" placeholder="Teléfono celular" maxlength="10">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_alumno_contacto_telefono_celular">

        <input type="submit" value="Modificar">
        </form>

    <hr>

    
</body>
</html>