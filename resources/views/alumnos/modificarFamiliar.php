<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno - Salud</title>
</head>
<body>
    <h1>Modificar Alumno Familiar</h1>
    <form action="" method="post">
        <label for="cuenta_alumno_salud">Cuenta Alumno</label>
        <select name="cuenta_alumno_salud" id="cuenta_alumno_salud" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="nombre_familiar">Modificar Nombre del familiar</label>
        <input type="text" name="nombre_familiar" id="nombre_familiar" placeholder="Familiar">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_alumno_nombre_familiar">

        <input type="submit" value="Modificar">
    </form>

    <hr>

    <form action="" method="post">
        <label for="cuenta_alumno_salud">Cuenta Alumno</label>
        <select name="cuenta_alumno_salud" id="cuenta_alumno_salud" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="parentesco">Modificar Parentesco</label>
        <input type="text" name="parentesco" id="parentesco" placeholder="Padre, Madre, etc.">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_alumno_parentesco">

        <input type="submit" value="Modificar">
    </form>

    <hr>

    <form action="" method="post">
        <label for="cuenta_alumno_salud">Cuenta Alumno</label>
        <select name="cuenta_alumno_salud" id="cuenta_alumno_salud" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="numero_contacto">Modificar Número de Contacto</label>
        <input type="tel" name="numero_contacto" id="numero_contacto" placeholder="5534568234" maxlength="10">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_alumno_numero_contacto">

        <input type="submit" value="Modificar">
    </form>

    <hr>

</body>
</html>