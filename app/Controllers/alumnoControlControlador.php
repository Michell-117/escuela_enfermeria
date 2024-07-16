<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class alumnoControlControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_control_alumno($control_alumno){
        // ----------------------------------------------------------------------------------------------
        $consulta_alumno_control = $this->conecction->prepare("SELECT * FROM alumnos_control WHERE(alumnos_general_id=:alumnos_general_id)");
        $consulta_alumno_control->bindValue(":alumnos_general_id",$control_alumno["alumnos_general_id"]);

        $consulta_alumno_control->execute();

        $resultado_consulta_alumno_control = $consulta_alumno_control->fetchAll();

        foreach($resultado_consulta_alumno_control as $alumno_control){
            echo nl2br(
                " <strong>Control_id: </strong>" . $alumno_control["alumnos_control_id"] ."\n"
                ." <strong>Cuenta: </strong>" . $alumno_control["alumnos_general_id"] ."\n"
                ." <strong>Control: </strong>" . $alumno_control["control_control"] ."\n"
                ." <strong>Fecha: </strong>" . $alumno_control["fecha"]. "\n"
                ." <strong>Nota: </strong>" . $alumno_control["nota"] . "\n"
            );
            echo "<hr/>";
        }
        
    }
        
    // =======================================================================
    // =======================================================================

    public function agregar_alumno_control($alumno_control){
        $consultaPreparada = $this->conecction->prepare("INSERT INTO alumnos_control(
            alumnos_general_id, 
            control_control, 
            fecha,
            nota
          
        ) VALUES(
            :alumnos_general_id,
            :control_control,
            :fecha,
            :nota
        );");

        $consultaPreparada->bindValue(":alumnos_general_id",$alumno_control["alumnos_general_id"]);
        $consultaPreparada->bindValue(":control_control",$alumno_control["control_control"]);
        $consultaPreparada->bindValue(":fecha",$alumno_control["fecha"]);
        $consultaPreparada->bindValue(":nota",$alumno_control["nota"]);
       
        $consultaPreparada->execute();

        echo "La tabla 'alumnos_control' ha sido actualizada y bindeada para el alumno con el ID: " . $alumno_control["alumnos_general_id"].", para: ".$alumno_control["control_control"].", con fecha de: " . $alumno_control["fecha"];
        
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