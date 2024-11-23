<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaModificarUsuario.php';
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$modeloUsuario = new modeloUsuario();
if (isset($_POST['search_user'])) {
    $username = $_POST['search_username'];
    $usuario = $modeloUsuario->obtenerUsuarioPorNombre($username);
    mostrarFormularioModificacion($usuario);
} else {
    buscarUsuario();
}
