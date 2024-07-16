<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class alumnoFamiliarControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_alumno_familiar($alumno_familiar){
        $consulta = $this->conecction->prepare("SELECT * FROM alumno_familiar WHERE(id_alumno_familiar = :id_alumno_familiar)");
        $consulta->bindValue(":id_alumno_familiar",$alumno_familiar["id_alumno_familiar"]);
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $alumno_familiar){
            echo nl2br(
             " <strong>ID alumno: </strong>" . $alumno_familiar["id_alumno_familiar"] ."\n"
             ." <strong>Nombre familiar: </strong>" . $alumno_familiar["nombre_familiar"] ."\n"
             ." <strong>Parentesco: </strong>" . $alumno_familiar["parentesco"] . "\n"
             ." <strong>Número de contacto: </strong>" . $alumno_familiar["numero_contacto"] . "\n"
            );
            echo "<hr/>";
        }
    }
        
    // =======================================================================
    // =======================================================================

    public function agregarAlumnoFormulario_Familiar(){
        $plantel = "JB";
        $grupo = "7";
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();

        require "../resources/views/alumnos/crearFamiliar.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function crear_alumno_familiar($alumno_familiar){

        $consultaPreparada = $this->conecction->prepare("INSERT INTO alumno_familiar(
            cuenta_alumno,
            nombre_familiar,
            parentesco,
            numero_contacto
        ) VALUES(
            :cuenta_alumno,
            :nombre_familiar,
            :parentesco,
            :numero_contacto
        );");

        $consultaPreparada->bindValue("cuenta_alumno",$alumno_familiar["cuenta_alumno_contacto"]);
        $consultaPreparada->bindValue("nombre_familiar",$alumno_familiar["nombre_familiar"]);
        $consultaPreparada->bindValue("parentesco",$alumno_familiar["parentesco"]);
        $consultaPreparada->bindValue("numero_contacto",$alumno_familiar["numero_contacto"]);


        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
            
    // =======================================================================
    // =======================================================================

    public function modificarAlumnoFormulario_Familiar(){
        $plantel = "JB";
        $grupo = "7";
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();

        require "../resources/views/alumnos/modificarFamiliar.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_nombre_familiar($nombre_familiar){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_familiar SET nombre_familiar = :nombre_familiar WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":nombre_familiar",$nombre_familiar["nombre_familiar"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$nombre_familiar["cuenta_alumno_salud"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_parentesco($parentesco){

        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_familiar SET parentesco = :parentesco WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":parentesco",$parentesco["parentesco"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$parentesco["cuenta_alumno_salud"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_numero_contacto($numero_contacto){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_familiar SET numero_contacto = :numero_contacto WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":numero_contacto",$numero_contacto["numero_contacto"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$numero_contacto["cuenta_alumno_salud"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
}