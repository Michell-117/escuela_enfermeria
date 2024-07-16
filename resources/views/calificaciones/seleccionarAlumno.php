<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar contactoAlumno</title>
</head>

<body>
    <h1>Seleccionar Alumno calificaciones</h1>  

    <hr>

    <form action="" method="post">

    <label for="sede">Seleccionar sede</label>

        <select name="sede" id="sede" required>
            <?php foreach($plantel_profesor as $plantel):?>
                <option value="<?=$plantel?>"><?=$plantel?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="grupo">Seleccionar sede</label>
        <select name="grupo" id="grupo" required>
            <?php foreach($resultados_grupos as $grupo):?>
                <option value="<?=$grupo["grupo"]?>"><?=$grupo["grupo"]?></option>
            <?php endforeach; ?>
            
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="seleccionar_info_alumno_calificacion">

        <input type="submit" value="Seleccionar">
    </form>

 

    
</body>
</html>