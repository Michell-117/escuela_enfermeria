<?php

namespace App\Controllers;

use Database\MySQLi\Conecction as MySQLiConecction;


class alumnosControllers{

    public function index(){

    }
    public function create(){

    }
    public function guardarAlumno(){

        $conecction = MySQLiConecction::obtenerInstancia()->obtenerInstanciaBaseDatos();
      
        // $conecction->query("DELETE FROM plantel_turnos WHERE id_plantel_turnos=6");
        $conecction->prepare("INSERT into plantel_turnos(id_plantel_turnos,turno) values(?,?);");
        
        echo "Base de datos actualizada correctamente";


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