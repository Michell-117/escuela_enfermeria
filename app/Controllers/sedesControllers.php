<?php

namespace App\Controllers;

use Database\MySQLi\Conecction;

class sedesControllers {
    public function index(){

    }
    public function create(){

    }

    // utilizando MySQLi
    public function guardarSede($data){

        $conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
      
        // $conecction->query("DELETE FROM plantel_turnos WHERE id_plantel_turnos=6");
        $consulta = $conecction->prepare("INSERT into plantel(
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
            ) values(?,?,?,?,?,?,?,?,?,?,?);");

        $consulta->bind_param("issssssssss",$idplantel,$nombre,$domicilio,$telefono,$dependencia_operativa,$control,$sub_control,$sostenimiento,$administrador,$cedula,$dictamen);

        $idplantel = $data['idplantel'];
        $nombre = $data['nombre'];
        $domicilio = $data['domicilio'];
        $telefono = $data['telefono'];
        $dependencia_operativa = $data['dependencia_operativa'];
        $control = $data['control'];
        $sub_control = $data['sub_control'];
        $sostenimiento = $data['sostenimiento'];
        $administrador = $data['administrador'];
        $cedula = $data['cedula'];
        $dictamen = $data['dictamen'];

        $consulta->execute();
        // plantel(nombre,domicilio,telefono,dependencia_operativa,control,sub_control,sostenimiento,administrador,cedula,dictamen) values("Juan Bretel","Gitana s/n entre Calle Mantarraya y Calle Corvina, Colonia del Mar", "55-00-00-00-00","Gobierno de la Ciudad de México - Alcaldía Tláhuac","Público","Federal","Gobierno de la Ciudad de México - Alcaldía Tláhuac - Dirección General Desarrollo Social y Bienestar","Sin asignar","09GBT0005S","SI"
        
        echo "La base de datos 'plantel' ha sido actualizada correctamente";


    }
    public function show(){

    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }
}