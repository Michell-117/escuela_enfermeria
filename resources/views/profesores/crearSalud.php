<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesor - Salud</title>
</head>
<body>
    <h1>Formulario agregar profesor salud</h1>
    <form action="" method="post">

        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor" required>
            <?php foreach($resultados_profesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="tipo_sangre">Tipo de sangre</label>
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

        <label for="enfermedad_cronica">Enfermedad crónica</label>
        <input type="text" name="enfermedad_cronica" id="enfermedad_cronica" placeholder="Diabetes, Asma, Artritis, etc.">

        <label for="alergia">Alergias</label>
        <input type="text" name="alergia" id="alergia" placeholder="Alergias">
        
        <label for="servicio_medico">Servicio médico</label>
        <select name="servicio_medico" id="servicio_medico">
            <option value="I.M.S.S.">I.M.S.S.</option>
            <option value="I.S.S.S.T.E.">I.S.S.S.T.E.</option>
            <option value="PEMEX">PEMEX.</option>
            <option value="SEDENA">SEDENA</option>
            <option value="OTRO">OTRO</option>
            <option value="ninguno">Ninguno</option>
        </select>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="crear_profesor_salud">

        <input type="submit" value="Agregar">

    </form>
</body>
</html>