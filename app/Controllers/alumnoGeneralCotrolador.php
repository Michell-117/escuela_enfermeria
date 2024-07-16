<?php

namespace App\Controllers;
use Database\PDO\Conecction;
use DateTime;

class alumnoGeneralCotrolador{
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }

    // =======================================================================
    // =======================================================================
    
    public function obtener_alumnos(){
        $consulta = $this->conecction->prepare("SELECT * FROM alumno_general");
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        require "../resources/views/alumnos/index.php";

    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_alumno($id_alumno_general){
        $consulta = $this->conecction->prepare("SELECT * FROM alumno_general WHERE(id_alumno_general=$id_alumno_general)");

        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $alumno){
            echo nl2br(
                " <strong>Cuenta: </strong>" . $alumno["cuenta"] ."\n"
                ." <strong>Nombre: </strong>" . $alumno["nombre"] ."\n"
                ." <strong>Segundo nombre: </strong>" . $alumno["nombre_2"] . "\n"
                ." <strong>Apellido Paterno: </strong>" . $alumno["apellido_paterno"] . "\n"
                ." <strong>Apellido Materno: </strong>" . $alumno["apellido_materno"] . "\n"
                ." <strong>Genero: </strong>" . $alumno["genero"] . "\n"
                ." <strong>CURP: </strong>" . $alumno["curp"] . "\n"
                ." <strong>Fecha de nacimiento: </strong>" . $alumno["fecha_nacimiento"] . "\n"
                ." <strong>Edad: </strong>" . $alumno["edad"] . "\n"
                ." <strong>Nivel máximo de estudios: </strong>" . $alumno["nivel_maximo_estudios"] . "\n"
                ." <strong>Entidad Federativa: </strong>" . $alumno["entidad_federativa"] . "\n"
                ." <strong>Grupo indigena: </strong>" . $alumno["grupo_indigena"] . "\n"
                ." <strong>Lengua indigena: </strong>" . $alumno["lengua_indigena"] . "\n"
                ." <strong>Ciclo escolar: </strong>" . $alumno["ciclo_escolar"] . "\n"
                ." <strong>Estatus: </strong>" . $alumno["estatus"] . "\n"
                ." <strong>Grupo: </strong>" . $alumno["plantel_grupo_id"] . "\n");
            echo "<hr/>";
        }


    }

    // =======================================================================
    // =======================================================================

    public function crearCurpAlumnoGeneral($alumno_arr){
        $letras="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $cuenta = "";

        $cuenta = $cuenta . $alumno_arr["apellido_paterno"][0];
        $cuenta = $cuenta . $alumno_arr["apellido_paterno"][1];
        
        $cuenta = $cuenta . $alumno_arr["apellido_materno"][0];

        $cuenta = $cuenta . $alumno_arr["nombre"][0];
   
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][2];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][3];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][5];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][6];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][8];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][9];
        
        $cuenta = $cuenta . $alumno_arr["genero"][0];

        $cuenta = $cuenta . "DF";

        $cuenta = $cuenta . $letras[random_int(0,25)];
        $cuenta = $cuenta . $letras[random_int(0,25)];
        $cuenta = $cuenta . $letras[random_int(0,25)];

        $cuenta = $cuenta . random_int(0,9);
        $cuenta = $cuenta . random_int(0,9); 
        
        $cuenta = strtoupper($cuenta);

        return $cuenta;
    }

    // =======================================================================
    // =======================================================================

    public function crearCuentaAlumnoGeneral($alumno_arr){
        $cuenta = "";

        $cuenta = $cuenta . $alumno_arr["nombre"][0];
        $cuenta = $cuenta . $alumno_arr["nombre"][1];
        
        if($alumno_arr["nombre_2"] == "n/a"){
            $cuenta = $cuenta . random_int(0,9);
            $cuenta = $cuenta . random_int(0,9); 
        }else{
            $cuenta = $cuenta . $alumno_arr["nombre_2"][0];
            $cuenta = $cuenta . $alumno_arr["nombre_2"][1];
        }
        
        $cuenta = $cuenta . $alumno_arr["apellido_paterno"][0];
        $cuenta = $cuenta . $alumno_arr["apellido_paterno"][1];
        
        $cuenta = $cuenta . $alumno_arr["apellido_materno"][0];
        $cuenta = $cuenta . $alumno_arr["apellido_materno"][1];
        
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][2];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][3];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][5];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][6];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][8];
        $cuenta = $cuenta . $alumno_arr["fecha_nacimiento"][9];
        
        $cuenta = $cuenta . $alumno_arr["genero"][0];
        $cuenta = $cuenta . random_int(1000,9999);
        
        $cuenta = strtoupper($cuenta);

        return $cuenta;
    }

    // =======================================================================
    // =======================================================================

    public function calcularEdad($fecha){
        $today = new DateTime();
        $nacimiento = new DateTime($fecha);
        $edad = $nacimiento->diff($today);

        return $edad->format("%y");
    }

    
    // =======================================================================
    // =======================================================================

    public function agregarAlumnoFormulario_General(){
        $plantel = ["JB","JMM","MAL","MC","MIX","ZAP"];
        // $plantel = "JB";
        $plantel1 = $plantel[1];

        $consulta = $this->conecction->prepare("SELECT idplantel FROM plantel WHERE(idplantel = :idplantel)");
        $consulta->bindValue(":idplantel",$plantel1);
        $consulta->execute();
        $resultadosplantel = $consulta->fetchAll();

        $consulta = $this->conecction->prepare("SELECT id_plantelGrupoEscolar FROM plantel_grupoescolar WHERE(plantel_id = :plantel_id)");
        $consulta->bindValue(":plantel_id",$plantel1);
        $consulta->execute();
        $resultadosplantelGrupoEscolar = $consulta->fetchAll();
        
        require "../resources/views/alumnos/crearGeneral.php";
    }

    // =======================================================================
    // =======================================================================

    public function agregarAlumno_General($alumno){
        $cuenta ="";
        $edad = "";
        $curp = "";

        $consultaPreparada = $this->conecction->prepare("INSERT INTO alumno_general(
            cuenta,
            nombre,
            nombre_2,
            apellido_paterno,
            apellido_materno,
            genero,
            curp,
            fecha_nacimiento,
            edad,
            nivel_maximo_estudios,
            entidad_federativa,
            grupo_indigena,
            lengua_indigena,
            ciclo_escolar,
            estatus,
            id_plantel,
            plantel_grupo_id
        ) VALUES(
            :cuenta,
            :nombre,
            :nombre_2,
            :apellido_paterno,
            :apellido_materno,
            :genero,
            :curp,
            :fecha_nacimiento,
            :edad,
            :nivel_maximo_estudios,
            :entidad_federativa,
            :grupo_indigena,
            :lengua_indigena,
            :ciclo_escolar,
            :estatus,
            :id_plantel,
            :plantel_grupo_id
        );");

        $cuenta = $this->crearCuentaAlumnoGeneral($alumno);
        $edad = $this->calcularEdad($alumno["fecha_nacimiento"]);
        $curp = $this->crearCurpAlumnoGeneral($alumno);

        $consultaPreparada->bindValue(":cuenta",$cuenta);
        $consultaPreparada->bindValue(":nombre",$alumno["nombre"]);
        $consultaPreparada->bindValue(":nombre_2",$alumno["nombre_2"]);
        $consultaPreparada->bindValue(":apellido_paterno",$alumno["apellido_paterno"]);
        $consultaPreparada->bindValue(":apellido_materno",$alumno["apellido_materno"]);
        $consultaPreparada->bindValue(":genero",$alumno["genero"]);
        $consultaPreparada->bindValue(":curp",$curp);
        // $consultaPreparada->bindValue(":curp",$alumno["curp"]);
        $consultaPreparada->bindValue(":fecha_nacimiento",$alumno["fecha_nacimiento"]);
        $consultaPreparada->bindValue(":edad",$edad);
        $consultaPreparada->bindValue(":nivel_maximo_estudios",$alumno["nivel_maximo_estudios"]);
        $consultaPreparada->bindValue(":entidad_federativa",$alumno["entidad_federativa"]);
        $consultaPreparada->bindValue(":grupo_indigena",$alumno["grupo_indigena"]);
        $consultaPreparada->bindValue(":lengua_indigena",$alumno["lengua_indigena"]);
        $consultaPreparada->bindValue(":ciclo_escolar",$alumno["ciclo_escolar"]);
        $consultaPreparada->bindValue(":estatus",$alumno["estatus"]);
        $consultaPreparada->bindValue(":id_plantel",$alumno["id_plantel"]);
        $consultaPreparada->bindValue(":plantel_grupo_id",$alumno["plantel_grupo_id"]);
        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificarAlumnoFormulario_General(){

        $plantel="JMM";
        $consulta_grupo = $this->conecction->prepare("SELECT id_plantelGrupoEscolar FROM plantel_grupoescolar");
        $consulta_grupo->execute();
        $resultadosplantelGrupoEscolar = $consulta_grupo->fetchAll();
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel)");
        $consulta_alumnos->bindValue(":id_plantel",$plantel);
        $consulta_alumnos->execute();
        $resultadosalumnoGeneralCuenta = $consulta_alumnos->fetchAll();

        $consulta_plantel = $this->conecction->prepare("SELECT idplantel FROM plantel");
        $consulta_plantel->execute();
        $resultadosPlantel = $consulta_plantel->fetchAll();

        $consulta_grupos = $this->conecction->prepare("SELECT id_plantelGrupoEscolar FROM plantel_grupoescolar WHERE(plantel_id=:plantel_id)");
        $consulta_grupos->bindValue(":plantel_id",$plantel);
        $consulta_grupos->execute();
        $resultados_grupos_plantel = $consulta_grupos->fetchAll();

        require "../resources/views/alumnos/modificarGeneral.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificar_nombre($nombre){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET nombre = :nombre WHERE (cuenta = :cuenta )");

        $consultaPreparada->bindValue(":nombre",$nombre["nombre"]);
        $consultaPreparada->bindValue(":cuenta",$nombre["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificar_nombre_2($nombre_2){

        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET nombre_2 = :nombre_2 WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":nombre_2",$nombre_2["nombre_2"]);
        $consultaPreparada->bindValue(":cuenta",$nombre_2["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificar_apellido_paterno($apellido_paterno){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET apellido_paterno = :apellido_paterno WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":apellido_paterno",$apellido_paterno["apellido_paterno"]);
        $consultaPreparada->bindValue(":cuenta",$apellido_paterno["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificar_apellido_materno($apellido_materno){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET apellido_materno = :apellido_materno WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":apellido_materno",$apellido_materno["apellido_materno"]);
        $consultaPreparada->bindValue(":cuenta",$apellido_materno["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_genero($genero){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET genero = :genero WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":genero",$genero["genero"]);
        $consultaPreparada->bindValue(":cuenta",$genero["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_curp($curp){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET curp = :curp WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":curp",$curp["curp"]);
        $consultaPreparada->bindValue(":cuenta",$curp["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_fecha_nacimiento($fecha_nacimiento){

        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET fecha_nacimiento = :fecha_nacimiento WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":fecha_nacimiento",$fecha_nacimiento["fecha_nacimiento"]);
        $consultaPreparada->bindValue(":cuenta",$fecha_nacimiento["cuenta_alumno_general"]);

        $consultaPreparada->execute();


        require "../resources/views/avisos/aviso1.php";
    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_edad($edad){

        $consulta_fecha = $this->conecction->prepare("SELECT fecha_nacimiento FROM alumno_general WHERE(cuenta = :cuenta)");
        $consulta_fecha->bindValue(":cuenta",$edad["cuenta_alumno_general"]);
        $consulta_fecha->execute();

        $consulta_fecha_nacimiento = $consulta_fecha->fetchAll();

        $fecha_cumple = $consulta_fecha_nacimiento[0][0];

        // var_dump($fecha_cumple);

        $edad_actualizada = $this->calcularEdad($fecha_cumple);
        // var_dump($edad_actualizada);
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET edad = :edad WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":edad",$edad_actualizada);
        $consultaPreparada->bindValue(":cuenta",$edad["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_nivel_maximo_estudios($nivel_maximo_estudios){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET nivel_maximo_estudios = :nivel_maximo_estudios WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":nivel_maximo_estudios",$nivel_maximo_estudios["nivel_maximo_estudios"]);
        $consultaPreparada->bindValue(":cuenta",$nivel_maximo_estudios["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_entidad_federativa($entidad_federativa){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET entidad_federativa = :entidad_federativa WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":entidad_federativa",$entidad_federativa["entidad_federativa"]);
        $consultaPreparada->bindValue(":cuenta",$entidad_federativa["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

                
    // =======================================================================
    // =======================================================================

    public function modificar_grupo_indigena($grupo_indigena){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET grupo_indigena = :grupo_indigena WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":grupo_indigena",$grupo_indigena["grupo_indigena"]);
        $consultaPreparada->bindValue(":cuenta",$grupo_indigena["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
                    
    // =======================================================================
    // =======================================================================

    public function modificar_lengua_indigena($lengua_indigena){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET lengua_indigena = :lengua_indigena WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":lengua_indigena",$lengua_indigena["lengua_indigena"]);
        $consultaPreparada->bindValue(":cuenta",$lengua_indigena["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_ciclo_escolar($ciclo_escolar){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET ciclo_escolar = :ciclo_escolar WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":ciclo_escolar",$ciclo_escolar["ciclo_escolar"]);
        $consultaPreparada->bindValue(":cuenta",$ciclo_escolar["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }
                        
    // =======================================================================
    // =======================================================================

    public function modificar_estatus($estatus){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET estatus = :estatus WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":estatus",$estatus["estatus"]);
        $consultaPreparada->bindValue(":cuenta",$estatus["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        $type = "modificado(estatus)";
        $subject = "Alumno";
        require "../resources/views/avisos/aviso1.php";
    }
                                            
    // =======================================================================
    // =======================================================================

    public function modificar_plantel_grupo_id($plantel_grupo_id){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET plantel_grupo_id = :plantel_grupo_id WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":plantel_grupo_id",$plantel_grupo_id["plantel_grupo_id"]);
        $consultaPreparada->bindValue(":cuenta",$plantel_grupo_id["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

    public function modificar_plantel($plantel){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_general SET id_plantel = :id_plantel WHERE (cuenta = :cuenta ); ");

        $consultaPreparada->bindValue(":id_plantel",$plantel["id_plantel"]);
        $consultaPreparada->bindValue(":cuenta",$plantel["cuenta_alumno_general"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

}
