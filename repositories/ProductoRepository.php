<?php

    require_once __DIR__ ."/../config/databaseconn.php";
    class ProductoRepository{

        private $conn;

        public function __construct(){
            $db = new Database();
            $this->conn = $db->conectar();
        }
        public function insertaProducto($id_entidad, $producto, $clave_producto){
            $spd = "CALL PD_INSERTA_PRODUCTO(:id_entidad, :producto, :clave_producto)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":id_entidad", $id_entidad);
            $stmt->bindValue(":producto", $producto);
            $stmt->bindValue(":clave_producto", $clave_producto);
            
            return $stmt->execute();
        }

        public function consultaProducto($producto, $clave_producto, $id_entidad, $nombre_entidad){
            $spd = "CALL PD_CONSULTA_PRODUCTOS(:producto, :clave_producto, :id_entidad, :nombre_entidad)";
            $stmt =  $this->conn->prepare( $spd);

            $stmt->bindValue(":producto", $producto);
            $stmt->bindValue(":clave_producto", $clave_producto);
            $stmt->bindValue(":id_entidad", $id_entidad);
            $stmt->bindValue(":nombre_entidad", $nombre_entidad);
            $stmt->execute();
            
            $respuestaConsultaProductos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $respuestaConsultaProductos;
        }

        public function actualizaProducto($id_producto, $id_entidad, $producto, $clave_producto){
            $spd = "CALL PD_ACTUALIZA_PRODUCTO(:id_producto, :id_entidad, :producto, :clave_producto)";
            $stmt = $this->conn->prepare( $spd );

            $stmt->bindValue(":id_producto", $id_producto);
            $stmt->bindValue(":id_entidad", $id_entidad);
            $stmt->bindValue(":producto", $producto);
            $stmt->bindValue(":clave_producto", $clave_producto);

            return $stmt->execute();
        }
    }