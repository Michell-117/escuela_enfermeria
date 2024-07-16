<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class alumnoContactoControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_alumno_contacto($alumno_contacto){
        $consulta = $this->conecction->prepare("SELECT * FROM alumno_contacto WHERE(id_alumno_contacto = :id_alumno_contacto)");
        $consulta->bindValue(":id_alumno_contacto",$alumno_contacto["id_alumno_contacto"]);
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $alumno){
            echo nl2br(
             " <strong>ID alumno: </strong>" . $alumno["id_alumno_contacto"] ."\n"
             ." <strong>Email: </strong>" . $alumno["email"] ."\n"
             ." <strong>Teléfono fijo: </strong>" . $alumno["telefono_fijo"] . "\n"
             ." <strong>Teléfo celular: </strong>" . $alumno["telefono_celular"] . "\n"
            );
            echo "<hr/>";
        }
    }
        
    // =======================================================================
    // =======================================================================
    
    public function agregarAlumnoFormulario_Contacto(){
        $plantel = "JB";
        $grupo = "7";
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();

        require "../resources/views/alumnos/crearContacto.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function agregarAlumno_Contacto($alumno_contacto){

        $consultaPreparada = $this->conecction->prepare("INSERT INTO alumno_contacto(
            cuenta_alumno,
            email,
            telefono_fijo,
            telefono_celular
        ) VALUES(
            :cuenta_alumno,
            :email,
            :telefono_fijo,
            :telefono_celular
        );");
        

        // $consulta_id->bindValue(":cuenta",$resultado_consulta_id["cuenta"]);
        // var_dump($resultado_consulta_id[0][0]) ;
        // echo $resultado_consulta_id[0][0];


        // var_dump($id_alumno);

        $consultaPreparada->bindValue(":cuenta_alumno",$alumno_contacto["cuenta_alumno_contacto"]);
        $consultaPreparada->bindValue(":email",$alumno_contacto["email"]);
        $consultaPreparada->bindValue(":telefono_fijo",$alumno_contacto["telefono_fijo"]);
        $consultaPreparada->bindValue(":telefono_celular",$alumno_contacto["telefono_celular"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
    // =======================================================================
    // =======================================================================
    
    public function modificarAlumnoFormulario_Contacto(){
        $plantel = "JB";
        $grupo = "7";

        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();

        require "../resources/views/alumnos/modificarContacto.php";
    }
    
    // =======================================================================
    // =======================================================================

    public function modificarAlumno_email($email){


        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_contacto SET email = :email WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":email",$email["email"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$email["cuenta_alumno_contacto"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificarAlumno_telefono_fijo($telefono_fijo){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_contacto SET telefono_fijo = :telefono_fijo WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":telefono_fijo",$telefono_fijo["telefono_fijo"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$telefono_fijo["cuenta_alumno_contacto"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
    
    // =======================================================================
    // =======================================================================

    public function modificarAlumno_telefono_celular($telefono_celular){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_contacto SET telefono_celular = :telefono_celular WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":telefono_celular",$telefono_celular["telefono_celular"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$telefono_celular["cuenta_alumno_contacto"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
}