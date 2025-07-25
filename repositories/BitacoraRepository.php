<?php
    require_once __DIR__ ."/../config/databaseconn.php";

    class BitacoraRepository{
        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->conectar();
        }

        /* Actualización de Inventario y de Bitacora - POST */
        public function actualizaBitacora($id_item_inventario, $cantidad, $tipo_modificacion, $id_usuario){
            $spd = "CALL PD_ACTUALIZA_INVENTARIO(:id_item_inventario, :cantidad, :tipo_modificacion, :id_usuario)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(':id_item_inventario', $id_item_inventario);
            $stmt->bindValue(':cantidad', $cantidad);
            $stmt->bindValue(':tipo_modificacion', $tipo_modificacion);
            $stmt->bindValue(':id_usuario', $id_usuario);

            return $stmt->execute();
        }
        /* Consulta de registros de la bitacora - GET*/
        public function consultaBitacora($id_item_inventario, $tipo_modificacion){
            $spd = "CALL PD_CONSULTA_BITACORA(:id_item_inventario, :tipo_modificacion)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":id_item_inventario", $id_item_inventario);
            $stmt->bindValue(":tipo_modificacion", $tipo_modificacion);
            $stmt->execute();

            $resultadoConsultaBitacora = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultadoConsultaBitacora;
        }
    }