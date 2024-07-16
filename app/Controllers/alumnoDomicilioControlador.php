<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class alumnoDomicilioControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_alumnos_domicilio($alumno_domicilio){
        $consulta = $this->conecction->prepare("SELECT * FROM alumno_domicilio WHERE(id_alumno_domicilio = :id_alumno_domicilio)");

        $consulta->bindValue(":id_alumno_domicilio",$alumno_domicilio["id_alumno_domicilio"]);

        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $alumno){
            echo nl2br(
             " <strong>ID alumno: </strong>" . $alumno["id_alumno_domicilio"] ."\n"
             ." <strong>Calle: </strong>" . $alumno["calle"] ."\n"
             ." <strong>Número exterior: </strong>" . $alumno["numero_exterior"] . "\n"
             ." <strong>Número interior: </strong>" . $alumno["numero_interior"] . "\n"
             ." <strong>Manzana: </strong>" . $alumno["manzana"] . "\n"
             ." <strong>Lote: </strong>" . $alumno["lote"] . "\n"
             ." <strong>Barrio - Colonia: </strong>" . $alumno["barrio_colonia"] . "\n"
             ." <strong>Código postal: </strong>" . $alumno["codigo_postal"] . "\n"
             ." <strong>Alcaldía: </strong>" . $alumno["alcaldia"] . "\n"
             ." <strong>Coordinación territorial: </strong>" . $alumno["coordinacion_territorial"] . "\n"
            );
            echo "<hr/>";
        }
    }
        
    // =======================================================================
    // =======================================================================

    public function agregarAlumnoFormulario_Domicilio(){
        $plantel = "JB";
        $grupo = "7";
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();

        require "../resources/views/alumnos/crearDomicilio.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function crear_alumno_domicilio($alumno_domicilio){


        $consultaPreparada = $this->conecction->prepare("INSERT INTO alumno_domicilio(
            cuenta_alumno,
            calle,
            numero_exterior,
            numero_interior,
            manzana,
            lote,
            barrio_colonia,
            codigo_postal,
            alcaldia,
            coordinacion_territorial

        ) VALUES(
            :cuenta_alumno,
            :calle,
            :numero_exterior,
            :numero_interior,
            :manzana,
            :lote,
            :barrio_colonia,
            :codigo_postal,
            :alcaldia,
            :coordinacion_territorial
        );");

        $consultaPreparada->bindValue(":cuenta_alumno",$alumno_domicilio["cuenta_alumno_domicilio"]);
        $consultaPreparada->bindValue(":calle",$alumno_domicilio["calle"]);
        $consultaPreparada->bindValue(":numero_exterior",$alumno_domicilio["numero_exterior"]);
        $consultaPreparada->bindValue(":numero_interior",$alumno_domicilio["numero_interior"]);
        $consultaPreparada->bindValue(":manzana",$alumno_domicilio["manzana"]);
        $consultaPreparada->bindValue(":lote",$alumno_domicilio["lote"]);
        $consultaPreparada->bindValue(":barrio_colonia",$alumno_domicilio["barrio_colonia"]);
        $consultaPreparada->bindValue(":codigo_postal",$alumno_domicilio["codigo_postal"]);
        $consultaPreparada->bindValue(":alcaldia",$alumno_domicilio["alcaldia"]);
        $consultaPreparada->bindValue(":coordinacion_territorial",$alumno_domicilio["coordinacion_territorial"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }

    // =======================================================================
    // =======================================================================

    public function modificarAlumnoFormulario_Domicilio(){
        $plantel = "JB";
        $grupo = "7";
        
        $consulta_alumnos = $this->conecction->prepare("SELECT cuenta FROM alumno_general WHERE(id_plantel=:id_plantel && plantel_grupo_id=:plantel_grupo_id) ");

        $consulta_alumnos->bindValue("id_plantel",$plantel);
        $consulta_alumnos->bindValue("plantel_grupo_id",$grupo);

        $consulta_alumnos->execute();
        $resultados_alumnos = $consulta_alumnos->fetchAll();

        require "../resources/views/alumnos/modificarDomicilio.php";
    }
       
    
    // =======================================================================
    // =======================================================================

    public function modificar_calle($calle){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET calle = :calle WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":calle",$calle["calle"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$calle["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_numero_exterior($numero_exterior){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET numero_exterior = :numero_exterior WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":numero_exterior",$numero_exterior["numero_exterior"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$numero_exterior["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_numero_interior($numero_interior){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET numero_interior = :numero_interior WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":numero_interior",$numero_interior["numero_interior"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$numero_interior["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_manzana($manzana){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET manzana = :manzana WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":manzana",$manzana["manzana"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$manzana["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();
        require "../resources/views/avisos/aviso1.php";

    }
                
    // =======================================================================
    // =======================================================================

    public function modificar_lote($lote){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET lote = :lote WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":lote",$lote["lote"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$lote["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                    
    // =======================================================================
    // =======================================================================

    public function modificar_barrio_colonia($barrio_colonia){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET barrio_colonia = :barrio_colonia WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":barrio_colonia",$barrio_colonia["barrio_colonia"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$barrio_colonia["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                        
    // =======================================================================
    // =======================================================================

    public function modificar_codigo_postal($codigo_postal){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET codigo_postal = :codigo_postal WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":codigo_postal",$codigo_postal["codigo_postal"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$codigo_postal["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                            
    // =======================================================================
    // =======================================================================

    public function modificar_alcaldia($alcaldia){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET alcaldia = :alcaldia WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":alcaldia",$alcaldia["alcaldia"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$alcaldia["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                                
    // =======================================================================
    // =======================================================================

    public function modificar_coordinacion_territorial($coordinacion_territorial){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE alumno_domicilio SET coordinacion_territorial = :coordinacion_territorial WHERE (cuenta_alumno = :cuenta_alumno ); ");

        $consultaPreparada->bindValue(":coordinacion_territorial",$coordinacion_territorial["coordinacion_territorial"]);
        $consultaPreparada->bindValue(":cuenta_alumno",$coordinacion_territorial["cuenta_alumno_domicilio"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }

}