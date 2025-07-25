<?php

    require_once __DIR__ ."/../repositories/InventatioRepository.php";

class ConsultaGeneralController{
    public function consultaGeneral(){

        $inventario = new InventatioRepository();

        try{
            $result = $inventario->getGeneral();

            header("Content-Type: application/json");
            http_response_code(200);
            echo json_encode([
                'status' => true,
                'data' => $result
            ]);
        }catch(Exception $e){
            http_response_code(500);
            echo json_encode([
                'ok'=> false,
                'error' => 'Error al recuperar los datos' .$e->getMessage()
            ]);
        }
    }
}