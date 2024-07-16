<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class profesorContactoContolador{
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }
        
    // =======================================================================
    // =======================================================================
    
    public function obtener_profesor_contacto($profesor_contacto){
        $consulta = $this->conecction->prepare("SELECT * FROM profesor_contacto WHERE(profesor_id = :profesor_id)");
        $consulta->bindValue(":profesor_id",$profesor_contacto["profesor_id"]);
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $profesor_contacto){
            echo nl2br(
             " <strong>ID profesor: </strong>" . $profesor_contacto["profesor_id"] ."\n"
             ." <strong>Email: </strong>" . $profesor_contacto["email"] ."\n"
             ." <strong>Teléfono fijo: </strong>" . $profesor_contacto["telefono_fijo"] . "\n"
             ." <strong>Teléfo celular: </strong>" . $profesor_contacto["telefono_celular"] . "\n"
            );
            echo "<hr/>";
        }
    }
            
    // =======================================================================
    // =======================================================================
    
    public function agregarProfesorFormulario_Contacto(){
        $plantel="JB";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");
        $consulta->bindValue(":plantel",$plantel);

        $consulta->execute();
        $resultados_profesores = $consulta->fetchAll();

        require "../resources/views/profesores/crearContacto.php";
    }

    // =======================================================================
    // =======================================================================

    public function crear_profesor_contacto($profesor_contacto){

        $consultaPreparada = $this->conecction->prepare("INSERT INTO profesor_contacto(
            cuenta_profesor,
            email,
            telefono_fijo,
            telefono_celular
        ) VALUES(
            :cuenta_profesor,
            :email,
            :telefono_fijo,
            :telefono_celular
        );");

        $consultaPreparada->bindValue(":cuenta_profesor",$profesor_contacto["cuenta_profesor"]);
        $consultaPreparada->bindValue(":email",$profesor_contacto["email"]);
        $consultaPreparada->bindValue(":telefono_fijo",$profesor_contacto["telefono_fijo"]);
        $consultaPreparada->bindValue(":telefono_celular",$profesor_contacto["telefono_celular"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }

                
    // =======================================================================
    // =======================================================================
    
    public function modificarProfesorFormulario_Contacto(){
        $plantel="JB";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");
        $consulta->bindValue(":plantel",$plantel);

        $consulta->execute();

        $resultados_profesores = $consulta->fetchAll();

        require "../resources/views/profesores/modificarContacto.php";
    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_profesor_email($profesor_email){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_contacto SET email = :email WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":email",$profesor_email["email"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$profesor_email["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'email' de la tabla 'profesor_contacto' ha sido modificado correctamente por ". $profesor_email['email'];

        require "../resources/views/avisos/aviso1.php";

    }
        // =======================================================================
    // =======================================================================

    public function modificar_profesor_telefono_fijo($profesor_telefono_fijo){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_contacto SET telefono_fijo = :telefono_fijo WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":telefono_fijo",$profesor_telefono_fijo["telefono_fijo"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$profesor_telefono_fijo["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'telefono_fijo' de la tabla 'profesor_contacto' ha sido modificado correctamente por ". $profesor_telefono_fijo['telefono_fijo'];

        require "../resources/views/avisos/aviso1.php";

    }
        // =======================================================================
    // =======================================================================

    public function modificar_profesor_telefono_celular($profesor_telefono_celular){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_contacto SET telefono_celular = :telefono_celular WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":telefono_celular",$profesor_telefono_celular["telefono_celular"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$profesor_telefono_celular["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "El 'telefono_celular' de la tabla 'profesor_contacto' ha sido modificado correctamente por ". $profesor_telefono_celular['telefono_celular'];

        require "../resources/views/avisos/aviso1.php";

    }

}