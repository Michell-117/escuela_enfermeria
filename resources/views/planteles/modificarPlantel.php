<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Plantel</title>
</head>
<body>

    <h1>Modificar plantel</h1>

    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="idplantelNuevo">Nuevo ID del Plantel</label>
        <input type="text" name="idplantelNuevo" id="idplantelNuevo" placeholder="Nuevo ID del Plantel" maxlength="5" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_idplantel">

        <input type="submit" value="Modificar">

    </form>

    <hr>

    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="nombre">Modificar Nombre Plantel</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_nombre">

        <input type="submit" value="Modificar">

    </form>
    
    <hr>
    
    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="domicilio">Modificar Domicilio Plantel</label>
        <input type="text" name="domicilio" id="domicilio" placeholder="Domicilio" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_domicilio">

        <input type="submit" value="Modificar">

    </form>
    
    <hr>

    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="telefono">Modificar Teléfono Plantel</label>
        <input type="tel" maxlength="10" name="telefono" id="telefono" placeholder="Teléfono" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_telefono">

        <input type="submit" value="Modificar">

    </form>

    <hr>
        
    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="dependencia_operativa">Modificar Dependencia Operativa Plantel</label>
        <input type="text" name="dependencia_operativa" id="dependencia_operativa" placeholder="Dependencia Operativa" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_dependecia_operativa">

        <input type="submit" value="Modificar">

    </form>

    <hr>

    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="control">Modificar Control Plantel</label>
        <input type="text" name="control" id="control" placeholder="Control" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_control">

        <input type="submit" value="Modificar">

    </form>

    <hr>

    
    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="sub_control">Modificar Sub-Control Plantel</label>
        <input type="text" name="sub_control" id="sub_control" placeholder="Sub-Control" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_sub_control">

        <input type="submit" value="Modificar">

    </form>

    <hr>
    
    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="sostenimiento">Modificar Sostenimiento Plantel</label>
        <input type="text" name="sostenimiento" id="sostenimiento" placeholder="Sostenimiento" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_sostenimiento">

        <input type="submit" value="Modificar">

    </form>

    <hr>
    
    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="administrador">Modificar Administrador Plantel</label>
        <input type="text" name="administrador" id="administrador" placeholder="Administrador" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_administrador">

        <input type="submit" value="Modificar">

    </form>

    <hr>

    
    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="cedula">Modificar Cédula Plantel</label>
        <input type="text" name="cedula" id="cedula" placeholder="Cédula" required>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_cedula">

        <input type="submit" value="Modificar">

    </form>

    <hr>

    <form action="" method="post">

        <label for="idplantel">Plantel</label>
        <select name="idplantel" id="idplantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>

        <label for="dictamen">Dictamen</label>
        <select name="dictamen" id="dictamen" required>
            <option value="Si">Si</option>
            <option value="No">No</option>
        </select>


        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="modificar_plantel_dictamen">

        <input type="submit" value="Modificar">

    </form>



</body>
</html>