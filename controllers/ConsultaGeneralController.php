<?php

    require_once __DIR__ ."/../repositories/InventatioRepository.php";

class ConsultaGeneralController{
    public function consultaGeneral(){
        $Producto = $_GET["producto"] ?? null;
        $ClaveProducto = $_GET["clave_producto"] ?? null;
        $IdUnidadMedida = $_GET["id_unidad_medida"] ?? null;
        $Nombre = $_GET["nombre"] ?? null;
        $NombreEntidad = $_GET["nombre_entidad"] ?? null;
        $Habilitado = $_GET["habilitado"] ?? null;

        $inventario = new InventatioRepository();

        try{
            $result = $inventario->getGeneral($Producto, $ClaveProducto, $IdUnidadMedida, $Nombre, $NombreEntidad, $Habilitado);
            if($result && count($result) > 0){
                header("Content-Type: application/json");
                http_response_code(200);
                echo json_encode(['status' => true, 'data' => $result]);
            } else {
                http_response_code(200);
                echo json_encode(['status'=> true,'message'=> 'No hay registros de producto con estas caracteristicas']);
            }

        }catch(Exception $e){
            http_response_code(500);
            echo json_encode(['status'=> false, 'error' => 'Error al recuperar los datos' .$e->getMessage()]);
        }
    }

    public function InsertaItemInventario(){
        
        $ItemInserta = new InventatioRepository();
        $data_inserta = json_decode(file_get_contents('php://input'), true);

        if(!isset(
            $data_inserta['id_producto'],
            $data_inserta['id_usuario'],
            $data_inserta['cantidad'],
            $data_inserta['id_unidad_medida']
        )){
            http_response_code(500);
            echo json_encode(['status'=> false,'message'=> 'No puedes envíar campos vacíos']);
            return;
        }
        try{
            $response = $ItemInserta->insertaItemInventario(
                $data_inserta['id_producto'],
                $data_inserta['id_usuario'],
                $data_inserta['cantidad'],
                $data_inserta['id_unidad_medida']);
            if($response){
                http_response_code(200);
                echo json_encode(['status'=> true,'message'=> 'Se ha agregado el item con exito.']);
            } else {
                http_response_code(500);
                echo json_encode(['status'=> false,'message'=> 'No se ha podido agregar el item']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['status'=> false,'message'=> $e->getMessage()]);
        }
    }
}