<?php

namespace App\Controllers;
use Database\PDO\Conecction;
use DateTime;

class profesorGeneralControlador{
    private $conecction;

    public function __construct(){
        $this->conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
    }

    // =======================================================================
    // =======================================================================
    
    public function obtener_profesores(){
        $consulta = $this->conecction->prepare("SELECT * FROM profesor_general");
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        foreach($resultadosConsulta as $profesor){
            echo nl2br(
             " <strong>ID profesor: </strong>" . $profesor["id_profesor_general"] ."\n"
             ." <strong>Nombre: </strong>" . $profesor["nombre"] ."\n"
             ." <strong>Segundo nombre: </strong>" . $profesor["nombre_2"] . "\n"
             ." <strong>Apellido Paterno: </strong>" . $profesor["apellido_paterno"] . "\n"
             ." <strong>Apellido Materno: </strong>" . $profesor["apellido_materno"] . "\n"
             ." <strong>Genero: </strong>" . $profesor["genero"] . "\n"
             ." <strong>Nivel máximo de estudios: </strong>" . $profesor["nivel_maximo_estudios"] . "\n"
             ." <strong>Entidad Federativa: </strong>" . $profesor["entidad_federativa_nacimiento"] . "\n"
             ." <strong>Fecha de nacimiento: </strong>" . $profesor["fecha_nacimiento"] . "\n"
             ." <strong>Edad: </strong>" . $profesor["edad"] . "\n"
             ." <strong>CURP: </strong>" . $profesor["curp"] . "\n"
            ." <strong>Grupo indigena: </strong>" . $profesor["grupo_indigena"] . "\n"
            ." <strong>Lengua indigena: </strong>" . $profesor["lengua_indigena"] . "\n");

            echo "<hr/>";
        }
    }

    
    // =======================================================================
    // =======================================================================

