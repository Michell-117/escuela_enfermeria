<?php

namespace Router;
session_start();


use App\Controllers\alumnoAsistenciasControlador;
use App\Controllers\alumnoCalificacionesControlador;
use App\Controllers\alumnoContactoControlador;
use App\Controllers\alumnoDomicilioControlador;
use App\Controllers\alumnoFamiliarControlador;
use App\Controllers\alumnoGeneralCotrolador;
use App\Controllers\alumnoSaludControlador;
use App\Controllers\grupoControlador;
use App\Controllers\loginControlador;
use App\Controllers\plantelesControlador;
use App\Controllers\profesorContactoContolador;
use App\Controllers\profesorDomicilioContolador;
use App\Controllers\profesorFamiliarControlador;
use App\Controllers\profesorGeneralControlador;
use App\Controllers\profesorSaludControlador;

class RouterHandler{

    protected $method;
    protected $data;
    protected $formulario;
    protected $page;

    public function set_method($method1){
        $this->method=$method1;
    }
    public function set_data($data1){
        $this->data=$data1;
    }
    public function set_form($formulario1){
        $this->formulario=$formulario1;
    }
    public function set_page($page1){
        $this->page=$page1;
    }

    public function route($id){
        


        switch ($this->method) {
            case 'get':
                // if($id && $id == "agregar-Alumno-General")
                //     $recurso->agregarAlumnoFormulario();
                // else if($id)
                //     $recurso->obtener_alumno($id);
                // else
                //     $recurso->obtener_alumnos();

                if($this->page == "inicio"){
                    if($_SESSION["usuario_cuenta"] == "" && $_SESSION["usuario_tipo"] == ""){
                        require "../resources/views/inicio/login.php";
                    }else{
                        require "../resources/views/inicio/home.php";
                    }
                }

                // if($this->page == "inicio_usuario"){
                //     $controlador = new loginControlador();
                //     $controlador->inicio_exito($data);
                // }

                if($this->page == "alumnos"){
                    switch ($id) {
                        case null:
                            echo " Pagina Alumnos inicio";
                            break;
                            
                        case "agregar":
                            $controlador = new alumnoGeneralCotrolador;
                            $controlador->agregarAlumnoFormulario_General();
                            break;
                                
                        case "agregar-contacto":
                            $controlador = new alumnoContactoControlador;
                            $controlador->agregarAlumnoFormulario_Contacto();
                            break;
                                    
                        case "agregar-salud":
                            $controlador = new alumnoSaludControlador;
                            $controlador->agregarAlumnoFormulario_Salud();
                            break;
                                    
                        case "agregar-familiar":
                            $controlador = new alumnoFamiliarControlador;
                            $controlador->agregarAlumnoFormulario_Familiar();
                            break;
                                        
                        case "agregar-domicilio":
                            $controlador = new alumnoDomicilioControlador;
                            $controlador->agregarAlumnoFormulario_Domicilio();
                            break;


                        case "modificar-general":
                            $controlador = new alumnoGeneralCotrolador;
                            $controlador->modificarAlumnoFormulario_General();
                            break;
                        
                                                    
                        case "modificar-contacto":
                            $controlador = new alumnoContactoControlador;
                            $controlador->modificarAlumnoFormulario_Contacto();
                            break;
                                                        
                        case "modificar-salud":
                            $controlador = new alumnoSaludControlador;
                            $controlador->modificarAlumnoFormulario_Salud();
                            break;

                        case "modificar-familiar":
                            $controlador = new alumnoFamiliarControlador;
                            $controlador->modificarAlumnoFormulario_Familiar();
                            break;
                            
                        case "modificar-domicilio":
                            $controlador = new alumnoDomicilioControlador;
                            $controlador->modificarAlumnoFormulario_Domicilio();
                            break;
                            
                        
                        default:
                        require "../resources/views/avisos/error404.php";
                            break;
                    }
                } 

                if($this->page == "profesores"){
                    switch ($id) {
                        case null:
                            echo " Pagina Profesores inicio";
                            break;
                            
                        case "agregar":
                            $controlador = new profesorGeneralControlador;
                            $controlador->agregarProfesorFormulario_General();
                            break;
                                
                        case "agregar-contacto":
                            $controlador = new profesorContactoContolador;
                            $controlador->agregarProfesorFormulario_Contacto();
                            break;
                                    
                        case "agregar-salud":
                            $controlador = new profesorSaludControlador;
                            $controlador->agregarProfesorFormulario_Salud();
                            break;
                                    
                        case "agregar-familiar":
                            $controlador = new profesorFamiliarControlador;
                            $controlador->agregarProfesorFormulario_Familiar();
                            break;
                                        
                        case "agregar-domicilio":
                            $controlador = new profesorDomicilioContolador;
                            $controlador->agregarProfesorFormulario_Domicilio();
                            break;
                        
                        case "modificar-general":
                            $controlador = new profesorGeneralControlador;
                            $controlador->modificarProfesorFormulario_General();
                            break;
                        
                                                    
                        case "modificar-contacto":
                            $controlador = new profesorContactoContolador;
                            $controlador->modificarProfesorFormulario_Contacto();
                            break;
                                                        
                        case "modificar-salud":
                            $controlador = new profesorSaludControlador;
                            $controlador->modificarProfesorFormulario_Salud();
                            break;

                        case "modificar-familiar":
                            $controlador = new profesorFamiliarControlador;
                            $controlador->modificarProfesorFormulario_Familiar();
                            break;
                            
                        case "modificar-domicilio":
                            $controlador = new profesorDomicilioContolador;
                            $controlador->modificarProfesorFormulario_Domicilio();
                            break;

                        // case "asignar-asistencias":
                        //     $controlador = new alumnoAsistenciasControlador;
                        //     $controlador->asignar_asistencias_formulario();
                        //     break;
                        
                        // case "asignar-calificaciones":
                        //     $controlador = new alumnoCalificacionesControlador;
                        //     $controlador->asignar_calificaciones_formulario();
                        //     break;
                            
                        
                        default:
                        require "../resources/views/avisos/error404.php";
                            break;
                    }
                }

                if($this->page == "planteles"){
                    switch ($id) {
                        case null:
                            echo " Pagina planteles inicio";
                            break;
                        
                        case "grupo":
                            $controlador = new plantelesControlador;
                            $controlador->agregarPlantel_formulario();
                            break;

                        case "alumno":
                            $controlador = new plantelesControlador;
                            $controlador->modificarPlantel_formulario();
                            break;

                        default:
                        require "../resources/views/avisos/error404.php";
                            break;
                    }
                }

                if($this->page == "grupos"){
                    switch ($id) {
                        case null:
                            echo "Paginas grupos inicio";
                            break;
                        
                        case "agregar":
                            $controlador = new grupoControlador;
                            $controlador->crearGrupo_formulario();
                            break;

                        case "modificar":
                            $controlador = new grupoControlador;
                            $controlador->modificarGrupo_formulario();
                            break;

                        default:
                        require "../resources/views/avisos/error404.php";
                            break;
                    }
                }

                if($this->page == "calificaciones"){
                    switch ($id) {
                        case null:
                            $controlador = new alumnoCalificacionesControlador;
                            $controlador->calificaciones_inicio();
                            break;
                        
                        case "grupo":
                            $controlador = new alumnoCalificacionesControlador;
                            $controlador->seleccionar_calificaciones_grupo_formulario();
                            break;

                        case "alumno":
                            $controlador = new alumnoCalificacionesControlador;
                            $controlador->asignar_calificacionesAlumno_formulario();
                            break;

                        default:
                        require "../resources/views/avisos/error404.php";
                            break;
                    }
                }

                if($this->page == "asistencias"){
                    switch ($id) {
                        case null:
                            echo " Pagina asistencias inicio";
                            break;
                        
                        case "grupo":
                            $controlador = new alumnoCalificacionesControlador;
                            // $controlador->asignar_calificacionesGrupo_formulario();
                            break;

                        case "alumno":
                            $controlador = new alumnoCalificacionesControlador;
                            // $controlador->asignar_calificacionesAlumno_formulario();
                            break;

                        default:
                        require "../resources/views/avisos/error404.php";
                            break;
                    }
                }

                break;

            case 'post':
                // $recurso->agregarAlumno($this->data);
                $form = $this->formulario;
                // var_dump($form);
                if($form == "crear_alumno_general"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->agregarAlumno_General($this->data);
                    // var_dump($this->data);
                }elseif($form == "iniciar_sesion"){
                    $controlador = new loginControlador;
                    $controlador->validacion_inicio($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_plantel"){
                    $controlador = new plantelesControlador;
                    $controlador->agregarSede($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_idplantel"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_idplantel($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_nombre"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_nombre($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_domicilio"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_domicilio($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_telefono"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_telefono($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_dependecia_operativa"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_dependencia_operativa($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_control"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_control($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_sub_control"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_sub_control($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_sostenimiento"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_sostenimiento($this->data);
                    // var_dump($this->data);
                }elseif($form == "modificar_plantel_administrador"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_administrador($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_cedula"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_cedula($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_plantel_dictamen"){
                    $controlador = new plantelesControlador;
                    $controlador->modificar_dictamen($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_nombre"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_nombre($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_grupo"){
                    $controlador = new grupoControlador;
                    $controlador->agregar_grupo($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_grupo_plantel_id"){
                    $controlador = new grupoControlador;
                    $controlador->modificar_grupo_plantel($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_grupo_grupo"){
                    $controlador = new grupoControlador;
                    $controlador->modificar_grupo_grupo($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_grupo_horario"){
                    $controlador = new grupoControlador;
                    $controlador->modificar_grupo_horario($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_grupo_turno"){
                    $controlador = new grupoControlador;
                    $controlador->modificar_grupo_turno($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_grupo_dias"){
                    $controlador = new grupoControlador;
                    $controlador->modificar_grupo_dias($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_grupo_materia"){
                    $controlador = new grupoControlador;
                    $controlador->modificar_materia($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_grupo_cuenta_profesor"){
                    $controlador = new grupoControlador;
                    $controlador->modificar_grupo_cuenta_profesor($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_nombre_2"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_nombre_2($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_apellido_paterno"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_apellido_paterno($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_apellido_materno"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_apellido_materno($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_genero"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_genero($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_curp"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_curp($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_fecha_nacimiento"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_fecha_nacimiento($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_edad"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_edad($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_nivel_maximo_estudios"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_nivel_maximo_estudios($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_entidad_federativa"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_entidad_federativa($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_grupo_indigena"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_grupo_indigena($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_lengua_indigena"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_lengua_indigena($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_ciclo_escolar"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_ciclo_escolar($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_estatus"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_estatus($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_plantel"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_plantel($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_general_plantel_grupo_id"){
                    $controlador = new alumnoGeneralCotrolador;
                    $controlador->modificar_plantel_grupo_id($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_alumno_contacto"){
                    $controlador = new alumnoContactoControlador;
                    $controlador->agregarAlumno_Contacto($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_contacto_email"){
                    $controlador = new alumnoContactoControlador;
                    $controlador->modificarAlumno_email($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_contacto_telefono_fijo"){
                    $controlador = new alumnoContactoControlador;
                    $controlador->modificarAlumno_telefono_fijo($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_contacto_telefono_celular"){
                    $controlador = new alumnoContactoControlador;
                    $controlador->modificarAlumno_telefono_celular($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_alumno_salud"){
                    $controlador = new alumnoSaludControlador;
                    $controlador->agregar_alumno_salud($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_salud_tipo_sangre"){
                    $controlador = new alumnoSaludControlador;
                    $controlador->modificar_tipo_sangre($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_salud_enfermedad_cronica"){
                    $controlador = new alumnoSaludControlador;
                    $controlador->modificar_enfermedad_cronica($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_salud_alergia"){
                    $controlador = new alumnoSaludControlador;
                    $controlador->modificar_alergia($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_salud_servicio_medico"){
                    $controlador = new alumnoSaludControlador;
                    $controlador->modificar_servicio_medico($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_alumno_familiar"){
                    $controlador = new alumnoFamiliarControlador;
                    $controlador->crear_alumno_familiar($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_numero_contacto"){
                    $controlador = new alumnoFamiliarControlador;
                    $controlador->modificar_numero_contacto($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_parentesco"){
                    $controlador = new alumnoFamiliarControlador;
                    $controlador->modificar_parentesco($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_alumno_nombre_familiar"){
                    $controlador = new alumnoFamiliarControlador;
                    $controlador->modificar_nombre_familiar($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_alumno_domicilio"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->crear_alumno_domicilio($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_calle"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_calle($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_numero_exterior"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_numero_exterior($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_numero_interior"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_numero_interior($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_manzana"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_manzana($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_lote"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_lote($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_barrio_colonia"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_barrio_colonia($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_codigo_postal"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_codigo_postal($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_alcaldia"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_alcaldia($this->data);
                    // var_dump($this->data);

                }elseif($form == "modificar_alumno_coordinacion_territorial"){
                    $controlador = new alumnoDomicilioControlador;
                    $controlador->modificar_coordinacion_territorial($this->data);
                    // var_dump($this->data);

                }elseif($form == "crear_profesor_general"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->crear_profesor_general($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_plantel"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_plantel($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_nombre"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_nombre($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_nombre_2"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_nombre_2($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_apellido_paterno"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_apellido_paterno($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_apellido_materno"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_apellido_materno($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_genero"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_genero($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_nivel_maximo_estudios"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_nivel_maximo_estudios($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_entidad_federativa"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_entidad_federativa_nacimiento($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_fecha_nacimiento"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_fecha_nacimiento($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_edad"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_edad($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_curp"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_curp($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_grupo_indigena"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_grupo_indigena($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_general_lengua_indigena"){
                    $controlador = new profesorGeneralControlador;
                    $controlador->modificar_lengua_indigena($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_profesor_contacto"){
                    $controlador = new profesorContactoContolador;
                    $controlador->crear_profesor_contacto($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_contacto_email"){
                    $controlador = new profesorContactoContolador;
                    $controlador->modificar_profesor_email($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_contacto_telefono_fijo"){
                    $controlador = new profesorContactoContolador;
                    $controlador->modificar_profesor_telefono_fijo($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_contacto_telefono_celular"){
                    $controlador = new profesorContactoContolador;
                    $controlador->modificar_profesor_telefono_celular($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_profesor_salud"){
                    $controlador = new profesorSaludControlador;
                    $controlador->crear_profesor_salud($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_salud_tipo_sangre"){
                    $controlador = new profesorSaludControlador;
                    $controlador->modificar_tipo_sangre($this->data);
                    // var_dump($this->data);
                
                }
                elseif($form == "modificar_profesor_salud_enfermedad_cronica"){
                    $controlador = new profesorSaludControlador;
                    $controlador->modificar_enfermedad_cronica($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_salud_alergia"){
                    $controlador = new profesorSaludControlador;
                    $controlador->modificar_alergia($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_salud_servicio_medico"){
                    $controlador = new profesorSaludControlador;
                    $controlador->modificar_servicio_medico($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_profesor_familiar"){
                    $controlador = new profesorFamiliarControlador;
                    $controlador->crear_profesor_familiar($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_familiar_nombre_familiar"){
                    $controlador = new profesorFamiliarControlador;
                    $controlador->modificar_nombre_familiar($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_familiar_parentesco"){
                    $controlador = new profesorFamiliarControlador;
                    $controlador->modificar_parentesco($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_familiar_numero_contacto"){
                    $controlador = new profesorFamiliarControlador;
                    $controlador->modificar_numero_contacto($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "crear_profesor_domicilio"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->crear_profesor_domicilio($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_calle"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_calle($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_numero_exterior"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_numero_exterior($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_numero_interior"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_numero_interior($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_manzana"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_manzana($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_lote"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_lote($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_barrio_colonia"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_barrio_colonia($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_codigo_postal"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_codigo_postal($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_alcaldia"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_alcaldia($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "modificar_profesor_domicilio_coordinacion_territorial"){
                    $controlador = new profesorDomicilioContolador;
                    $controlador->modificar_coordinacion_territorial($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "seleccionar_grupo_calificaciones"){
                    $controlador = new alumnoCalificacionesControlador;
                    $controlador->asignar_calificacionesGrupo_formulario($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "calificar_alumnos"){
                    $controlador = new alumnoCalificacionesControlador;
                    $controlador->calificar_grupo($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "calificar_alumnos_grupo"){
                    $controlador = new alumnoCalificacionesControlador;
                    $controlador->calificar_grupo($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "seleccionar_info_alumno_calificacion"){
                    $controlador = new alumnoCalificacionesControlador;
                    $controlador->formulario_calificacion_alumno($this->data);
                    // var_dump($this->data);
                
                }elseif($form == "calificar_alumno_individual"){
                    $controlador = new alumnoCalificacionesControlador;
                    $controlador->asignar_calificacion_alumno($this->data);
                    // var_dump($this->data);
                
                }else{
                    echo "Error 404. Pagina no encontrada!!!! (Post)";
                }

                break;
                
            
            default:
                
                break;
        }
    }

}