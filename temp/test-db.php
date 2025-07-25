<?php

require_once __DIR__ . '/../config/databaseconn.php';

$db = new Database();

$conexion = $db->conectar();

if ($conexion) {
    echo json_encode(["mensaje" => "Conexión exitosa"]);
} else {
    echo json_encode(["error" => "Conexión fallida"]);
}