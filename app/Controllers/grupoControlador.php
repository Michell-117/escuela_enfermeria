<?php

namespace App\Controllers;
use Database\PDO\Conecction;
use DateTime;

class grupoControlador{
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }

    // =======================================================================
    // =======================================================================
    
    public function obtener_grupos(){
        $consulta = $this->conecction->prepare("SELECT * FROM plantel_grupoescolar");
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        // require "../resources/views/alumnos/index.php";

    }
    
    // =======================================================================
    // =======================================================================

    public function crearGrupo_formulario(){

        $plantel = ["JB","JMM","MAL","MC","MIX","ZAP"];
        // $plantel = "JB";
        $plantel1 = $plantel[3];

        $consulta = $this->conecction->prepare("SELECT idplantel FROM plantel WHERE(idplantel = :idplantel)");
        $consulta->bindValue(":idplantel",$plantel1);
        $consulta->execute();
        $resultadosplantel = $consulta->fetchAll();
                
        $consulta = $this->conecction->prepare("SELECT grupo FROM plantel_grupos");
        $consulta->execute();
        $resultadosgrupos = $consulta->fetchAll();
                        
        $consulta = $this->conecction->prepare("SELECT horario FROM plantel_horarios");
        $consulta->execute();
        $resultadosHorarios = $consulta->fetchAll();
                                
        $consulta = $this->conecction->prepare("SELECT turno FROM plantel_turnos");
        $consulta->execute();
        $resultadosTurnos = $consulta->fetchAll();
                                        
        $consulta = $this->conecction->prepare("SELECT dias FROM plantel_dias");
        $consulta->execute();
        $resultadosDias = $consulta->fetchAll();

        $consulta = $this->conecction->prepare("SELECT nombre_materia FROM materias");
        $consulta->execute();
        $resultadosMaterias = $consulta->fetchAll();
                                                
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel = :plantel)");
        $consulta->bindValue(":plantel",$plantel1);
        $consulta->execute();
        $resultadosProfesores_plantel = $consulta->fetchAll();

        require "../resources/views/grupos/crearGrupo.php";
    }

    // =======================================================================
    // =======================================================================


    public function agregar_grupo($grupo){

        // var_dump($grupo);

        $consulta = $this->conecction->prepare("SELECT id_materia FROM materias WHERE(nombre_materia = :nombre_materia)");
        $consulta->bindValue(":nombre_materia",$grupo["nombre_materia"]);
        $consulta->execute();
        $resultadosMaterias = $consulta->fetchAll();

        $id_materia = $resultadosMaterias[0][0];
        // var_dump($id_materia);
        $consultaPreparada = $this->conecction->prepare("INSERT INTO plantel_grupoescolar(
            plantel_id,
            grupo,
            horario,
            turno,
            dias,
            materia,
            cuenta_profesor
        ) VALUES(
            :plantel_id,
            :grupo,
            :horario,
            :turno,
            :dias,
            :materia,
            :cuenta_profesor    
        );");

        $consultaPreparada->bindValue(":plantel_id",$grupo["plantel_id"]);
        $consultaPreparada->bindValue(":grupo",$grupo["grupo"]);
        $consultaPreparada->bindValue(":horario",$grupo["horario"]);
        $consultaPreparada->bindValue(":turno",$grupo["turno"]);
        $consultaPreparada->bindValue(":dias",$grupo["dias"]);
        $consultaPreparada->bindValue(":materia",$id_materia);
        $consultaPreparada->bindValue(":cuenta_profesor",$grupo["cuenta_profesor"]);

    
        $consultaPreparada->execute();
        // echo "Grupo creado exitosamente!!";
        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificarGrupo_formulario(){

        $plantel = ["JB","JMM","MAL","MC","MIX","ZAP"];
        // $plantel = "JB";
        $plantel1 = $plantel[3];

        $consulta = $this->conecction->prepare("SELECT idplantel FROM plantel");
        $consulta->execute();
        $resultadosplantel = $consulta->fetchAll();
                
        $consulta = $this->conecction->prepare("SELECT grupo FROM plantel_grupos");
        $consulta->execute();
        $resultadosgrupos = $consulta->fetchAll();
                        
        $consulta = $this->conecction->prepare("SELECT horario FROM plantel_horarios");
        $consulta->execute();
        $resultadosHorarios = $consulta->fetchAll();
                                
        $consulta = $this->conecction->prepare("SELECT turno FROM plantel_turnos");
        $consulta->execute();
        $resultadosTurnos = $consulta->fetchAll();
                                        
        $consulta = $this->conecction->prepare("SELECT dias FROM plantel_dias");
        $consulta->execute();
        $resultadosDias = $consulta->fetchAll();
                                                
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general");
        $consulta->execute();
        $resultadosProfesores = $consulta->fetchAll();

        $consulta = $this->conecction->prepare("SELECT nombre_materia FROM materias");
        $consulta->execute();
        $resultadosMaterias = $consulta->fetchAll();

        $consulta = $this->conecction->prepare("SELECT id_plantelGrupoEscolar FROM plantel_grupoescolar WHERE(plantel_id = :plantel_id)");
        $consulta->bindValue(":plantel_id",$plantel1);
        $consulta->execute();
        $resultadosplantelGrupoEscolar = $consulta->fetchAll();

        require "../resources/views/grupos/modificarGrupo.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificar_grupo_plantel($nuevo_plantel){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel_grupoescolar SET plantel_id = :plantel_id WHERE (id_plantelGrupoEscolar = :id_plantelGrupoEscolar ); ");

        $consultaPreparada->bindValue(":plantel_id",$nuevo_plantel["nuevo_plantel_id"]);
        $consultaPreparada->bindValue(":id_plantelGrupoEscolar",$nuevo_plantel["id_plantelGrupoEscolar"]);

        $consultaPreparada->execute();

        // echo "Grupo 'plantel' actualizado exitosamenter";
        require "../resources/views/avisos/aviso1.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_grupo_grupo($nuevo_grupo){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel_grupoescolar SET grupo = :grupo WHERE (id_plantelGrupoEscolar = :id_plantelGrupoEscolar ); ");

        $consultaPreparada->bindValue(":grupo",$nuevo_grupo["nuevo_grupo"]);
        $consultaPreparada->bindValue(":id_plantelGrupoEscolar",$nuevo_grupo["id_plantelGrupoEscolar"]);

        $consultaPreparada->execute();

        // echo "Grupo 'grupo' actualizado exitosamenter";
        require "../resources/views/avisos/aviso1.php";
    }

        
    // =======================================================================
    // =======================================================================

    public function modificar_grupo_horario($nuevo_horario){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel_grupoescolar SET horario = :horario WHERE (id_plantelGrupoEscolar = :id_plantelGrupoEscolar ); ");

        $consultaPreparada->bindValue(":horario",$nuevo_horario["nuevo_horario"]);
        $consultaPreparada->bindValue(":id_plantelGrupoEscolar",$nuevo_horario["id_plantelGrupoEscolar"]);

        $consultaPreparada->execute();

        // echo "Grupo 'horario' actualizado exitosamenter";
        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificar_grupo_turno($nuevo_turno){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel_grupoescolar SET turno = :turno WHERE (id_plantelGrupoEscolar = :id_plantelGrupoEscolar ); ");

        $consultaPreparada->bindValue(":turno",$nuevo_turno["nuevo_turno"]);
        $consultaPreparada->bindValue(":id_plantelGrupoEscolar",$nuevo_turno["id_plantelGrupoEscolar"]);

        $consultaPreparada->execute();

        // echo "Grupo 'turno' actualizado exitosamenter";
        require "../resources/views/avisos/aviso1.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_grupo_dias($nuevo_dias){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel_grupoescolar SET dias = :dias WHERE (id_plantelGrupoEscolar = :id_plantelGrupoEscolar ); ");

        $consultaPreparada->bindValue(":dias",$nuevo_dias["cuenta_profesor"]);
        $consultaPreparada->bindValue(":id_plantelGrupoEscolar",$nuevo_dias["id_plantelGrupoEscolar"]);

        $consultaPreparada->execute();

        // echo "Grupo 'dias' actualizado exitosamenter";
        require "../resources/views/avisos/aviso1.php";
    }

        
    // =======================================================================
    // =======================================================================

    public function modificar_materia($nuevo_materia){

        $consulta = $this->conecction->prepare("SELECT id_materia FROM materias WHERE(nombre_materia = :nombre_materia)");
        $consulta->bindValue(":nombre_materia",$nuevo_materia["nombre_materia"]);
        $consulta->execute();
        $resultadosMaterias = $consulta->fetchAll();

        $id_materia = $resultadosMaterias[0][0];

        // var_dump($id_materia);
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel_grupoescolar SET materia = :materia WHERE (id_plantelGrupoEscolar = :id_plantelGrupoEscolar ); ");

        $consultaPreparada->bindValue(":materia",$id_materia);
        $consultaPreparada->bindValue(":id_plantelGrupoEscolar",$nuevo_materia["id_plantelGrupoEscolar"]);

        $consultaPreparada->execute();

        // echo "Grupo 'dias' actualizado exitosamenter";
        require "../resources/views/avisos/aviso1.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_grupo_cuenta_profesor($nuevo_cuenta_profesor){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel_grupoescolar SET cuenta_profesor = :cuenta_profesor WHERE (id_plantelGrupoEscolar = :id_plantelGrupoEscolar ); ");

        $consultaPreparada->bindValue(":cuenta_profesor",$nuevo_cuenta_profesor["nueva_cuenta_profesor"]);
        $consultaPreparada->bindValue(":id_plantelGrupoEscolar",$nuevo_cuenta_profesor["id_plantelGrupoEscolar"]);

        $consultaPreparada->execute();

        // echo "Grupo 'cuenta_profesor' actualizado exitosamenter";
        require "../resources/views/avisos/aviso1.php";
    }

}
