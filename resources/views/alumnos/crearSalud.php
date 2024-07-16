<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno - Salud</title>
</head>
<body>
    <h1>Formulario agregar alumno salud</h1>
    <form action="" method="post">

        <label for="cuenta_alumno_salud">Cuenta Alumno</label>
        <select name="cuenta_alumno_salud" id="cuenta_alumno_salud" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <!-- <label for="id_alumno_salud">ID Alumno</label>
        <input type="text" name="id_alumno_salud" id="id_alumno_salud" placeholder="2"> -->

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
        <input type="text" name="enfermedad_cronica" id="enfermedad_cronica" placeholder="Diabetes, Asma, Artritis, etc." maxlength="45">

        <label for="alergia">Alergias</label>
        <input type="text" name="alergia" id="alergia" placeholder="Alergias" maxlength="45">
        
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
        <input type="hidden" name="formulario" value="crear_alumno_salud">

        <input type="submit" value="Agregar">

    </form>
</body>
</html>