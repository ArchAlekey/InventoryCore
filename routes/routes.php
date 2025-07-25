<?php

    require_once __DIR__ ."/../controllers/ConsultaGeneralController.php";
    require_once __DIR__ ."/../controllers/BitacoraController.php";
    require_once __DIR__ ."/../controllers/UsuarioController.php";

    $URI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    /* Consulta una lista donde están todos los inventarios */
    if($URI === '/inventario/general' && $_SERVER['REQUEST_METHOD'] === 'GET'){
        $controller = new ConsultaGeneralController();
        $controller->consultaGeneral();
        exit;
    }
    if($URI === '/invetario/bitacora' && $_SERVER['REQUEST_METHOD'] === 'GET'){
        $controllerBitacora = new BitacoraController();
        $controllerBitacora->pullBitacora();
        exit;
    }
    /* Modificaión de los inventarios y registro de la bitacora de dichos eventos */
    if($URI === '/productos' && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $controllerBitacora = new BitacoraController();
        $controllerBitacora->modBitacora();
        exit;
    }

    /* Consulta de usuarios */
    if($URI === '/usuarios/consulta' && $_SERVER['REQUEST_METHOD'] === 'GET'){
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->ConsultaUsuarios();
        exit;
    }

    /* Inserta un nuevo usuario */
    if($URI === '/usuarios/inserta' && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->InsertarUsuario();
        exit;
    }

    /* Actualiza los datos del usuario */
    if($URI === '/usuarios/actualiza' && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->ActualizaUsuario();
        exit;
    }

    /* Inhabilita al usuario */
    if($URI === '/usuarios/inhabilita' && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->InhabilitaUsuario();
        exit;
    }

    /* Habilita al usuario */
    if($URI === '/usuarios/habilita' && $_SERVER['REQUEST_METHOD'] === 'POST'){
        $controllerUsuario = new UsuarioController();
        $controllerUsuario->HabilitaUsuario();
        exit;
    }

    // Puedes agregar más rutas abajo
    http_response_code(404);
    echo json_encode(['error' => 'Ruta no encontrada']);

