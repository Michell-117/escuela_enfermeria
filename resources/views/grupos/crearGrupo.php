<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Grupo</title>
</head>
<body>

    <h1>Crear Grupo</h1>

    <!-- Formulario para modificar el nombre del alumno -->
    <form action="" method="post">

        <label for="plantel_id">Plantel</label>
        <select name="plantel_id" id="plantel_id" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>
        
        <label for="grupo">Grupo</label>
        <select name="grupo" id="grupo" required>
            <?php foreach($resultadosgrupos as $grupos):?>
                <option value="<?=$grupos["grupo"]?>"><?=$grupos["grupo"]?></option>
            <?php endforeach; ?>
            
        </select>
     
        <label for="horario">Horario</label>
        <select name="horario" id="horario" required>
            <?php foreach($resultadosHorarios as $horarios):?>
                <option value="<?=$horarios["horario"]?>"><?=$horarios["horario"]?></option>
            <?php endforeach; ?>
            
        </select>
             
        <label for="turno">Horario</label>
        <select name="turno" id="turno" required>
            <?php foreach($resultadosTurnos as $Turnos):?>
                <option value="<?=$Turnos["turno"]?>"><?=$Turnos["turno"]?></option>
            <?php endforeach; ?>
            
        </select>
                     
        <label for="dias">Días</label>
        <select name="dias" id="dias" required>
            <?php foreach($resultadosDias as $Dias):?>
                <option value="<?=$Dias["dias"]?>"><?=$Dias["dias"]?></option>
            <?php endforeach; ?>
            
        </select>
                             
        <label for="nombre_materia">Materia</label>
        <select name="nombre_materia" id="nombre_materia" required>
            <?php foreach($resultadosMaterias as $materia):?>
                <option value="<?=$materia["nombre_materia"]?>"><?=$materia["nombre_materia"]?></option>
            <?php endforeach; ?>
        </select>

        <label for="cuenta_profesor">Cuenta Profesor</label>
        <select name="cuenta_profesor" id="cuenta_profesor" required>
            <?php foreach($resultadosProfesores_plantel as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="crear_grupo">

        <input type="submit" value="Crear">

    </form>
</body>
</html>