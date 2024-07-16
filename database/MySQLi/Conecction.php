<?php

namespace Database\MySQLi;

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

        $conectarMySQLi = new \mysqli($server, $username,$pasword,$database);

        if($conectarMySQLi->connect_errno){
            die("Fallo la conexión: {$conectarMySQLi->connect_error}");
        }
        
        $setnames = $conectarMySQLi->prepare("SET NAMES'utf8'");
        $setnames->execute();

        $this->connection = $conectarMySQLi;

    }

    public function obtenerInstanciaBaseDatos(){
        return $this->connection;
    }
    
}