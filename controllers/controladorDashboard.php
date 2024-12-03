<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';

// Verificar si la sesión está activa
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$opcion = $_GET["opcion"] ?? "inicio"; // Por defecto, la página inicial

switch ($opcion) {
    case 'inicio':
        ob_start();
        include get_controllers_dist('controladorInicio.php');
        $contenido = ob_get_clean();
        break;
    case 'ver':
        ob_start();
        include get_controllers_dist('controladorUsuario.php');
        $contenido = ob_get_clean();
        break;
    case 'ingresar':
        ob_start();
        include get_controllers_dist('controladorIngresarUsuario.php');
        $contenido = ob_get_clean();
        break;
    case 'modificar':
        ob_start();
        include get_controllers_dist('controladorModificarUsuario.php');
        $contenido = ob_get_clean();
        break;
    case 'eliminar':
        ob_start();
        include get_controllers_dist('controladorEliminarUsuario.php');
        $contenido = ob_get_clean();
        break;
    default:
        http_response_code(400);
        $contenido = '<h1>Página no encontrada</h1>';
}

// Incluye la vista del dashboard después de haber asignado el contenid
include get_views_dist('vistaDashboard.php');
