<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class profesorFamiliarControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
    
    // =======================================================================
    // =======================================================================
    
    public function obtener_profesor_familiar($profesor_familiar){
        $consulta = $this->conecction->prepare("SELECT * FROM profesor_familiar WHERE(profesor_id = :profesor_id)");
        $consulta->bindValue(":profesor_id",$profesor_familiar["profesor_id"]);
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $profesor_familiar){
            echo nl2br(
             " <strong>ID profesor: </strong>" . $profesor_familiar["profesor_id"] ."\n"
             ." <strong>Nombre familiar: </strong>" . $profesor_familiar["nombre_familiar"] ."\n"
             ." <strong>Parentesco: </strong>" . $profesor_familiar["parentesco"] . "\n"
             ." <strong>Número de contacto: </strong>" . $profesor_familiar["numero_contacto"] . "\n"
            );
            echo "<hr/>";
        }
    }
            
    // =======================================================================
    // =======================================================================

    public function agregarProfesorFormulario_Familiar(){
        $plantel="JB";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");
        $consulta->bindValue(":plantel",$plantel);

        $consulta->execute();

        $resultados_profesores = $consulta->fetchAll();

        require "../resources/views/profesores/crearFamiliar.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function crear_profesor_familiar($profesor_familiar){
        $consultaPreparada = $this->conecction->prepare("INSERT INTO profesor_familiar(
            cuenta_profesor,
            nombre_familiar,
            parentesco,
            numero_contacto
        ) VALUES(
            :cuenta_profesor,
            :nombre_familiar,
            :parentesco,
            :numero_contacto
        );");

        $consultaPreparada->bindValue("cuenta_profesor",$profesor_familiar["cuenta_profesor"]);
        $consultaPreparada->bindValue("nombre_familiar",$profesor_familiar["nombre_familiar"]);
        $consultaPreparada->bindValue("parentesco",$profesor_familiar["parentesco"]);
        $consultaPreparada->bindValue("numero_contacto",$profesor_familiar["numero_contacto"]);


        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }

    // =======================================================================
    // =======================================================================

    public function modificarProfesorFormulario_Familiar(){
        $plantel="JB";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");
        $consulta->bindValue(":plantel",$plantel);
        $consulta->execute();
        $resultados_profesores = $consulta->fetchAll();
        
        require "../resources/views/profesores/modificarFamiliar.php";
    }
       
    
    // =======================================================================
    // =======================================================================

    public function modificar_nombre_familiar($nombre_familiar){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_familiar SET nombre_familiar = :nombre_familiar WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":nombre_familiar",$nombre_familiar["nombre_familiar"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$nombre_familiar["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'nombre' de la tabla 'profesor_familiar' ha sido modificado correctamente por ". $nombre_familiar['nombre_familiar'];
        require "../resources/views/avisos/aviso1.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_parentesco($parentesco){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_familiar SET parentesco = :parentesco WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":parentesco",$parentesco["parentesco"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$parentesco["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'parentesco' de la tabla 'profesor_familiar' ha sido modificado correctamente por ". $parentesco['parentesco'];
        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_numero_contacto($numero_contacto){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_familiar SET numero_contacto = :numero_contacto WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":numero_contacto",$numero_contacto["numero_contacto"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$numero_contacto["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'numero_contacto' de la tabla 'profesor_familiar' ha sido modificado correctamente por ". $numero_contacto['numero_contacto'];
        require "../resources/views/avisos/aviso1.php";

    }
}