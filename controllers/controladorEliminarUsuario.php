<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaEliminarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}


$modeloUsuario = new modeloUsuario();
$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datusuario = $_POST["datusuario"];

    try {
        $modeloUsuario->eliminarUsuario($datusuario);
        $mensaje = "<span style='color: green;'>Usuario eliminado con exito" . "</span>";
    } catch (PDOException $e) {
        $mensaje = "Hubo un error  ...<br>" . $e->getMessage();
    }
}

mostrarFormularioEliminacion($mensaje);
