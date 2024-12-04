<?php
// Ensure session is started and configuration is loaded
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

// Check if user is logged in
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$allowedRoutes = [
    'inicio' => 'controladorInicio.php',
    'ver' => 'controladorUsuario.php',
    'ingresar' => 'controladorIngresarUsuario.php',
    'modificar' => 'controladorModificarUsuario.php',
    'eliminar' => 'controladorEliminarUsuario.php'
];

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathInfo = trim($requestUri, '/');

$routeMapping = [
    '' => 'inicio',
    'inicio' => 'inicio',
    'ver' => 'ver',
    'ingresar' => 'ingresar',
    'modificar' => 'modificar',
    'eliminar' => 'eliminar'
];

$opcion = $routeMapping[$pathInfo] ?? 'inicio';

try {
    if (isset($allowedRoutes[$opcion])) {
        ob_start();
        $controllerPath = get_controllers_dist($allowedRoutes[$opcion]);

        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            throw new Exception("Controlador no encontrado");
        }

        $contenido = ob_get_clean();
    } else {
        http_response_code(404);
        $contenido = '<h1>Página no encontrada</h1>';
    }
} catch (Exception $e) {
    http_response_code(500);
    $contenido = '<h1>Error interno del servidor</h1>';
    error_log($e->getMessage());
}

// Include the dashboard view
include get_views_dist('vistaDashboard.php');
