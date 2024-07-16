<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno - Familiar</title>
</head>
<body>
    <h1>Formulario agregar alumno familiar</h1>
    <form action="" method="post">

        <label for="cuenta_alumno_contacto">Cuenta Alumno</label>
        <select name="cuenta_alumno_contacto" id="cuenta_alumno_contacto" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="nombre_familiar">Nombre del familiar</label>
        <input type="text" name="nombre_familiar" id="nombre_familiar" placeholder="Familiar" maxlength="45">

        <label for="parentesco">Parentesco</label>
        <input type="text" name="parentesco" id="parentesco" placeholder="Padre, Madre, etc." maxlength="20">

        <label for="numero_contacto">Número de contacto</label>
        <input type="tel" name="numero_contacto" id="numero_contacto" placeholder="5534568234" maxlength="10">
        

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="crear_alumno_familiar">

        <input type="submit" value="Agregar">

    </form>
</body>
</html>