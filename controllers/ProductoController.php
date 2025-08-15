<?php

    require_once __DIR__ ."/../repositories/ProductoRepository.php";

    class ProductoController{

        public function InsertaProducto(){
            $productoInserta = new ProductoRepository();
            $data_inserta = json_decode(file_get_contents("php://input"),true);

            if(!isset(
                $data_inserta["id_entidad"],
                $data_inserta["producto"],
                $data_inserta["clave_producto"]
            )){
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => "Campos Incompletos"]);
                return;
            }
            try{
                $respuesta = $productoInserta->insertaProducto(
                    $data_inserta["id_entidad"],
                    $data_inserta["producto"],
                    $data_inserta["clave_producto"]);
                if($respuesta){
                    http_response_code(200);
                    echo json_encode(["status"=> 'Ok', 'message'=> 'Se ha agregado el nuevo producto']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> 'error','message'=> 'No de ha podido agregar el producto']);
                }
            } catch(Exception $e){
                http_response_code(500);
                echo json_encode(['status'=> false,'error'=> $e->getMessage()]);
            }
        }

        public function ConsultaProductos(){
            
            $Producto = $_GET['producto'] ?? null;
            $ClaveProducto = $_GET['clave_producto'] ?? null;
            $IdEntidad = $_GET['id_entidad'] ?? null;
            $NombreEntidad = $_GET['nombre_entidad'] ?? null;

            $productoConsulta = new ProductoRepository();

            try{
                $Response = $productoConsulta->consultaProducto($Producto, $ClaveProducto, $IdEntidad, $NombreEntidad);
                if($Response && count($Response) > 0){
                    http_response_code(200);
                    echo json_encode(['status'=> 'Ok', 'message'=> 'Consulta exitiosa', 'data'=>$Response]);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> 'error','message'=> 'No hay productos que coincidan con el parámetro de busqueda.']);
                }
            } catch(Exception $e){
                http_response_code(500);
                echo json_encode(['status'=> false, 'error'=> $e->getMessage()]);
            }
        }

        public function ActualizaProductos(){

            $productoActualiza = new ProductoRepository();

            $data_actualiza = json_decode(file_get_contents('php://input'), true);

            try{
                $Response = $productoActualiza->actualizaProducto(
                    $data_actualiza['id_producto'],
                    $data_actualiza['id_entidad'],
                    $data_actualiza['producto'],
                    $data_actualiza['clave_producto']);
                if($Response){
                    http_response_code(201);
                    echo json_encode(['status'=> 'Ok', 'message'=> 'Se ha actualizado el producto.']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status'=> 'error', 'message'=> 'No se pudo actualizar el producto.']);
                }
            } catch(Exception $e){
                http_response_code(500);
                echo json_encode(['status'=> false, 'error'=> $e->getMessage()]);
            }
        }
    }