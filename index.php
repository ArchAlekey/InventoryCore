<?php

    // CORS para permitir solicitudes desde cualquier origen
    header("Access-Control-Allow-Origin: *");

    // Métodos permitidos
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

    // Headers permitidos
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    // En caso de petición OPTIONS (preflight), respondemos sin más
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        http_response_code(200);
        exit;
    }

    require_once __DIR__ ."/config/databaseconn.php";
    require_once __DIR__ ."/routes/routes.php";

    
