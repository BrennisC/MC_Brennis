<?php
// Ensure session is started and configuration is loaded
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

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

$opcion = filter_input(INPUT_GET, 'opcion');
$opcion = $opcion ?: 'inicio'; // Fallback to 'inicio' if null

error_log('Current opcion: ' . $opcion);

// Determine the content
try {
    if (isset($allowedRoutes[$opcion])) {
        ob_start();
        $controllerPath = get_controllers_dist($allowedRoutes[$opcion]);

        if (!file_exists($controllerPath)) {
            throw new Exception("Controller file not found: " . $controllerPath);
        }

        include $controllerPath;
        $contenido = ob_get_clean();
    } else {
        http_response_code(404);
        $contenido = '<h1>Página no encontrada</h1>';
        error_log('Invalid route: ' . $opcion);
    }
} catch (Exception $e) {
    error_log('Error processing route: ' . $e->getMessage());
    error_log('Trace: ' . $e->getTraceAsString());

    http_response_code(500);
    $contenido = '<h1>Error interno del servidor</h1>';
}

include get_views_dist('vistaDashboard.php');
