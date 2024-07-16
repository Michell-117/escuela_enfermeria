<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class profesorDomicilioContolador{
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
        
    // =======================================================================
    // =======================================================================
    
    public function obtener_profesor_domiclio($profesor_domiclio){
        $consulta = $this->conecction->prepare("SELECT * FROM profesor_domicilio WHERE(profesor_id = :profesor_id)");

        $consulta->bindValue(":profesor_id",$profesor_domiclio["profesor_id"]);

        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $profesor_domiclio){
            echo nl2br(
             " <strong>ID profesor: </strong>" . $profesor_domiclio["profesor_id"] ."\n"
             ." <strong>Calle: </strong>" . $profesor_domiclio["calle"] ."\n"
             ." <strong>Número exterior: </strong>" . $profesor_domiclio["numero_exterior"] . "\n"
             ." <strong>Número interior: </strong>" . $profesor_domiclio["numero_interior"] . "\n"
             ." <strong>Manzana: </strong>" . $profesor_domiclio["manzana"] . "\n"
             ." <strong>Lote: </strong>" . $profesor_domiclio["lote"] . "\n"
             ." <strong>Barrio - Colonia: </strong>" . $profesor_domiclio["barrio_colonia"] . "\n"
             ." <strong>Código postal: </strong>" . $profesor_domiclio["codigo_postal"] . "\n"
             ." <strong>Alcaldía: </strong>" . $profesor_domiclio["alcaldia"] . "\n"
             ." <strong>Coordinación territorial: </strong>" . $profesor_domiclio["coordinacion_territorial"] . "\n"
            );
            echo "<hr/>";
        }
    }
            
    // =======================================================================
    // =======================================================================

    public function agregarProfesorFormulario_Domicilio(){
        $plantel="MIX";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");
        $consulta->bindValue(":plantel",$plantel);

        $consulta->execute();
        $resultados_profesores = $consulta->fetchAll();

        require "../resources/views/profesores/crearDomicilio.php";
    }
            
    // =======================================================================
    // =======================================================================

    public function crear_profesor_domicilio($profesor_domicilio){
        $consultaPreparada = $this->conecction->prepare("INSERT INTO profesor_domicilio(
            cuenta_profesor,
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
            :cuenta_profesor,
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

        $consultaPreparada->bindValue(":cuenta_profesor",$profesor_domicilio["cuenta_profesor"]);
        $consultaPreparada->bindValue(":calle",$profesor_domicilio["calle"]);
        $consultaPreparada->bindValue(":numero_exterior",$profesor_domicilio["numero_exterior"]);
        $consultaPreparada->bindValue(":numero_interior",$profesor_domicilio["numero_interior"]);
        $consultaPreparada->bindValue(":manzana",$profesor_domicilio["manzana"]);
        $consultaPreparada->bindValue(":lote",$profesor_domicilio["lote"]);
        $consultaPreparada->bindValue(":barrio_colonia",$profesor_domicilio["barrio_colonia"]);
        $consultaPreparada->bindValue(":codigo_postal",$profesor_domicilio["codigo_postal"]);
        $consultaPreparada->bindValue(":alcaldia",$profesor_domicilio["alcaldia"]);
        $consultaPreparada->bindValue(":coordinacion_territorial",$profesor_domicilio["coordinacion_territorial"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }

     // =======================================================================
    // =======================================================================

    public function modificarProfesorFormulario_Domicilio(){
        $plantel="MIX";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");
        $consulta->bindValue(":plantel",$plantel);
        $consulta->execute();
        $resultados_profesores = $consulta->fetchAll();

        require "../resources/views/profesores/modificarDomicilio.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_calle($calle){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET calle = :calle WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":calle",$calle["calle"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$calle["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "La 'calle' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ". $calle['calle'];
        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_numero_exterior($numero_exterior){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET numero_exterior = :numero_exterior WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":numero_exterior",$numero_exterior["numero_exterior"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$numero_exterior["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'numero_exterior' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ". $numero_exterior['numero_exterior'];
        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_numero_interior($numero_interior){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET numero_interior = :numero_interior WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":numero_interior",$numero_interior["numero_interior"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$numero_interior["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'numero_interior' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ". $numero_interior['numero_interior'];
        require "../resources/views/avisos/aviso1.php";

    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_manzana($manzana){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET manzana = :manzana WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":manzana",$manzana["manzana"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$manzana["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "La 'manzana' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ". $manzana['manzana'];
        require "../resources/views/avisos/aviso1.php";

    }
                
    // =======================================================================
    // =======================================================================

    public function modificar_lote($lote){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET lote = :lote WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":lote",$lote["lote"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$lote["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'lote' de la tabla 'alumno_domicilio' ha sido modificado correctamente por ".$lote['lote'];
        require "../resources/views/avisos/aviso1.php";

    }
                    
    // =======================================================================
    // =======================================================================

    public function modificar_barrio_colonia($barrio_colonia){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET barrio_colonia = :barrio_colonia WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":barrio_colonia",$barrio_colonia["barrio_colonia"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$barrio_colonia["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'barrio_colonia' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ".$barrio_colonia['barrio_colonia'];
        require "../resources/views/avisos/aviso1.php";

    }
                        
    // =======================================================================
    // =======================================================================

    public function modificar_codigo_postal($codigo_postal){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET codigo_postal = :codigo_postal WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":codigo_postal",$codigo_postal["codigo_postal"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$codigo_postal["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'codigo_postal' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ".$codigo_postal['codigo_postal'];
        require "../resources/views/avisos/aviso1.php";

    }
                            
    // =======================================================================
    // =======================================================================

    public function modificar_alcaldia($alcaldia){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET alcaldia = :alcaldia WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":alcaldia",$alcaldia["alcaldia"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$alcaldia["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "La 'alcaldia' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ".$alcaldia['alcaldia'];
        require "../resources/views/avisos/aviso1.php";

    }
                                
    // =======================================================================
    // =======================================================================

    public function modificar_coordinacion_territorial($coordinacion_territorial){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_domicilio SET coordinacion_territorial = :coordinacion_territorial WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":coordinacion_territorial",$coordinacion_territorial["coordinacion_territorial"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$coordinacion_territorial["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "La 'coordinacion_territorial' de la tabla 'profesor_domicilio' ha sido modificado correctamente por ".$coordinacion_territorial['coordinacion_territorial'];
        require "../resources/views/avisos/aviso1.php";

    }
}