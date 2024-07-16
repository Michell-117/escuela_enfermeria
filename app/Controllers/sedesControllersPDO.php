<?php

namespace App\Controllers;

use Database\PDO\Conecction;

class sedesControllersPDO {

    // utilizando PDO
    public function guardarSede($data){ //listo

        $conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
        $filasAfectadas = $conecction->exec("INSERT INTO plantel(idplantel,nombre,domicilio,telefono,dependencia_operativa,control,sub_control,sostenimiento,administrador,cedula,dictamen) 
        VALUES(
            {$data['idplantel']},
            '{$data['nombre']}',
            '{$data['domicilio']}',
            '{$data['telefono']}',
            '{$data['dependencia_operativa']}',
            '{$data['control']}',
            '{$data['sub_control']}',
            '{$data['sostenimiento']}',
            '{$data['administrador']}',
            '{$data['cedula']}',
            '{$data['dictamen']}'
        );");
      
        // print_r($conecction);
        echo "Se han afectado $filasAfectadas fila";
    }


    public function guardarSede2($data){ // Prepara y evita sql injection -- funciona
        $conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
        $consultaPreparada = $conecction->prepare("INSERT INTO plantel(
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

        $consultaPreparada->execute($data);
      
        // print_r($conecction);
        echo "La base de datos ha sido actualizada";
    }


    public function guardarSede3($data){ // ademas bindeamos los valores, haciendo mas seguro contra SQL injection -- 
        $conecction = Conecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
        $consultaPreparada = $conecction->prepare("INSERT INTO plantel(
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

        $consultaPreparada->bindValue(":idplantel",$data["idplantel"]);
        $consultaPreparada->bindValue(":nombre",$data["nombre"]);
        $consultaPreparada->bindValue(":domicilio",$data["domicilio"]);
        $consultaPreparada->bindValue(":telefono",$data["telefono"]);
        $consultaPreparada->bindValue(":dependencia_operativa",$data["dependencia_operativa"]);
        $consultaPreparada->bindValue(":control",$data["control"]);
        $consultaPreparada->bindValue(":sub_control",$data["sub_control"]);
        $consultaPreparada->bindValue(":sostenimiento",$data["sostenimiento"]);
        $consultaPreparada->bindValue(":administrador",$data["administrador"]);
        $consultaPreparada->bindValue(":cedula",$data["cedula"]);
        $consultaPreparada->bindValue(":dictamen",$data["dictamen"]);

        $consultaPreparada->execute();
      
        // print_r($conecction);
        echo "La base de datos ha sido actualizada y bindeada";
    }

}