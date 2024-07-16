<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulario agregar plantel</h1>

    <form action="" method="post">

    <label for="idplantel">ID del Plantel</label>
        <input type="text" name="idplantel" id="idplantel" placeholder="ID del plantel" required>

        <label for="nombre">Nombre Plantel</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre Plantel" required>

        <label for="domicilio">Domicilio</label>
        <input type="text" name="domicilio" id="domicilio" placeholder="Domicilio" required>

        <label for="telefono">Teléfono</label>
        <input type="tel" maxlength="10" name="telefono" id="telefono" placeholder="Teléfono" required>

        <label for="dependencia_operativa">Dependencia Operativa</label>
        <input type="text" name="dependencia_operativa" id="dependencia_operativa" placeholder="Dependencia Operativa" required>

        
        <label for="control">Control</label>
        <input type="text" name="control" id="control" placeholder="Control" required>

        
        <label for="sub_control">Sub-Control</label>
        <input type="text" name="sub_control" id="sub_control" placeholder="Sub-Control" required>

        <label for="sostenimiento">Sostenimiento</label>
        <input type="text" name="sostenimiento" id="sostenimiento" placeholder="Sostenimiento" required>

        <label for="administrador">Administrador</label>
        <input type="text" name="administrador" id="administrador" placeholder="Administrador" required>

        <label for="cedula">Cédula</label>
        <input type="text" name="cedula" id="cedula" placeholder="cedula" required>


        <label for="dictamen">Dictamen</label>
        <select name="dictamen" id="dictamen" required>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="crear_plantel" >

        <input type="submit" value="Agregar">
    </form>
</body>
</html>