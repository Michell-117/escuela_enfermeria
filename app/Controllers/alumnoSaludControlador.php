<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class alumnoSaludControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obteneralumnos(){
        $consulta = $this->conecction->prepare("SELECT * FROM alumno_salud");
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $alumno){
            echo nl2br(
             " <strong>ID alumno: </strong>" . $alumno["id_alumno_salud"] ."\n"
             ." <strong>Tipo de sangre: </strong>" . $alumno["tipo_sangre"] ."\n"
             ." <strong>Enfermedad cronica: </strong>" . $alumno["enfermedad_cronica"] . "\n"
             ." <strong>Alergia: </strong>" . $alumno["alergia"] . "\n"
             ." <strong>Servicio médico: </strong>" . $alumno["servicio_medico"] . "\n"
            );
            echo "<hr/>";
        }
    }
            
    // =======================================================================
    // =======================================================================
    
    public function agregarAlumnoFormulario_Salud(){
        $plantel = "JB";
        $grupo = "7";
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();
        
        require "../resources/views/alumnos/crearSalud.php";
    }
        
  
    // =======================================================================
    // =======================================================================

    public function agregar_alumno_salud($alumno_salud){

        $consultaPreparada = $this->conecction->prepare("INSERT INTO alumno_salud(
            cuenta_alumno, 
            tipo_sangre, 
            enfermedad_cronica, 
            alergia, 
            servicio_medico
        ) VALUES(
            :cuenta_alumno, 
            :tipo_sangre, 
            :enfermedad_cronica, 
            :alergia, 
            :servicio_medico
        );");

        $consultaPreparada->bindValue(":cuenta_alumno",$alumno_salud["cuenta_alumno_salud"]);
        $consultaPreparada->bindValue(":tipo_sangre",$alumno_salud["tipo_sangre"]);
        $consultaPreparada->bindValue(":enfermedad_cronica",$alumno_salud["enfermedad_cronica"]);
        $consultaPreparada->bindValue(":alergia",$alumno_salud["alergia"]);
        $consultaPreparada->bindValue(":servicio_medico",$alumno_salud["servicio_medico"]);
       

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }

    // =======================================================================
    // =======================================================================
    
    public function modificarAlumnoFormulario_Salud(){
        $plantel = "JB";
        $grupo = "7";
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();

        require "../resources/views/alumnos/modificarSalud.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_tipo_sangre($tipo_sangre){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_salud SET tipo_sangre = :tipo_sangre WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":tipo_sangre",$tipo_sangre["tipo_sangre"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$tipo_sangre["cuenta_alumno_salud"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_enfermedad_cronica($enfermedad_cronica){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_salud SET enfermedad_cronica = :enfermedad_cronica WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":enfermedad_cronica",$enfermedad_cronica["enfermedad_cronica"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$enfermedad_cronica["cuenta_alumno_salud"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_alergia($alergia){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_salud SET alergia = :alergia WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":alergia",$alergia["alergia"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$alergia["cuenta_alumno_salud"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_servicio_medico($servicio_medico){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_salud SET servicio_medico = :servicio_medico WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":servicio_medico",$servicio_medico["servicio_medico"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$servicio_medico["cuenta_alumno_salud"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
}