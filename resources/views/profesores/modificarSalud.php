<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar saludProfesor</title>
</head>

<body>
    <h1>Modificar Profesor Salud</h1>  

    <hr>

    <form action="" method="post">

        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor" required>
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="tipo_sangre">Modificar Tipo Sangre</label>
        <select name="tipo_sangre" id="tipo_sangre">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+.</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_salud_tipo_sangre">

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

        <label for="enfermedad_cronica">Modificar Enfermedad Cronica</label>
        <input type="text" name="enfermedad_cronica" id="enfermedad_cronica" placeholder="Enfermedad Cronica">

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_salud_enfermedad_cronica">

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

        <label for="alergia">Modificar Alergia</label>
        <input type="text" name="alergia" id="alergia" placeholder="Alergia(s)">

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_salud_alergia">

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

        <label for="servicio_medico">Modificar Servicio Medico</label>
        <select name="servicio_medico" id="servicio_medico">
            <option value="I.M.S.S.">I.M.S.S.</option>
            <option value="I.S.S.S.T.E.">I.S.S.S.T.E.</option>
            <option value="PEMEX">PEMEX.</option>
            <option value="SEDENA">SEDENA</option>
            <option value="OTRO">OTRO</option>
            <option value="ninguno">Ninguno</option>
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_profesor_salud_servicio_medico">

        <input type="submit" value="Modificar">
    </form>



    
</body>
</html>