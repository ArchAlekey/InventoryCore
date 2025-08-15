<?php
    require_once __DIR__ ."/../repositories/ContactoRepository.php";

    class ContactoController{
        
        public function InsertaContacto(){
            $contactoInserta = New ContactoRepository();
            $data_inserta = json_decode(file_get_contents('php://input'), true);
            if(!isset(
                $data_inserta['nombre_contacto'],
                $data_inserta['correo'],
                $data_inserta['mensaje']
            )){
                http_response_code(400);
                echo json_encode(['status'=>'error', 'message'=>'Campos incompletos']);
            }
            try{
                $respuesta = $contactoInserta->insertaContacto(
                    $data_inserta['nombre_contacto'],
                    $data_inserta['correo'],
                    $data_inserta['mensaje']
                );

                if($respuesta){
                    http_response_code(200);
                    echo json_encode(['status'=> 'Ok', 'message'=>"Información de contacto envíada correctamente."]);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> 'error', 'message'=>'Hubo un error al intentar enviar su información de contacto.']);
                }
            } catch(Exception $e){
              http_response_code(500);
              echo json_encode(['status'=> false,'error'=> $e->getMessage()]);      
            }
        }
    }