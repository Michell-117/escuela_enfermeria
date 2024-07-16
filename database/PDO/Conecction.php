<?php

namespace Database\PDO;

class Conecction {
    
    private static $instancia;
    private $connection;

    private function __construct(){
        $this->make_connection();
    }

    public static function obtenerInstancia(){
        if(!self::$instancia instanceof self){
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    private function make_connection(){
        $server = "localhost";
        $username = "root";
        $pasword = "root";
        $database = "escuela_auxiliar_enfermeria";

        $conectarPDO = new \PDO("mysql:host=$server;dbname=$database",$username,$pasword);
        $setnames = $conectarPDO->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $conectarPDO;

    }

    public function obtenerInstanciaBaseDatos(){
        return $this->connection;
    }
    
}