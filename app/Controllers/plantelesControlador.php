<?php

namespace App\Controllers;
use Database\PDO\Conecction;

class plantelesControlador {
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }

    public function obtenerPlanteles(){
        $consulta = $this->conecction->prepare("SELECT * FROM plantel");
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();
        //var_dump($resultadosConsulta); //devuelve un array mixto, por lo que los valores se muestran duplicados(array con indice y array asociativo)
        foreach($resultadosConsulta as $resultado){
            echo nl2br("ID: " . $resultado["idplantel"] ."\n"
            ." Plantel: " . $resultado["nombre"] ."\n"
            ." Domicilio: " . $resultado["domicilio"] . "\n"
            ." Telefono: " . $resultado["telefono"] . "\n"
            ." Dependencia Operativa: " . $resultado["dependencia_operativa"] . "\n"
            ." Control: " . $resultado["control"] . "\n"
            ." Subcontrol: " . $resultado["sub_control"] . "\n"
            ." Sostenimiento: " . $resultado["sostenimiento"] . "\n"
            ." Administrador: " . $resultado["administrador"] . "\n"
            ." Cedula: " . $resultado["cedula"] . "\n"
            ." Dictamen: " . $resultado["dictamen"] . "\n");
            echo "<hr/>";
        }
    }

    public function agregarSede($informacion){
        $consultaPreparada = $this->conecction->prepare("INSERT INTO plantel(
            idplantel,
            nombre,
            domicilio,
            telefono,
            dependencia_operativa,
            control,
            sub_control,
            sostenimiento,
            administrador,
            cedula,
            dictamen
        ) VALUES(
            :idplantel,
            :nombre,
            :domicilio,
            :telefono,
            :dependencia_operativa,
            :control,
            :sub_control,
            :sostenimiento,
            :administrador,
            :cedula,
            :dictamen
        );");

        $consultaPreparada->bindValue(":idplantel",$informacion["idplantel"]);
        $consultaPreparada->bindValue(":nombre",$informacion["nombre"]);
        $consultaPreparada->bindValue(":domicilio",$informacion["domicilio"]);
        $consultaPreparada->bindValue(":telefono",$informacion["telefono"]);
        $consultaPreparada->bindValue(":dependencia_operativa",$informacion["dependencia_operativa"]);
        $consultaPreparada->bindValue(":control",$informacion["control"]);
        $consultaPreparada->bindValue(":sub_control",$informacion["sub_control"]);
        $consultaPreparada->bindValue(":sostenimiento",$informacion["sostenimiento"]);
        $consultaPreparada->bindValue(":administrador",$informacion["administrador"]);
        $consultaPreparada->bindValue(":cedula",$informacion["cedula"]);
        $consultaPreparada->bindValue(":dictamen",$informacion["dictamen"]);

        $consultaPreparada->execute();

        echo "Plantel agregado exitosamente";
    }

        
    // =======================================================================
    // =======================================================================
    
    public function agregarPlantel_formulario(){
        require "../resources/views/planteles/crearPlantel.php" ;
    }
            
    // =======================================================================
    // =======================================================================
    
    public function modificarPlantel_formulario(){
        $consulta = $this->conecction->prepare("SELECT idplantel FROM plantel");
        $consulta->execute();
        $resultadosplantel = $consulta->fetchAll();
        
        require "../resources/views/planteles/modificarPlantel.php" ;
    }
    


    public function modificar_idplantel($id){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET idplantel = :idplantelNuevo WHERE (idplantel = :idplantel ); ");

        $consultaPreparada->bindValue(":idplantelNuevo",$id["idplantelNuevo"]);
        $consultaPreparada->bindValue(":idplantel",$id["idplantel"]);

        $consultaPreparada->execute();

        echo "idplantel del plantel modificado";
    }
// ========================================================================
    public function modificar_nombre($nombre){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET nombre = :nombre WHERE (idplantel = :idplantel ); ");

        $consultaPreparada->bindValue(":idplantel",$nombre["idplantel"]);
        $consultaPreparada->bindValue(":nombre",$nombre["nombre"]);

        $consultaPreparada->execute();

        echo "Nombre del plantel modificado";
    }

// ========================================================================

    public function modificar_domicilio($domicilio){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET domicilio = :domicilio WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":domicilio",$domicilio["domicilio"]);
        $consultaPreparada->bindValue(":idplantel",$domicilio["idplantel"]);

        $consultaPreparada->execute();

        echo "Domicilio del plantel modificado";
    }

// ========================================================================

    public function modificar_telefono($telefono){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET telefono = :telefono WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":telefono",$telefono["telefono"]);
        $consultaPreparada->bindValue(":idplantel",$telefono["idplantel"]);

        $consultaPreparada->execute();

        echo "Teléfono del plantel modificado";
    }
// ========================================================================
public function modificar_dependencia_operativa($DO){
       
    $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET dependencia_operativa = :dependencia_operativa WHERE (idplantel = :idplantel );");

    $consultaPreparada->bindValue(":dependencia_operativa",$DO["dependencia_operativa"]);
    $consultaPreparada->bindValue(":idplantel",$DO["idplantel"]);

    $consultaPreparada->execute();

    echo "Dependencia Operativa del plantel modificada";
}
// ========================================================================
    public function modificar_control($control){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET control = :control WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":control",$control["control"]);
        $consultaPreparada->bindValue(":idplantel",$control["idplantel"]);

        $consultaPreparada->execute();

        echo "Control del plantel modificado";
    }
// ========================================================================
    public function modificar_sub_control($subControl){
        
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET sub_control = :sub_control WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":sub_control",$subControl["sub_control"]);
        $consultaPreparada->bindValue(":idplantel",$subControl["idplantel"]);

        $consultaPreparada->execute();

        echo "Sub-Control del plantel modificado";
    }

// ========================================================================
    public function modificar_sostenimiento($sostenimiento){
        
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET sostenimiento = :sostenimiento WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":sostenimiento",$sostenimiento["sostenimiento"]);
        $consultaPreparada->bindValue(":idplantel",$sostenimiento["idplantel"]);

        $consultaPreparada->execute();

        echo "Sostenimiento del plantel modificado";
    }
// ========================================================================
    public function modificar_administrador($administrador){
        
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET administrador = :administrador WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":administrador",$administrador["administrador"]);
        $consultaPreparada->bindValue(":idplantel",$administrador["idplantel"]);

        $consultaPreparada->execute();

        echo "Administrador del plantel modificado";
    }
// ========================================================================
    public function modificar_cedula($cedula){
        
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET cedula = :cedula WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":cedula",$cedula["cedula"]);
        $consultaPreparada->bindValue(":idplantel",$cedula["idplantel"]);

        $consultaPreparada->execute();

        echo "Cédula del plantel modificado";
    }
// ========================================================================
    public function modificar_dictamen($dictamen){
        
        $consultaPreparada = $this->conecction->prepare("UPDATE plantel SET dictamen = :dictamen WHERE (idplantel = :idplantel );");

        $consultaPreparada->bindValue(":dictamen",$dictamen["dictamen"]);
        $consultaPreparada->bindValue(":idplantel",$dictamen["idplantel"]);

        $consultaPreparada->execute();

        echo "Dictamen del plantel modificado";
    }

}
