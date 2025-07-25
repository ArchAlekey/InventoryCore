<?php

    require_once __DIR__ ."/../config/databaseconn.php";
    require_once __DIR__ ."/../models/TblInventarios.php";

    class InventatioRepository {
        private $conn;

        public function __construct() {
            $db =  new Database();
            $this->conn = $db->conectar();
        }

        //Consulta general SPD
        public function getGeneral(){
        $spd = "CALL PD_CONSULTA_GENERAL";
        $stmt = $this->conn->prepare($spd);
        $stmt->execute();

        $resultadoGeneral = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultadoGeneral;
        }
    }
