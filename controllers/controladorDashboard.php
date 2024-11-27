<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php ';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaDashboard.php';
// agregar la sesion 
// if (!isset($_SESSION['txtusername'])) {
//     header("Location: " . get_UrlBase('login.php'));
// }

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}
vistaDashboard();
// $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// // Guardar la página actual en la sesión
// $_SESSION['current_page'] = $page;
