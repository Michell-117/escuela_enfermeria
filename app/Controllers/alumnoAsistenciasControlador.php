<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class alumnoAsistenciasControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_asistencias_alumno($asistencias_alumno){
        // ----------------------------------------------------------------------------------------------
        $consulta_asistencias = $this->conecction->prepare("SELECT * FROM alumno_asistencias WHERE(alumno_general_id=:alumno_general_id)");
        $consulta_asistencias->bindValue(":alumno_general_id",$asistencias_alumno["alumno_general_id"]);

        $consulta_asistencias->execute();

        $resultado_consulta_asistencias = $consulta_asistencias->fetchAll();

        foreach($resultado_consulta_asistencias as $consulta_asistencias){
            echo nl2br(
                " <strong>Alumno ID: </strong>" . $consulta_asistencias["alumno_general_id"] ."\n"
                ." <strong>Materia: </strong>" . $consulta_asistencias["materias_id_materia"] ."\n"
                ." <strong>Asistencias: </strong>" . $consulta_asistencias["asistencias"]. "\n"
                ." <strong>Inasistencias: </strong>" . $consulta_asistencias["inasistencias"] . "\n"
                ." <strong>Mes: </strong>" . $consulta_asistencias["mes"] . "\n"
                ." <strong>Año: </strong>" . $consulta_asistencias["tiempo"] . "\n"
            );
            echo "<hr/>";
        }
        
    }

    // =======================================================================
    // =======================================================================
    
    public function obtener_asistencias_alumno_mes($asistencias_alumno_mes){
        // ----------------------------------------------------------------------------------------------
        $consulta_asistencias = $this->conecction->prepare("SELECT * FROM alumno_asistencias WHERE(alumno_general_id=:alumno_general_id AND mes=:mes)");
        $consulta_asistencias->bindValue(":alumno_general_id",$asistencias_alumno_mes["alumno_general_id"]);
        $consulta_asistencias->bindValue(":mes",$asistencias_alumno_mes["mes"]);

        $consulta_asistencias->execute();

        $resultado_consulta_asistencias = $consulta_asistencias->fetchAll();

        foreach($resultado_consulta_asistencias as $consulta_asistencias){
            echo nl2br(
                " <strong>Alumno ID: </strong>" . $consulta_asistencias["alumno_general_id"] ."\n"
                ." <strong>Materia: </strong>" . $consulta_asistencias["materias_id_materia"] ."\n"
                ." <strong>Asistencias: </strong>" . $consulta_asistencias["asistencias"]. "\n"
                ." <strong>Inasistencias: </strong>" . $consulta_asistencias["inasistencias"] . "\n"
                ." <strong>Mes: </strong>" . $consulta_asistencias["mes"] . "\n"
                ." <strong>Año: </strong>" . $consulta_asistencias["tiempo"] . "\n"
            );
            echo "<hr/>";
        }
        
    }

    // =======================================================================
    // =======================================================================
    
    public function obtener_asistencias_alumno_materia($asistencias_alumno_materia){
        // ----------------------------------------------------------------------------------------------
        $consulta_asistencias = $this->conecction->prepare("SELECT * FROM alumno_asistencias WHERE(alumno_general_id=:alumno_general_id AND materias_id_materia=:materias_id_materia)");
        $consulta_asistencias->bindValue(":alumno_general_id",$asistencias_alumno_materia["alumno_general_id"]);
        $consulta_asistencias->bindValue(":materias_id_materia",$asistencias_alumno_materia["materias_id_materia"]);

        $consulta_asistencias->execute();

        $resultado_consulta_asistencias = $consulta_asistencias->fetchAll();

        foreach($resultado_consulta_asistencias as $consulta_asistencias){
            echo nl2br(
                " <strong>Alumno ID: </strong>" . $consulta_asistencias["alumno_general_id"] ."\n"
                ." <strong>Materia: </strong>" . $consulta_asistencias["materias_id_materia"] ."\n"
                ." <strong>Asistencias: </strong>" . $consulta_asistencias["asistencias"]. "\n"
                ." <strong>Inasistencias: </strong>" . $consulta_asistencias["inasistencias"] . "\n"
                ." <strong>Mes: </strong>" . $consulta_asistencias["mes"] . "\n"
                ." <strong>Año: </strong>" . $consulta_asistencias["tiempo"] . "\n"
            );
            echo "<hr/>";
        }
        
    }

    // =======================================================================
    // =======================================================================
    public function asignar_asistencias_formulario(){
        require "../resources/views/control/asistencias.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function agregar_alumno_asistencia($alumno_asistencia){
        $consultaPreparada = $this->conecction->prepare("INSERT INTO alumno_asistencias(
            alumno_general_id, 
            materias_id_materia, 
            asistencias,
            inasistencias,
            mes,
            tiempo
          
        ) VALUES(
            :alumno_general_id, 
            :materias_id_materia, 
            :asistencias,
            :inasistencias,
            :mes,
            :tiempo
        );");

        $consultaPreparada->bindValue(":alumno_general_id",$alumno_asistencia["alumno_general_id"]);
        $consultaPreparada->bindValue(":materias_id_materia",$alumno_asistencia["materias_id_materia"]);
        $consultaPreparada->bindValue(":asistencias",$alumno_asistencia["asistencias"]);
        $consultaPreparada->bindValue(":inasistencias",$alumno_asistencia["inasistencias"]);
        $consultaPreparada->bindValue(":mes",$alumno_asistencia["mes"]);
        $consultaPreparada->bindValue(":tiempo",$alumno_asistencia["tiempo"]);
       
        $consultaPreparada->execute();

        echo "La tabla 'alumnos_asistencias' ha sido actualizada y bindeada para el alumno con el ID: " . $alumno_asistencia["alumno_general_id"].", para la materia con ID: ".$alumno_asistencia["materias_id_materia"].", con  " . $alumno_asistencia["asistencias"]." asistencias y " .$alumno_asistencia["inasistencias"] . " faltas en el mes de ".$alumno_asistencia["mes"] . " del año " . $alumno_asistencia["tiempo"];
        
    }
        
    // =======================================================================
    // =======================================================================
    
    public function modificar_asistencias_alumno($asistencias_alumno){
        // ----------------------------------------------------------------------------------------------
        $consulta_asistencias = $this->conecction->prepare("UPDATE alumno_asistencias SET asistencias = :asistencias WHERE(alumno_general_id=:alumno_general_id AND materias_id_materia=:materias_id_materia AND mes = :mes)");
        $consulta_asistencias->bindValue(":alumno_general_id",$asistencias_alumno["alumno_general_id"]);
        $consulta_asistencias->bindValue(":materias_id_materia",$asistencias_alumno["materias_id_materia"]);
        $consulta_asistencias->bindValue(":asistencias",$asistencias_alumno["asistencias"]);
        $consulta_asistencias->bindValue(":mes",$asistencias_alumno["mes"]);

        $consulta_asistencias->execute();

        echo "La tabla 'alumno_asistencias' ha sido actualizada y bindeada para el alumno con el ID: " .$asistencias_alumno["alumno_general_id"] . ", para la materia con ID: " .$asistencias_alumno["materias_id_materia"] . ", para el mes de ".$asistencias_alumno["mes"] . " con ".$asistencias_alumno["asistencias"] . " asistencias.";
    }
            
    // =======================================================================
    // =======================================================================
    
    public function modificar_inasistencias_alumno($inasistencias_alumno){
        // ----------------------------------------------------------------------------------------------
        $consulta_asistencias = $this->conecction->prepare("UPDATE alumno_asistencias SET inasistencias = :inasistencias WHERE(alumno_general_id=:alumno_general_id AND materias_id_materia=:materias_id_materia AND mes = :mes)");
        $consulta_asistencias->bindValue(":alumno_general_id",$inasistencias_alumno["alumno_general_id"]);
        $consulta_asistencias->bindValue(":materias_id_materia",$inasistencias_alumno["materias_id_materia"]);
        $consulta_asistencias->bindValue(":inasistencias",$inasistencias_alumno["inasistencias"]);
        $consulta_asistencias->bindValue(":mes",$inasistencias_alumno["mes"]);

        $consulta_asistencias->execute();

        echo "La tabla 'alumno_asistencias' ha sido actualizada y bindeada para el alumno con el ID: " .$inasistencias_alumno["alumno_general_id"] . ", para la materia con ID: " .$inasistencias_alumno["materias_id_materia"] . ", para el mes de ".$inasistencias_alumno["mes"] . " con ".$inasistencias_alumno["inasistencias"] . " inasistencias.";
    }

    // =======================================================================
    // =======================================================================

    public function eliminar_alumno_control($eliminar_alumno_control){
       
        $consultaPreparada = $this->conecction->prepare("DELETE FROM alumnos_control  WHERE (alumnos_control_id = :alumnos_control_id AND alumnos_general_id = :alumnos_general_id ); ");

        $consultaPreparada->bindValue(":alumnos_control_id",$eliminar_alumno_control["alumnos_control_id"]);
        $consultaPreparada->bindValue(":alumnos_general_id",$eliminar_alumno_control["alumnos_general_id"]);

        $consultaPreparada->execute();
        
        echo "El control del alumno con el id " . $eliminar_alumno_control["alumnos_general_id"] ." y alumnos_control_id: ".$eliminar_alumno_control["alumnos_control_id"] .", ha sido eliminado exitosamente.";

    }
}