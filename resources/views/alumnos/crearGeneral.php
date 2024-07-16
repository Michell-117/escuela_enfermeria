<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulario agregar alumno general</h1>

    <form action="" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>

        <label for="nombre_2">Segundo nombre</label>
        <input type="text" name="nombre_2" id="nombre_2" placeholder="Segundo nombre" required>

        <label for="apellido_paterno">Apellido Paterno</label>
        <input type="text" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido Paterno" required>

        <label for="apellido_materno">Apellido Materno</label>
        <input type="text" name="apellido_materno" id="apellido_materno" placeholder="Apellido materno" required>

        <label for="genero">Género</label>
        <select name="genero" id="genero" required>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select>

        <!-- <label for="curp">Curp</label>
        <input type="text" name="curp" id="curp" placeholder="RUAM930729HDFZRC01" required> -->

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>

        <label for="nivel_maximo_estudios">Nivel Máximo de Estudios</label>
        <select name="nivel_maximo_estudios" id="nivel_maximo_estudios" required>
            <option value="Primaria">Primaria</option>
            <option value="Secundaria">Secundaria</option>
            <option value="Tecnólogo">Tecnólogo</option>
            <option value="Bachillerato General">Bachillerato General</option>
            <option value="Bachillerato Tecnológico">Bachillerato Tecnológico</option>
            <option value="Profesional Técnico">Profesional Técnico</option>
            <option value="Técnico Superior Universitario">Técnico Superior Universitario</option>
            <option value="Licenciatura">Licenciatura</option>
        </select>

        <label for="entidad_federativa">Entidad Federativa</label>
        <select name="entidad_federativa" id="entidad_federativa" required>
            <option value="Aguascalientes">Aguascalientes</option>
            <option value="Baja California">Baja California</option>
            <option value="Baja California Sur">Baja California Sur</option>
            <option value="Campeche">Campeche</option>
            <option value="Chiapas">Chiapas</option>
            <option value="Chihuahua">Chihuahua</option>
            <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
            <option value="Ciudad de México">Ciudad de México</option>
            <option value="Durango">Durango</option>
            <option value="Guanajuato">Guanajuato</option>
            <option value="Guerrero">Guerrero</option>
            <option value="Hidalgo">Hidalgo</option>
            <option value="Jalisco">Jalisco</option>
            <option value="Michoacan de Ocampo">Michoacan de Ocampo</option>
            <option value="Morelos">Morelos</option>
            <option value="Nayarit">Nayarit</option>
            <option value="Nuevo León">Nuevo León</option>
            <option value="Oaxaca">Oaxaca</option>
            <option value="Puebla">Puebla</option>
            <option value="Querétaro">Querétaro</option>
            <option value="Quintana Roo">Quintana Roo</option>
            <option value="San Luis Potosí">San Luis Potosí</option>
            <option value="Sinaloa">Sinaloa</option>
            <option value="Sonora">Sonora</option>
            <option value="Tabasco">Tabasco</option>
            <option value="Tamaulipas">Tamaulipas</option>
            <option value="Tlaxcala">Tlaxcala</option>
            <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
            <option value="Yucatán">Yucatán</option>
            <option value="Zacatecas">Zacatecas</option>
        </select>

        <label for="grupo_indigena">Grupo Indigena</label>
        <select name="grupo_indigena" id="grupo_indigena" required>
            <option value="n/a">n/a</option>
            <option value="Ku'ahles">Ku'ahles</option>
            <option value="Pa ipais">Pa ipais</option>
            <option value="Cucapás">Cucapás</option>
            <option value="CochimíesKiliwas">CochimíesKiliwas</option>
            <option value="Kiliwas">Kiliwas</option>
            <option value="Kumiais">Kumiais</option>

            <option value="Akatecos">Akatecos</option>
            <option value="Ixiles">Ixiles</option>
            <option value="K'iches">K'iches</option>
            <option value="Q'eqchis'">Q'eqchis'</option>
            <option value="Awakatekos">Awakatekos</option>
            
            <option value="Kikapúes">Kikapúes</option>

            <option value="Kumiais">Kumiais</option>
            <option value="Tekos">Tekos</option>
            <option value="Tsotsiles">Tsotsiles</option>
            <option value="Kaqchikeles">Kaqchikeles</option>
            <option value="Mochós">Mochós</option>
            <option value="Ch'oles">Ch'oles</option>
            <option value="Mames">Mames</option>
            <option value="Tseltales">Tseltales</option>
            <option value="Akatecos">Akatecos</option>
            <option value="Tojolabales">Tojolabales</option>
            <option value="Lacandones">Lacandones</option>
            <option value="Chujes">Chujes</option>
            <option value="K'anjob'ales-Q'anjob'ales">K'anjob'ales-Q'anjob'ales</option>
            <option value="Zoques">Zoques</option>
            
            <option value="Tarahumaras">Tarahumaras</option>
            <option value="Pimas">Pimas</option>
            <option value="Tepehuanos del norte">Tepehuanos del norte</option>
            <option value="Guarijó">Guarijó</option>
            
            <option value="Pueblos Nahuas">Pueblos Nahuas</option>
            
            <option value="Tepehuanos del sur">Tepehuanos del sur</option>

            <option value="Chichimecas">Chichimecas</option>
            
            <option value="Amuzgos">Amuzgos</option>
            <option value="Tlapanecos">Tlapanecos</option>
            
            <option value="Otomíes">Otomíes</option>

            <option value="Mazahuas">Mazahuas</option>
            <option value="Tlahuicas">Tlahuicas</option>
            <option value="Matlatzincas">Matlatzincas</option>
            <option value="P'urhépechas">P'urhépechas</option>
            <option value="Coras">Coras</option>
            <option value="Huicholes">Huicholes</option>
            
            <option value="Mazatecos">Mazatecos</option>
            <option value="Chontales de Oaxaca">Chontales de Oaxaca</option>
            <option value="Cuicatecos">Cuicatecos</option>
            <option value="Zapotecos">Zapotecos</option>
            <option value="Ixcatecos">Ixcatecos</option>
            <option value="Mixes">Mixes</option>
            <option value="Mixtecos">Mixtecos</option>
            <option value="Chocholtecos">Chocholtecos</option>
            <option value="Chinantecos">Chinantecos</option>
            <option value="Triquis">Triquis</option>
            <option value="Tacuates">Tacuates</option>
            <option value="Huaves">Huaves</option>
            <option value="Chatinos">Chatinos</option>

            <option value="Popolocas">Popolocas</option>

            <option value="Huastecos">Huastecos</option>
            <option value="Pames">Pames</option>
            
            <option value="Guarijíos">Guarijíos</option>
            <option value="Seris">Seris</option>
            <option value="Pápagos">Pápagos</option>
            <option value="Yaquis">Yaquis</option>
            <option value="Mayos">Mayos</option>
            
            <option value="Ayapanecos">Ayapanecos</option>
            <option value="Chontales de Tabasco">Chontales de Tabasco</option>
            
            <option value="Totonacos">Totonacos</option>
            <option value="Olutecos">Olutecos</option>
            <option value="Sayultecos">Sayultecos</option>
            <option value="Tepehuas">Tepehuas</option>
            <option value="Popolucas">Popolucas</option>
            <option value="Texistepequeños">Texistepequeños</option>
            
            <option value="Mayas">Mayas</option>

        </select>
        
        <label for="lengua_indigena">Lengua Indigena</label>
        <select name="lengua_indigena" id="lengua_indigena" required>

            <option value="n/a">n/a</option>
            <option value="Akateko">Akateko</option>
            <option value="Amuzgo">amuzgo</option>
            <option value="Awakateko">Awakateko</option>
            <option value="Ayapaneco">Ayapaneco</option>
            <option value="cora">cora</option>
            <option value="cucapá">cucapá</option>
            <option value="cuicateco">cuicateco</option>
            <option value="chatino">chatino</option>
            <option value="chichimeco jonaz">chichimeco jonaz</option>
            <option value="chinanteco">chinanteco</option>
            <option value="chocholteco">chocholteco</option>
            <option value="chontal de Oaxaca">chontal de Oaxaca</option>
            <option value="chontal de Tabasco">chontal de Tabasco</option>
            <option value="Chuj">Chuj</option>
            <option value="Ch'ol">Ch'ol</option>
            <option value="guarijío">guarijío</option>
            <option value="huasteco">huasteco</option>
            <option value="huave">huave</option>
            <option value="huichol">huichol</option>
            <option value="ixcateco">ixcateco</option>
            <option value="Ixil">Ixil</option>
            <option value="Jakalteko">Jakalteko</option>
            <option value="Kaqchikel">Kaqchikel</option>
            <option value="Kickapoo">Kickapoo</option>
            <option value="kiliwa">kiliwa</option>
            <option value="kumiai">kumiai</option>
            <option value="ku'ahl">ku'ahl</option>
            <option value="K'iche'">K'iche'</option>
            <option value="lacandón">lacandón</option>
            <option value="Mam">Mam</option>
            <option value="matlatzinca">matlatzinca</option>
            <option value="maya">maya</option>
            <option value="mayo">mayo</option>
            <option value="mazahua">mazahua</option>
            <option value="mazateco">mazateco</option>
            <option value="mixe">mixe</option>
            <option value="mixteco">mixteco</option>
            <option value="náhuatl">náhuatl</option>
            <option value="oluteco">oluteco</option>
            <option value="otomí">otomí</option>
            <option value="paipai">paipai</option>
            <option value="pame">pame</option>
            <option value="pápago">pápago</option>
            <option value="pima">pima</option>
            <option value="popoloca">popoloca</option>
            <option value="popoluca de la Sierra">popoluca de la Sierra</option>
            <option value="qato'k">qato'k</option>
            <option value="Q'anjob'al">Q'anjob'al</option>
            <option value="Q'eqchí'">Q'eqchí'</option>
            <option value="sayulteco">sayulteco</option>
            <option value="seri">seri</option>
            <option value="tarahumara">tarahumara</option>
            <option value="tarasco">tarasco</option>
            <option value="Teko">Teko</option>
            <option value="tepehua">tepehua</option>
            <option value="tepehuano del norte">tepehuano del norte</option>
            <option value="tepehuano del sur">tepehuano del sur</option>
            <option value="texistepequeño">texistepequeño</option>
            <option value="tlahuica">tlahuica</option>
            <option value="tlapaneco">tlapaneco</option>
            <option value="tojolabal">tojolabal</option>
            <option value="totonaco">totonaco</option>
            <option value="triqui">triqui</option>
            <option value="tseltal">tseltal</option>
            <option value="tsotsil">tsotsil</option>
            <option value="yaqui">yaqui</option>
            <option value="zapoteco">zapoteco</option>
            <option value="zoque">zoque</option>
            
        </select>
        
        <label for="ciclo_escolar">Ciclo escolar</label>
        <input type="text" name="ciclo_escolar" id="ciclo_escolar" placeholder="2024-2" required>
        
        <label for="estatus">Estatus</label>
        <select name="estatus" id="estatus" required>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <label for="id_plantel">Plantel</label>
        <select name="id_plantel" id="id_plantel" required>
            <?php foreach($resultadosplantel as $plantel):?>
                <option value="<?=$plantel["idplantel"]?>"><?=$plantel["idplantel"]?></option>
            <?php endforeach; ?>
            
        </select>
        
        <label for="plantel_grupo_id">Grupo</label>
        <select name="plantel_grupo_id" id="plantel_grupo_id" required>
            <?php foreach($resultadosplantelGrupoEscolar as $grupo_escolar):?>
                <option value="<?=$grupo_escolar["id_plantelGrupoEscolar"]?>"><?=$grupo_escolar["id_plantelGrupoEscolar"]?></option>
            <?php endforeach; ?>
            
        </select>

        <!-- <label for="plantel_grupo_id">Grupo</label>
        <input type="text" name="plantel_grupo_id" id="plantel_grupo_id" placeholder="38" required> -->

        <input type="hidden" name="method" value="post">
        <input type="hidden" name="formulario" value="crear_alumno_general" >

        <input type="submit" value="Agregar">

    </form>
</body>
</html>