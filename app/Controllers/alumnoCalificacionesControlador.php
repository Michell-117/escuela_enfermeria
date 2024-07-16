<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class alumnoCalificacionesControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }

    // =======================================================================
    // =======================================================================
    public function calificaciones_inicio(){
        require "../resources/views/calificaciones/inicio.php";
    }

    // =======================================================================
    // =======================================================================
    public function asignar_calificacionesAlumno_formulario(){
        $cuenta_profesor = "DA89VEVE860609M65P";
        $plantel_profesor = ["JB"];

        $consulta_grupo = $this->conecction->prepare("SELECT grupo FROM plantel_grupoescolar WHERE(cuenta_profesor = :cuenta_profesor)");
        $consulta_grupo->bindValue(":cuenta_profesor",$cuenta_profesor);

        $consulta_grupo->execute();
        $resultados_grupos = $consulta_grupo->fetchAll();

        require "../resources/views/calificaciones/seleccionarAlumno.php";
    }

    // =======================================================================
    // =======================================================================
    public function formulario_calificacion_alumno($data){
        $cuenta_profesor = "DA89VEVE860609M65P";
        $grupo = $data["grupo"];
        $sede = $data["sede"];

        $consulta = $this->conecction->prepare("SELECT materia FROM plantel_grupoescolar WHERE(plantel_id=:plantel_id && grupo=:grupo)");
        $consulta->bindValue(":plantel_id",$sede);
        $consulta->bindValue(":grupo",$grupo);
        $consulta->execute();
        $resultados_consulta = $consulta->fetchAll();
        $id_materia = $resultados_consulta[0]["materia"];
        
        $consulta_nombre_materia = $this->conecction->prepare("SELECT nombre_materia FROM materias WHERE(id_materia=:id_materia)");
        $consulta_nombre_materia->bindValue(":id_materia",$id_materia);
        $consulta_nombre_materia->execute();
        $resultado_consulta_nombre_materia = $consulta_nombre_materia->fetchAll();
        $nombre_materia = $resultado_consulta_nombre_materia[0]["nombre_materia"];

        $consulta_alumnos_por_grupo = $this->conecction->prepare("SELECT id_plantelGrupoEscolar FROM plantel_grupoescolar WHERE(plantel_id=:plantel_id && grupo=:grupo)");
        $consulta_alumnos_por_grupo->bindValue(":plantel_id",$sede);
        $consulta_alumnos_por_grupo->bindValue(":grupo",$grupo);
        $consulta_alumnos_por_grupo->execute();
        $id_grupo_escolar = $consulta_alumnos_por_grupo->fetchAll();
        $plantel_grupo_id = $id_grupo_escolar[0]["id_plantelGrupoEscolar"];

        $consulta_cuenta_alumnos=$this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id = :plantel_grupo_id)");
        $consulta_cuenta_alumnos->bindValue(":id_plantel",$sede);
        $consulta_cuenta_alumnos->bindValue(":plantel_grupo_id",$plantel_grupo_id);
        $consulta_cuenta_alumnos->execute();
        $cuentasAlumnos=$consulta_cuenta_alumnos->fetchAll();


        // var_dump($cuentasAlumnos);
        require "../resources/views/calificaciones/asignarCalificacionesAlumno.php";
    }

    // =======================================================================
    // =======================================================================
    public function asignar_calificacion_alumno($data){

        $alumno = [
            "cuenta"=>$data["cuenta"],
            "id_materia"=>$data["id_materia"],
            "calificacion"=>floatval($data["calificacion"])
        ];

        $consulta_crear_calificacion_alumno = $this->conecction->prepare("INSERT INTO alumno_calificaciones(
            cuenta_alumno,
            materia_id,
            calificacion
        )VALUES(
            :cuenta_alumno,
            :materia_id,
            :calificacion
        )");
        $consulta_crear_calificacion_alumno->bindValue(":cuenta_alumno",$alumno["cuenta"]);
        $consulta_crear_calificacion_alumno->bindValue(":materia_id",$alumno["id_materia"]);
        $consulta_crear_calificacion_alumno->bindValue(":calificacion",$alumno["calificacion"]);
        $consulta_crear_calificacion_alumno->execute();

        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function seleccionar_calificaciones_grupo_formulario(){
        $cuenta_profesor = "JUCACRTO850731H34P";
        $plantel_profesor = ["JMM"];

        $consulta_grupo = $this->conecction->prepare("SELECT grupo FROM plantel_grupoescolar WHERE(cuenta_profesor = :cuenta_profesor)");
        $consulta_grupo->bindValue(":cuenta_profesor",$cuenta_profesor);
        $consulta_grupo->execute();
        $resultados_grupos = $consulta_grupo->fetchAll();

        require "../resources/views/calificaciones/seleccionarGrupo.php";
    }

    // =======================================================================
    // =======================================================================

    public function asignar_calificacionesGrupo_formulario($data){
        $lista = 0;
        $cuenta_profesor = "JUCACRTO850731H34P";
        $grupo = $data["grupo"];
        $sede = $data["sede"];

        $consulta = $this->conecction->prepare("SELECT materia FROM plantel_grupoescolar WHERE(plantel_id=:plantel_id && grupo=:grupo)");
        $consulta->bindValue(":plantel_id",$sede);
        $consulta->bindValue(":grupo",$grupo);
        $consulta->execute();
        $resultados_consulta = $consulta->fetchAll();
        $id_materia = $resultados_consulta[0]["materia"];
        
        $consulta_nombre_materia = $this->conecction->prepare("SELECT nombre_materia FROM materias WHERE(id_materia=:id_materia)");
        $consulta_nombre_materia->bindValue(":id_materia",$id_materia);
        $consulta_nombre_materia->execute();
        $resultado_consulta_nombre_materia = $consulta_nombre_materia->fetchAll();
        $nombre_materia = $resultado_consulta_nombre_materia[0]["nombre_materia"];

        $consulta_alumnos_por_grupo = $this->conecction->prepare("SELECT id_plantelGrupoEscolar FROM plantel_grupoescolar WHERE(plantel_id=:plantel_id && grupo=:grupo)");
        $consulta_alumnos_por_grupo->bindValue(":plantel_id",$sede);
        $consulta_alumnos_por_grupo->bindValue(":grupo",$grupo);
        $consulta_alumnos_por_grupo->execute();
        $id_grupo_escolar = $consulta_alumnos_por_grupo->fetchAll();
        $plantel_grupo_id = $id_grupo_escolar[0]["id_plantelGrupoEscolar"];

        $consulta_cuenta_alumnos=$this->conecction->prepare("SELECT cuenta, apellido_paterno, apellido_materno, nombre, nombre_2 FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id = :plantel_grupo_id)");
        $consulta_cuenta_alumnos->bindValue(":id_plantel",$sede);
        $consulta_cuenta_alumnos->bindValue(":plantel_grupo_id",$plantel_grupo_id);
        $consulta_cuenta_alumnos->execute();
        $cuentasAlumnos=$consulta_cuenta_alumnos->fetchAll();

        // var_dump($cuentasAlumnos);
        require "../resources/views/calificaciones/asignarCalificacionesGrupo.php";
    }

    // =======================================================================
    // =======================================================================

    public function calificar_grupo($alumnos_calificaciones_formulario){
        // var_dump($alumnos_calificaciones_formulario);

        $cuentas=array_keys($alumnos_calificaciones_formulario);
        // var_dump($cuentas);
        $id_materia=intval($alumnos_calificaciones_formulario["materia"]);
        // var_dump($id_materia);

        $cuentasAlumnos = [];
        foreach($cuentas as $cuenta){
            if($cuenta !== "method" && $cuenta !== "formulario" && $cuenta !== "materia" ){
                array_push($cuentasAlumnos,[
                    "cuenta" => $cuenta,
                    "calificacion" => floatval($alumnos_calificaciones_formulario[$cuenta])
                ]);
            }
        }
        // var_dump($cuentasAlumnos);
        foreach($cuentasAlumnos as $alumno){

            // var_dump($alumno) ;
            // echo "<hr/>";
            
            $consulta_crear_calificacion_alumno = $this->conecction->prepare("INSERT INTO alumno_calificaciones(
                cuenta_alumno,
                materia_id,
                calificacion
            )VALUES(
                :cuenta_alumno,
                :materia_id,
                :calificacion
            )");
            $consulta_crear_calificacion_alumno->bindValue(":cuenta_alumno",$alumno["cuenta"]);
            $consulta_crear_calificacion_alumno->bindValue(":materia_id",$id_materia);
            $consulta_crear_calificacion_alumno->bindValue(":calificacion",$alumno["calificacion"]);
            $consulta_crear_calificacion_alumno->execute();
        }
        require "../resources/views/avisos/aviso1.php";

    }   
    // =======================================================================
    // =======================================================================


}