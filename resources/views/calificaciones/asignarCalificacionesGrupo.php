<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar contactoAlumno</title>
</head>

<body>
    <h1>Asignar calificaciones</h1> 
    <p><b>Cuenta Profesor: </b><?=$cuenta_profesor?></p> 
    <p><b>Plantel: </b><?=$sede?></p>
    <p><b>Grupo: </b><?=$grupo?></p>
    <p><b>Materia: </b><?=$nombre_materia?></p>
    

    <hr>
    <form action="" method="post">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cuenta</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Nombre</th>
                    <th>Segundo nombre</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($cuentasAlumnos as $alumno):?>
                        
                        <tr>
                            <td> <?=$lista = $lista + 1 ?> </td>
                            <td> <?=$alumno["cuenta"] ?> </td>
                            <td> <?=$alumno["apellido_paterno"] ?> </td>
                            <td> <?=$alumno["apellido_materno"] ?> </td>
                            <td> <?=$alumno["nombre"] ?> </td>
                            <td> <?=$alumno["nombre_2"] ?> </td>
                            <td><input type="number" max="10" step="0.1" min="5" name="<?=$alumno["cuenta"]?>" id="<?=$alumno["cuenta"]?>" required></td>
                        </tr>
                        
                    <?php endforeach; ?>

            </tbody>
        </table>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="calificar_alumnos_grupo">
        <input type="hidden" name="materia" value="<?=$id_materia?>">
        <input type="submit" value="Asignar calificaciones">
    </form>

</body>
</html>