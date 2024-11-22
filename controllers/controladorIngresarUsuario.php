<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . 'views/vistaIngresarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}
$tmpdatusername = $tmpdatpassword = $tmpdatperfil = "";
$message = ""; // Variable para el mensaje

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos no estén vacíos
    $tmpdatusername = trim($_POST["datusername"] ?? '');
    $tmpdatpassword = trim($_POST["datpassword"] ?? '');
    $tmpdatperfil = trim($_POST["datperfil"] ?? '');
    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->agregarUsuario($tmpdatusername, $tmpdatpassword, $tmpdatperfil);
        $mensaje = "Usuario registrado con existo ";
    } catch (PDOException $e) {

        $mensaje = "Hubo un error  ...<br>" . $e->getMessage();
    }
}

mostrarUsuarios($mensaje);
