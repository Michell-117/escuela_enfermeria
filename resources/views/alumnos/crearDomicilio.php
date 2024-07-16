<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno - Domicilio</title>
</head>
<body>
    <h1>Formulario agregar alumno domicilio</h1>
    <form action="" method="post">
        
        <label for="cuenta_alumno_domicilio">Cuenta Alumno</label>
        <select name="cuenta_alumno_domicilio" id="cuenta_alumno_domicilio" required>
            <?php foreach($resultados_alumnos as $cuenta):?>
                <option value="<?=$cuenta["cuenta"]?>"><?=$cuenta["cuenta"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="calle">Calle</label>
        <input type="text" name="calle" id="calle" placeholder="Emiliano Zapata">

        <label for="numero_exterior">Número exterior</label>
        <input type="text" name="numero_exterior" id="numero_exterior" placeholder="117">

        <label for="numero_interior">Número interior</label>
        <input type="text" name="numero_interior" id="numero_interior" placeholder="casa 47">
        
        <label for="manzana">Manzana</label>
        <input type="text" name="manzana" id="manzana" placeholder="7">

        <label for="lote">Lote</label>
        <input type="text" name="lote" id="lote" placeholder="22">

        <label for="barrio_colonia">Barrio o colonia</label>
        <input type="text" name="barrio_colonia" id="barrio_colonia" placeholder="22">

        <label for="codigo_postal">Código postal</label>
        <input type="text" name="codigo_postal" id="codigo_postal" placeholder="18075">

        <label for="alcaldia">Alcaldia</label>
        <select name="alcaldia" id="alcaldia">
            <option value="Álvaro Óbregon">Álvaro Óbregon</option>
            <option value="Azcapotzalco">Azcapotzalco</option>
            <option value="Benito Juárez">Benito Juárez</option>
            <option value="Coyoacán">Coyoacán</option>
            <option value="Cuajimalpa">Cuajimalpa</option>
            <option value="Cuauhtémoc">Cuauhtémoc</option>
            <option value="Gustavo A. Madero">Gustavo A. Madero</option>
            <option value="Iztacalco">Iztacalco</option>
            <option value="Iztapalapa">Iztapalapa</option>
            <option value="Magdalena Contreras">Magdalena Contreras</option>
            <option value="Miguel Hidalgo">Miguel Hidalgo</option>
            <option value="Milpa Alta">Milpa Alta</option>
            <option value="Tláhuac">Tláhuac</option>
            <option value="Tlalpan">Tlalpan</option>
            <option value="Venustiano Carranza">Venustiano Carranza</option>
            <option value="Xochimilco">Xochimilco</option>
        </select>

        <label for="coordinacion_territorial">Coordinacion territorial</label>
        <input type="text" name="coordinacion_territorial" id="coordinacion_territorial" placeholder="Coordinación Territorial">


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="crear_alumno_domicilio">

        <input type="submit" value="Agregar">

    </form>
</body>
</html>