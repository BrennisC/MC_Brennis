<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaIngresarUsuario.php';

// Verificar sesión
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$message = ''; // Inicializa el mensaje

// Procesar el formulario solo si es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusername = $_POST["datusername"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];
    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->agregarUsuario($tmpdatusername, $tmpdatpassword, $tmpdatperfil);
        $message = "<p style='color: green;'>Usuario registrado exitosamente.</p>";
    } catch (PDOException $e) {
        $message = "<p style='color: red;'>Hubo un error: " . $e->getMessage() . "</p>";
    }
}

// Mostrar el formulario con el mensaje
mostrarFormularioIngreso($message);