    public function crearCurpProfesorGeneral($profesor_arr){
        $letras="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $cuenta = "";

        $cuenta = $cuenta . $profesor_arr["apellido_paterno"][0];
        $cuenta = $cuenta . $profesor_arr["apellido_paterno"][1];
        
        $cuenta = $cuenta . $profesor_arr["apellido_materno"][0];

        $cuenta = $cuenta . $profesor_arr["nombre"][0];
   
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][2];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][3];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][5];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][6];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][8];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][9];
        
        $cuenta = $cuenta . $profesor_arr["genero"][0];

        $cuenta = $cuenta . "DF";

        $cuenta = $cuenta . $letras[random_int(0,25)];
        $cuenta = $cuenta . $letras[random_int(0,25)];
        $cuenta = $cuenta . $letras[random_int(0,25)];

        $cuenta = $cuenta . random_int(0,9);
        $cuenta = $cuenta . random_int(0,9); 
        
        $cuenta = strtoupper($cuenta);

        return $cuenta;
    }

    
    // =======================================================================
    // =======================================================================

    public function crearCuentaProfesorGeneral($profesor_arr){
        $cuenta = "";

        $cuenta = $cuenta . $profesor_arr["nombre"][0];
        $cuenta = $cuenta . $profesor_arr["nombre"][1];
        
        if($profesor_arr["nombre_2"] == "n/a"){
            $cuenta = $cuenta . random_int(0,9);
            $cuenta = $cuenta . random_int(0,9); 
        }else{
            $cuenta = $cuenta . $profesor_arr["nombre_2"][0];
            $cuenta = $cuenta . $profesor_arr["nombre_2"][1];
        }
        
        $cuenta = $cuenta . $profesor_arr["apellido_paterno"][0];
        $cuenta = $cuenta . $profesor_arr["apellido_paterno"][1];
        
        $cuenta = $cuenta . $profesor_arr["apellido_materno"][0];
        $cuenta = $cuenta . $profesor_arr["apellido_materno"][1];
        
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][2];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][3];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][5];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][6];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][8];
        $cuenta = $cuenta . $profesor_arr["fecha_nacimiento"][9];
        
        $cuenta = $cuenta . $profesor_arr["genero"][0];
        $cuenta = $cuenta . random_int(10,99);

        $cuenta = $cuenta . "P";
        
        $cuenta = strtoupper($cuenta);

        return $cuenta;
    }

    // =======================================================================
    // =======================================================================

    public function calcularEdad($fecha){
        $today = new DateTime();
        $nacimiento = new DateTime($fecha);
        $edad = $nacimiento->diff($today);

        return $edad->format("%y");
    }
    
    // =======================================================================
    // =======================================================================
    
    public function agregarProfesorFormulario_General(){
        $consulta = $this->conecction->prepare("SELECT idplantel FROM plantel");
        $consulta->execute();
        $resultadosConsulta = $consulta->fetchAll();

        require "../resources/views/profesores/crearGeneral.php" ;
    }
    
    // =======================================================================
    // =======================================================================

    public function crear_profesor_general($profesor){

        $cuenta = "";
        $edad = "";
        $curp = "";
        $consultaPreparada = $this->conecction->prepare("INSERT INTO profesor_general(
            cuenta_profesor,
            plantel,
            nombre,
            nombre_2,
            apellido_paterno,
            apellido_materno,
            genero,
            nivel_maximo_estudios,
            entidad_federativa_nacimiento,
            fecha_nacimiento,
            edad,
            curp,
            grupo_indigena,
            lengua_indigena
        ) VALUES(
            :cuenta_profesor,
            :plantel,    
            :nombre,
            :nombre_2,
            :apellido_paterno,
            :apellido_materno,
            :genero,
            :nivel_maximo_estudios,
            :entidad_federativa_nacimiento,
            :fecha_nacimiento,
            :edad,
            :curp,
            :grupo_indigena,
            :lengua_indigena
        );");

        $cuenta = $this->crearCuentaProfesorGeneral($profesor);
        $curp = $this->crearCurpProfesorGeneral($profesor);
        $edad = $this->calcularEdad($profesor["fecha_nacimiento"]);


        $consultaPreparada->bindValue(":cuenta_profesor",$cuenta);
        $consultaPreparada->bindValue(":plantel",$profesor["plantel"]);
        $consultaPreparada->bindValue(":nombre",$profesor["nombre"]);
        $consultaPreparada->bindValue(":nombre_2",$profesor["nombre_2"]);
        $consultaPreparada->bindValue(":apellido_paterno",$profesor["apellido_paterno"]);
        $consultaPreparada->bindValue(":apellido_materno",$profesor["apellido_materno"]);
        $consultaPreparada->bindValue(":genero",$profesor["genero"]);
        $consultaPreparada->bindValue(":nivel_maximo_estudios",$profesor["nivel_maximo_estudios"]);
        $consultaPreparada->bindValue(":entidad_federativa_nacimiento",$profesor["entidad_federativa_nacimiento"]);
        $consultaPreparada->bindValue(":fecha_nacimiento",$profesor["fecha_nacimiento"]);
        $consultaPreparada->bindValue(":edad",$edad);
        $consultaPreparada->bindValue(":curp",$curp);
        $consultaPreparada->bindValue(":grupo_indigena",$profesor["grupo_indigena"]);
        $consultaPreparada->bindValue(":lengua_indigena",$profesor["lengua_indigena"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================
    
    public function modificarProfesorFormulario_General(){
        $plantel="MAL";
        $consulta = $this->conecction->prepare("SELECT cuenta_profesor FROM profesor_general WHERE(plantel=:plantel)");

        $consulta->bindValue(":plantel",$plantel);
        $consulta->execute();

        $resultadosProfesores = $consulta->fetchAll();

        $consulta = $this->conecction->prepare("SELECT idplantel FROM plantel");
        $consulta->execute();
        $resultadosplantel = $consulta->fetchAll();

        require "../resources/views/profesores/modificarGeneral.php" ;
    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_plantel($plantel){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET plantel = :plantel WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":plantel",$plantel["plantel"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$plantel["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";
    }

    // =======================================================================
    // =======================================================================

    public function modificar_nombre($nombre_profesor){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET nombre = :nombre WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":nombre",$nombre_profesor["nombre"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$nombre_profesor["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
    
    // =======================================================================
    // =======================================================================

    public function modificar_nombre_2($nombre_2_profesor){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET nombre_2 = :nombre_2 WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":nombre_2",$nombre_2_profesor["nombre_2"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$nombre_2_profesor["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
        
    // =======================================================================
    // =======================================================================

    public function modificar_apellido_paterno($apellido_paterno){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET apellido_paterno = :apellido_paterno WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":apellido_paterno",$apellido_paterno["apellido_paterno"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$apellido_paterno["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
            
    // =======================================================================
    // =======================================================================

    public function modificar_apellido_materno($apellido_materno){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET apellido_materno = :apellido_materno WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":apellido_materno",$apellido_materno["apellido_materno"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$apellido_materno["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                
    // =======================================================================
    // =======================================================================

    public function modificar_genero($genero){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET genero = :genero WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":genero",$genero["genero"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$genero["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                    
    // =======================================================================
    // =======================================================================

    public function modificar_nivel_maximo_estudios($nivel_maximo_estudios){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET nivel_maximo_estudios = :nivel_maximo_estudios WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":nivel_maximo_estudios",$nivel_maximo_estudios["nivel_maximo_estudios"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$nivel_maximo_estudios["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                        
    // =======================================================================
    // =======================================================================

    public function modificar_entidad_federativa_nacimiento($entidad_federativa_nacimiento){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET entidad_federativa_nacimiento = :entidad_federativa_nacimiento WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":entidad_federativa_nacimiento",$entidad_federativa_nacimiento["entidad_federativa_nacimiento"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$entidad_federativa_nacimiento["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                            
    // =======================================================================
    // =======================================================================

    public function modificar_fecha_nacimiento($fecha_nacimiento){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET fecha_nacimiento = :fecha_nacimiento WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":fecha_nacimiento",$fecha_nacimiento["fecha_nacimiento"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$fecha_nacimiento["cuenta_profesor"]);

        $consultaPreparada->execute();

        $edad = $this->calcularEdad($fecha_nacimiento["fecha_nacimiento"]);

        $consultaPreparadaEdad = $this->conecction->prepare("UPDATE profesor_general SET edad = :edad WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparadaEdad->bindValue(":edad",$edad);
        $consultaPreparadaEdad->bindValue(":cuenta_profesor",$fecha_nacimiento["cuenta_profesor"]);

        $consultaPreparadaEdad->execute();



        

        echo "La 'fecha_nacimiento' de la tabla 'profesor_general' con el ID: ".$fecha_nacimiento["cuenta_profesor"]. " ha sido modificada correctamente por ". $fecha_nacimiento['fecha_nacimiento'];

        echo "La edad fue actualizada a " . $edad ;
        require "../resources/views/avisos/aviso1.php";

    }
                                
    // =======================================================================
    // =======================================================================

    public function modificar_edad($edad){
        $consulta = $this->conecction->prepare("SELECT fecha_nacimiento FROM profesor_general WHERE(cuenta_profesor = :cuenta_profesor );");

        $consulta->bindValue(":cuenta_profesor",$edad["cuenta_profesor"]);
        $consulta->execute();
        $fecha_nacimiento = $consulta->fetchAll();
       
        $edad_actualizada = $this->calcularEdad($fecha_nacimiento[0]["fecha_nacimiento"]);

        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET edad = :edad WHERE (cuenta_profesor = :cuenta_profesor ); ");


        $consultaPreparada->bindValue(":edad",$edad_actualizada);
        $consultaPreparada->bindValue(":cuenta_profesor",$edad["cuenta_profesor"]);

        $consultaPreparada->execute();

        echo "Edad actualiza correctamente por " . $edad_actualizada . " años.";
        require "../resources/views/avisos/aviso1.php";
        
    }
                                    
    // =======================================================================
    // =======================================================================

    public function modificar_curp($curp){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET curp = :curp WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":curp",$curp["curp"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$curp["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                                        
    // =======================================================================
    // =======================================================================

    public function modificar_grupo_indigena($grupo_indigena){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET grupo_indigena = :grupo_indigena WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":grupo_indigena",$grupo_indigena["grupo_indigena"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$grupo_indigena["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
                                            
    // =======================================================================
    // =======================================================================

    public function modificar_lengua_indigena($lengua_indigena){
       
        $consultaPreparada = $this->conecction->prepare("UPDATE profesor_general SET lengua_indigena = :lengua_indigena WHERE (cuenta_profesor = :cuenta_profesor ); ");

        $consultaPreparada->bindValue(":lengua_indigena",$lengua_indigena["lengua_indigena"]);
        $consultaPreparada->bindValue(":cuenta_profesor",$lengua_indigena["cuenta_profesor"]);

        $consultaPreparada->execute();

        require "../resources/views/avisos/aviso1.php";

    }
}
