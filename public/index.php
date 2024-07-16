<?php

require("../vendor/autoload.php");

use App\Controllers\alumnoAsistenciasControlador;
use App\Controllers\alumnoCalificacionesControlador;
use App\Controllers\alumnoContactoControlador;
use App\Controllers\alumnoControlControlador;
use App\Controllers\alumnoDomicilioControlador;
use App\Controllers\alumnoFamiliarControlador;
use App\Controllers\alumnoGeneralCotrolador;
use App\Controllers\alumnoSaludControlador;
use App\Controllers\plantelesControlador;
use App\Controllers\profesorContactoContolador;
use App\Controllers\profesorDomicilioContolador;
use App\Controllers\profesorFamiliarControlador;
use App\Controllers\profesorGeneralControlador;
use App\Controllers\profesorSaludControlador;
use Router\RouterHandler;
use Router\RouterInicio;

$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

// echo "<prev>";
// var_dump($slug);
// echo "<prev>";

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;


// Instancia del router

$router = new RouterHandler();

if ($resource == "/") {
    // require "../resources/views/inicio/home.php";
    require "../resources/views/inicio/login.php";

    // $method = $_POST["method"] ?? "get";
    // $formulario = $_POST["formulario"] ?? null;
    // $router_inicio->set_form($formulario);
    // $router_inicio->set_method($method);
    // $router_inicio->set_data($_POST);
    // $router_inicio->set_page($slug[0]);

    // $router_inicio->route($id);

}elseif ($resource == "alumnos" || $resource == "profesores" || $resource == "planteles" || $resource == "grupos" || $resource == "calificaciones" || $resource == "asistencias" || $resource == "inicio" || $resource == "iniciar" || $resource == "inicio_usuario") {
    $method = $_POST["method"] ?? "get";
    $formulario = $_POST["formulario"] ?? null;
    $router->set_form($formulario);
    $router->set_method($method);
    $router->set_data($_POST);
    $router->set_page($slug[0]);

    $router->route($id);
}else{
    require "../resources/views/avisos/error404.php";
}



