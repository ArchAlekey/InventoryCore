<?php

    require_once __DIR__ ."/../config/databaseconn.php";
    require_once __DIR__ ."/../models/TblInventarios.php";
    require_once __DIR__ ."/../models/CatProductos.php";

    class InventatioRepository {

        private $conn;

        public function __construct() {
            $db =  new Database();
            $this->conn = $db->conectar();
        }

        //Consulta general SPD
        public function getGeneral($producto, $clave_producto, $id_unidad_medida, $nombre, $nombre_entidad, $habilitado){
            $spd = "CALL PD_CONSULTA_GENERAL_INVENTARIO(:producto, :clave_producto, :id_unidad_medida, :nombre, :nombre_entidad, :habilitado)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":producto", $producto);
            $stmt->bindValue(":clave_producto", $clave_producto);
            $stmt->bindValue(":id_unidad_medida", $id_unidad_medida);
            $stmt->bindValue(":nombre", $nombre);
            $stmt->bindValue(":nombre_entidad", $nombre_entidad);
            $stmt->bindValue(":habilitado", $habilitado);
            
            $stmt->execute();

            $resultadoGeneral = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $resultadoGeneral;
        }

        /* Inserta nuevo item en el inventario */
        public function insertaItemInventario($id_producto, $id_usuario, $cantidad, $id_unidad_medida){
            $spd = "CALL PD_INSERTA_ITEM_INVENTARIO(:id_producto, :id_usuario, :cantidad, :id_unidad_medida)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":id_producto", $id_producto);
            $stmt->bindValue(":id_usuario", $id_usuario);
            $stmt->bindValue(":cantidad", $cantidad);
            $stmt->bindValue(":id_unidad_medida", $id_unidad_medida);

            return $stmt->execute();
        }
    }
