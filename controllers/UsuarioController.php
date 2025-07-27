<?php

    require_once __DIR__ ."/../repositories/UsuarioRepository.php";

    class UsuarioController{

        public function ConsultaUsuarios(){
            $Nombre =           $_GET["nombre"] ?? null;
            $ApellidoPaterno =  $_GET["apellido_paterno"] ?? null;
            $ApellidoMaterno =  $_GET["apellido_materno"] ?? null;
            $Celular =          $_GET["celular"] ?? null;
            $Correo =           $_GET["correo"] ?? null;
            $NombreEntidad =    $_GET["nombre_entidad"] ?? null;
            $Habilitado =       $_GET["habilitado"] ?? null;

            $usuarioConsulta = new UsuarioRepository();

            try{
                $consultaUsuario = $usuarioConsulta->consultaUsuarios($Nombre, $ApellidoPaterno, $ApellidoMaterno, $Celular, $Correo, $NombreEntidad, $Habilitado);
                if($consultaUsuario && count($consultaUsuario) > 0){
                    header('Content-Type: application/json');
                    http_response_code(200);
                    echo json_encode(['status' => true, 'message' => 'Consulta Exitosa', 'data' => $consultaUsuario]);
                } else{
                    http_response_code(200);
                    echo json_encode(['status'=> true,'message'=> 'No hay registro de usuarios']);
                }
            } catch(Exception $e){
                http_response_code(500);
                echo json_encode(['status'=> false,'error'=> $e->getMessage()]);
            }

        }

        public function InsertarUsuario(){
            $usuarioInserta = new UsuarioRepository();
            $datos_inserta = json_decode(file_get_contents('php://input'), true);
            
                if(!isset(
                    $datos_inserta['nombre'],
                    $datos_inserta['apellido_paterno'],
                    $datos_inserta['apellido_materno'],
                    $datos_inserta['celular'],
                    $datos_inserta['correo'],
                    $datos_inserta['id_tipo_usuario'],
                    $datos_inserta['contrasenia'],
                )){
                    http_response_code(400);
                    echo json_encode(['status'=> false,'error'=> 'Campos Incompletos']);
                    return;
                }
            try{
                $respuesta = $usuarioInserta->insertaUsuario(
                        $datos_inserta['nombre'],
                        $datos_inserta['apellido_paterno'],
                        $datos_inserta['apellido_materno'],
                        $datos_inserta['celular'],
                        $datos_inserta['correo'],
                        $datos_inserta['id_entidad'],
                        $datos_inserta['id_tipo_usuario'],
                        $datos_inserta['contrasenia']);
                if($respuesta){
                    http_response_code(200);
                    echo json_encode(['status'=> true,'message'=> 'Se ha insertado el nuevo usuario']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> false,'error'=> 'Hubo un error al tratar de registar al usuario']);
                }
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['status'=> false,'error'=> $e->getMessage()]);
            }
        }

        public function ActualizaUsuario(){
            $usuarioActualiza = new UsuarioRepository();
            $datos_actualiza = json_decode(file_get_contents('php://input'), true);

            try{
                $respuesta = $usuarioActualiza->actualizaUsuarios(
                    $datos_actualiza['id_persona'],
                    $datos_actualiza['nombre'],
                    $datos_actualiza['apellido_paterno'],
                    $datos_actualiza['apellido_materno'],
                    $datos_actualiza['celular'],
                    $datos_actualiza['correo'],
                    $datos_actualiza['id_tipo_usuario']);

                if($respuesta){
                    http_response_code(200);
                    echo json_encode(['status'=> true,'message'=> 'Se han actualizado correctamente los datos.']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> false,'message'=> 'No se pudierón actualizar los datos.']);
                }
                
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['status'=> false,'message'=> $e->getMessage()]);
            }
        }

        public function InhabilitaUsuario(){
            $usuarioInhabilita = new UsuarioRepository();
            $datos_inhabilita = json_decode(file_get_contents('php://input'), true);

            try{
                $respuesta = $usuarioInhabilita->inhabilitaUsuarios($datos_inhabilita['id_persona']);

                if($respuesta){
                    http_response_code(200);
                    echo json_encode(['status'=> true,'message'=> 'Se ha inhabilitado al usuario']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> false,'message'=> 'No se ha podido inhabilitar al usuario']);
                }
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['status'=> false,'message'=> $e->getMessage()]);
            }
        }

        public function HabilitaUsuario(){
            $usuarioHabilita = new UsuarioRepository();
            $datos_habilita = json_decode(file_get_contents('php://input'), true);

            try{
                $respuesta = $usuarioHabilita->habilitaUsuarios($datos_habilita['id_persona']);

                if($respuesta){
                    http_response_code(200);
                    echo json_encode(['status'=> true,'message'=> 'Se ha habilitado al usuario']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> false,'message'=> 'No se ha podido habilitar al usuario']);
                }
            } catch(Exception $e) {
                http_response_code(500);
                echo json_encode(['status'=> false,'message'=> $e->getMessage()]);
            }
        }
    }