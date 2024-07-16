<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Grupo</title>
</head>
<body>

    <h1>Modificar Grupo</h1>

    <!-- #region Modificar Plantel -->

    <form action="" method="post">

        <h3>Modificar Plantel</h3>

        <label for="id_plantelGrupoEscolar">ID Grupo</label>
        <select name="id_plantelGrupoEscolar" id="id_plantelGrupoEscolar" required>
            <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
            <?php endforeach; ?>
            
        </select>

        
        <label for="nuevo_plantel_id">Nuevo Plantel</label>
        <select name="nuevo_plantel_id" id="nuevo_plantel_id" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_grupo_plantel_id">

        <input type="submit" value="Modificar">

    </form>

    <hr>
  
    <form action="" method="post">

        <h3>Modificar Grupo</h3>

        <label for="id_plantelGrupoEscolar">ID Grupo</label>
        <select name="id_plantelGrupoEscolar" id="id_plantelGrupoEscolar" required>
            <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
            <?php endforeach; ?>
        </select>

        
        <label for="nuevo_grupo">Nuevo Grupo</label>
        <select name="nuevo_grupo" id="nuevo_grupo" required>
            <?php foreach($resultadosgrupos as $grupos):?>
                <option value="<?=$grupos["grupo"]?>"><?=$grupos["grupo"]?></option>
            <?php endforeach; ?>
            
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_grupo_grupo">

        <input type="submit" value="Modificar">

    </form>

    <hr>
      
    <form action="" method="post">

        <h3>Modificar Horario</h3>

        <label for="id_plantelGrupoEscolar">ID Grupo</label>
        <select name="id_plantelGrupoEscolar" id="id_plantelGrupoEscolar" required>
            <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
            <?php endforeach; ?>
        </select>

        
        <label for="nuevo_horario">Nuevo Horario</label>
        <select name="nuevo_horario" id="nuevo_horario" required>
            <?php foreach($resultadosHorarios as $horarios):?>
                <option value="<?=$horarios["horario"]?>"><?=$horarios["horario"]?></option>
            <?php endforeach; ?>
            
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_grupo_horario">

        <input type="submit" value="Modificar">

    </form>

    <hr>
          
    <form action="" method="post">

        <h3>Modificar Turno</h3>

        <label for="id_plantelGrupoEscolar">ID Grupo</label>
        <select name="id_plantelGrupoEscolar" id="id_plantelGrupoEscolar" required>
            <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
            <?php endforeach; ?>
        </select>

        
        <label for="nuevo_turno">Nuevo turno</label>
        <select name="nuevo_turno" id="nuevo_turno" required>
            <?php foreach($resultadosTurnos as $Turnos):?>
                <option value="<?=$Turnos["turno"]?>"><?=$Turnos["turno"]?></option>
            <?php endforeach; ?>
            
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_grupo_turno">

        <input type="submit" value="Modificar">

    </form>

    <hr>
              
    <form action="" method="post">

        <h3>Modificar Días</h3>

        <label for="id_plantelGrupoEscolar">ID Grupo</label>
        <select name="id_plantelGrupoEscolar" id="id_plantelGrupoEscolar" required>
            <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
            <?php endforeach; ?>
        </select>

        
        <label for="nuevo_dias">Nuevos Días</label>
        <select name="nuevo_dias" id="nuevo_dias" required>
            <?php foreach($resultadosDias as $Dias):?>
                <option value="<?=$Dias["dias"]?>"><?=$Dias["dias"]?></option>
            <?php endforeach; ?>
            
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_grupo_dias">

        <input type="submit" value="Modificar">

    </form>

    <hr>
              
        <form action="" method="post">
    
            <h3>Modificar materia</h3>
    
            <label for="id_plantelGrupoEscolar">ID Grupo</label>
            <select name="id_plantelGrupoEscolar" id="id_plantelGrupoEscolar" required>
                <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                    <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
                <?php endforeach; ?>
            </select>
    
            
            <label for="nombre_materia">Nueva Materia</label>
            <select name="nombre_materia" id="nombre_materia" required>
                <?php foreach($resultadosMaterias as $materia):?>
                    <option value="<?=$materia["nombre_materia"]?>"><?=$materia["nombre_materia"]?></option>
                <?php endforeach; ?>
                
            </select>
    
            <input type="hidden" name="method" value="post">
            <input type="hidden" name="formulario" value="modificar_grupo_materia">
    
            <input type="submit" value="Modificar">
    
        </form>

    <hr>
                  
    <form action="" method="post">

        <h3>Modificar Profesor</h3>

        <label for="id_plantelGrupoEscolar">ID Grupo</label>
        <select name="id_plantelGrupoEscolar" id="id_plantelGrupoEscolar" required>
            <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
            <?php endforeach; ?>
        </select>

        
        <label for="nueva_cuenta_profesor">Nueva Cuenta Profesor</label>
        <select name="nueva_cuenta_profesor" id="nueva_cuenta_profesor" required>
            <?php foreach($resultadosProfesores as $profesor):?>
                <option value="<?=$profesor["cuenta_profesor"]?>"><?=$profesor["cuenta_profesor"]?></option>
            <?php endforeach; ?>
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_grupo_cuenta_profesor">

        <input type="submit" value="Modificar">

    </form>

    <hr>



                    
                             


















</body>
</html>