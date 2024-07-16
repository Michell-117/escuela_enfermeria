<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class profesorSaludControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_profesor_salud(){
        $consulta = $this->conecction->prepare("SELECT * FROM profesor_salud");
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $profesor_salud){
            echo nl2br(
             " <strong>ID profesor: </strong>" . $profesor_salud["profesor_id"] ."\n"
             ." <strong>Tipo de sangre: </strong>" . $profesor_salud["tipo_sangre"] ."\n"
             ." <strong>Enfermedad cronica: </strong>" . $profesor_salud["enfermedad_cronica"] . "\n"
             ." <strong>Alergia: </strong>" . $profesor_salud["alergia"] . "\n"
             ." <strong>Servicio médico: </strong>" . $profesor_salud["servicio_medico"] . "\n"
            );
            echo "<hr/>";
        }
    }
                
    // =======================================================================
    // =======================================================================
    
    public function agregarProfesorFormulario_Salud(){
        $plantel="MAL";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");

        $consulta->bindValue(":plantel",$plantel);
        $consulta->execute();
        $resultados_profesores = $consulta->fetchAll();

        require "../resources/views/profesores/crearSalud.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function crear_profesor_salud($profesor_salud){
        $consultaPreparada = $this->conecction->prepare("INSERT INTO profesor_salud(
            cuenta_profesor, 
            tipo_sangre, 
            enfermedad_cronica, 
            alergia, 
            servicio_medico
        ) VALUES(
            :cuenta_profesor, 
            :tipo_sangre, 
            :enfermedad_cronica, 
            :alergia, 
            :servicio_medico
        );");

        $consultaPreparada->bindValue(":cuenta_profesor",$profesor_salud["cuenta_profesor"]);
        $consultaPreparada->bindValue(":tipo_sangre",$profesor_salud["tipo_sangre"]);
        $consultaPreparada->bindValue(":enfermedad_cronica",$profesor_salud["enfermedad_cronica"]);
        $consultaPreparada->bindValue(":alergia",$profesor_salud["alergia"]);
        $consultaPreparada->bindValue(":servicio_medico",$profesor_salud["servicio_medico"]);
       

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }

    // =======================================================================
    // =======================================================================
    
    public function modificarProfesorFormulario_Salud(){
        $plantel="MAL";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");

        $consulta->bindValue(":plantel",$plantel);
        $consulta->execute();
        $resultados_profesores = $consulta->fetchAll();
        require "../resources/views/profesores/modificarSalud.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_tipo_sangre($tipo_sangre){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_salud SET tipo_sangre = :tipo_sangre WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":tipo_sangre",$tipo_sangre["tipo_sangre"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$tipo_sangre["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'tipo_sangre' de la tabla 'profesor_salud' ha sido modificado correctamente por ". $tipo_sangre['tipo_sangre'];

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_enfermedad_cronica($enfermedad_cronica){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_salud SET enfermedad_cronica = :enfermedad_cronica WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":enfermedad_cronica",$enfermedad_cronica["enfermedad_cronica"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$enfermedad_cronica["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "La 'enfermedad_cronica' de la tabla 'profesor_salud' ha sido modificado correctamente por ". $enfermedad_cronica['enfermedad_cronica'];

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_alergia($alergia){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_salud SET alergia = :alergia WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":alergia",$alergia["alergia"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$alergia["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "La 'alergia' de la tabla 'profesor_salud' ha sido modificado correctamente por ". $alergia['alergia'];

    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_servicio_medico($servicio_medico){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_salud SET servicio_medico = :servicio_medico WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":servicio_medico",$servicio_medico["servicio_medico"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$servicio_medico["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'servicio_medico' de la tabla 'profesor_salud' ha sido modificado correctamente por ". $servicio_medico['servicio_medico'];

    }
}