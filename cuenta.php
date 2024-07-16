<?php

function nRandom (){
    return random_int(0,9);
}
$cuenta = "";

$alumno = [
    "nombre" => "Michell",
    "nombre_2" => "n/a",
    "apellido_paterno" => "Ruiz",
    "apellido_materno" => "Arredondo",
    "fecha_nacimiento" => "1993-07-29",
    "genero" => "Hombre"

];

// echo $n;

$cuenta = $cuenta . $alumno["nombre"][0];
$cuenta = $cuenta . $alumno["nombre"][1];

if($alumno["nombre_2"] == "n/a"){
    $cuenta = $cuenta . nRandom();
    $cuenta = $cuenta . nRandom(); 
}else{
    $cuenta = $cuenta . $alumno["nombre_2"][0];
    $cuenta = $cuenta . $alumno["nombre_2"][1];
}

$cuenta = $cuenta . $alumno["apellido_paterno"][0];
$cuenta = $cuenta . $alumno["apellido_paterno"][1];

$cuenta = $cuenta . $alumno["apellido_materno"][0];
$cuenta = $cuenta . $alumno["apellido_materno"][1];

$cuenta = $cuenta . $alumno["fecha_nacimiento"][2];
$cuenta = $cuenta . $alumno["fecha_nacimiento"][3];
$cuenta = $cuenta . $alumno["fecha_nacimiento"][5];
$cuenta = $cuenta . $alumno["fecha_nacimiento"][6];
$cuenta = $cuenta . $alumno["fecha_nacimiento"][8];
$cuenta = $cuenta . $alumno["fecha_nacimiento"][9];

$cuenta = $cuenta . $alumno["genero"][0];
$cuenta = $cuenta . random_int(1000,9999);

$cuenta = strtoupper($cuenta);

echo $cuenta;

$today = new DateTime();
$nacimiento = new DateTime($alumno["fecha_nacimiento"]);
$edad = $nacimiento->diff($today);
var_dump($edad->format("%y"));


$iframe = "//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d559.7760577922663!2d-99.04770536673927!3d19.294997736867572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce03f02c6b049b%3A0x3ecda92159208b37!2sCentro%20comunitario%20Juan%20Bretel!5e0!3m2!1ses-419!2smx!4v1712713109900!5m2!1ses-419!2smx";
var_dump($iframe);

$JMM = "//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d559.7780311798981!2d-99.05771796128971!3d19.29442078636037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce03aaa3156d4d%3A0xeba83a315e9f1ea!2sCentro%20cultural%20Juan%20Manuel%20Mart%C3%ADnez!5e0!3m2!1ses-419!2smx!4v1712713485141!5m2!1ses-419!2smx";
var_dump($JMM);