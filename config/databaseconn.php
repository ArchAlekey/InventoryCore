<?php 

class Database{
    private $host = "localhost";
    private $db_name = "SistemaEVA";
    private $username = "root";
    private $password = "Hera010219";
    public $conn;

public function conectar() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo json_encode([
                "error" => "Error al conectar a la base de datos: " . $e->getMessage()
            ]);
            exit;
        }

        return $this->conn;
    }
}