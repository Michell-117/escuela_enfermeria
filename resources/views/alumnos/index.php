<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumnos</title>
    </head>
    <body>
        <h1>Alumnos General</h1>
        <?php foreach($resultadosConsulta as $alumno):?>
            <p><b>Cuenta: </b> <?=$alumno["cuenta"] ?> </p>
            <p><b>Nombre: </b> <?=$alumno["nombre"] ?> </p>
            <p><b>Segundo nombre: </b> <?=$alumno["nombre_2"] ?> </p>
            <p><b>Apellido paterno: </b> <?=$alumno["apellido_paterno"] ?> </p>
            <p><b>Apellido materno: </b> <?=$alumno["apellido_materno"] ?> </p>
            <p><b>Genero: </b> <?=$alumno["genero"] ?> </p>
            <p><b>Curp: </b> <?=$alumno["curp"] ?> </p>
            <p><b>Fecha de nacimiento: </b> <?=$alumno["fecha_nacimiento"] ?> </p>
            <p><b>Edad: </b> <?=$alumno["edad"] ?> </p>
            <p><b>Nivel máximo de estudios: </b> <?=$alumno["nivel_maximo_estudios"] ?> </p>
            <p><b>Entidad Federativa: </b> <?=$alumno["entidad_federativa"] ?> </p>
            <p><b>Grupo indigena: </b> <?=$alumno["grupo_indigena"] ?> </p>
            <p><b>Lengua indigena: </b> <?=$alumno["lengua_indigena"] ?> </p>
            <p><b>Ciclo escolar: </b> <?=$alumno["ciclo_escolar"] ?> </p>
            <p><b>Estatus: </b> <?=$alumno["estatus"] ?> </p>
            <p><b>Grupo: </b> <?=$alumno["plantel_grupo_id"] ?> </p>
            <hr>
        <?php endforeach; ?>
            
        
    </body>
</html>