<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesor - Familiar</title>
</head>
<body>
    <h1>Modificar Profesor Familiar</h1>
    <form action="" method="post">
        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor">
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="nombre_familiar">Modificar Nombre del familiar</label>
        <input type="text" name="nombre_familiar" id="nombre_familiar" placeholder="Juan Ramirez Vazquez" maxlength="100">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_familiar_nombre_familiar">

        <input type="submit" value="Modificar">
    </form>

    <hr>

    <form action="" method="post">
        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor">
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="parentesco">Modificar Parentesco</label>
        <input type="text" name="parentesco" id="parentesco" placeholder="Padre, Madre, etc." maxlength="45">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_familiar_parentesco">

        <input type="submit" value="Modificar">
    </form>

    <hr>

    <form action="" method="post">
        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor">
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="numero_contacto">Modificar Número de Contacto</label>
        <input type="tel" name="numero_contacto" id="numero_contacto" placeholder="5534568234" maxlength="10">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_familiar_numero_contacto">

        <input type="submit" value="Modificar">
    </form>

    <hr>

</body>
</html>