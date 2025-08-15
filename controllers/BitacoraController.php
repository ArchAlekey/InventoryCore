<?php
    require_once __DIR__ ."/../repositories/BitacoraRepository.php";

    class BitacoraController{
        public function modBitacora(){

            $bitacoraModificacion = new BitacoraRepository();

            $data_post = json_decode(file_get_contents("php://input"), true);

            if(!isset(
                $data_post['id_item_inventario'],
                $data_post['cantidad'],
                $data_post['tipo_modificacion'],
                $data_post['id_usuario'],
                )){
                http_response_code(400);
                echo json_encode(["status" => false, "error" => "Campos incompletos"]);
                return;
            }
            try{
                $ok = $bitacoraModificacion->actualizaBitacora(
                        $data_post['id_item_inventario'], 
                        $data_post['cantidad'], 
                        $data_post['tipo_modificacion'], 
                        $data_post['id_usuario']);

                if($ok){
                    http_response_code(201);
                    echo json_encode(['status'=> 'Ok','message'=> 'Modificación realizada']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> 'error','message'=> 'No se pudo realizar la modificación']);
                }
            } catch(Exception $e){
                http_response_code(500);
                echo json_encode(['status'=> false,'error'=> $e->getMessage()]);
            }
        }

        public function pullBitacora(){
            $idItemInventario = $_GET['id_item_inventario'] ?? null;
            $tipoModificacion = $_GET['tipo_modificacion'] ?? null;

            $bitacoraConsulta = new BitacoraRepository();

                try{
                    $resultadoBitacora = $bitacoraConsulta->consultaBitacora($idItemInventario, $tipoModificacion);
                    if($resultadoBitacora && count($resultadoBitacora) > 0){
                        header('Content-Type: application/json');
                        http_response_code(200);
                        echo json_encode(['status' => 'Ok','message'=> 'Consulta exitosa', 'data' => $resultadoBitacora]);
                    } else {
                        http_response_code(201);
                        echo json_encode(['status'=> 'Ok','message'=> 'No hay datos para mostrar']);
                    }
                } catch(Exception $e){
                    http_response_code(500);
                    echo json_encode(['status'=> false,'error'=> $e->getMessage()]);
                }
            }
    }