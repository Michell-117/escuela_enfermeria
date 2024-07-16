<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar contactoAlumno</title>
</head>

<body>
    <h1>Asignar calificacion por alumno</h1> 
    <p><b>Cuenta Profesor: </b><?=$cuenta_profesor?></p> 
    <p><b>Plantel: </b><?=$sede?></p>
    <p><b>Grupo: </b><?=$grupo?></p>
    <p><b>Materia: </b><?=$nombre_materia?></p>
    

    <hr>
    <form action="" method="post">
        <label for="cuenta">Seleccionar Alumno</label>
        <select name="cuenta" id="cuenta" required>
            <?php foreach($cuentasAlumnos as $alumno):?>
                <option value="<?=$alumno["cuenta"]?>"><?=$alumno["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>
        
        <label for="calificacion">Calificación</label>
        <input type="number" name="calificacion" id="calificacion" max="10" min="5" step=".1" required maxlength="2" required>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="calificar_alumno_individual">
        <input type="hidden" name="id_materia" value="<?=$id_materia?>">
        <input type="submit" value="Asignar calificacion">
    </form>

</body>
</html>