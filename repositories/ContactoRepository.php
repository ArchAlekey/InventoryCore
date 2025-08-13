<?php
    require_once __DIR__ ."/../config/databaseconn.php";

    class ContactoRepository{
        private $conn;

        public function __construct(){
            $db = new Database();
            $this -> conn = $db -> conectar();
        }

        public function insertaContacto($nombre_contacto, $correo, $mensaje){
            $spd = "CALL PD_NUEVO_CONTACTO(:nombre_contacto, :correo, :mensaje)";
            $stmt = $this->conn->prepare($spd);

            $stmt->bindValue(":nombre_contacto", $nombre_contacto);
            $stmt->bindValue(":correo", $correo);
            $stmt->bindValue(":mensaje", $mensaje);

            return $stmt->execute();
        }
    }