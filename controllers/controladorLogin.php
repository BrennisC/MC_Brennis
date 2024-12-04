<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaLogin.php';

$modeloUsuario = new modeloUsuario();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $v_username = isset($_POST['txtusername']) ? $_POST['txtusername'] : '';
    $v_password = isset($_POST['txtpassword']) ? $_POST['txtpassword'] : '';

    if (!empty($v_username) && !empty($v_password)) {
        $usuarios = $modeloUsuario->obtenerUsuarios();

        $credencialesCorrectas = false;

        foreach ($usuarios as $usuario) {
            if (
                $v_username === $usuario['username'] &&
                $v_password === $usuario['password']
            ) {
                $credencialesCorrectas = true;
                break;
            }
        }

        if ($credencialesCorrectas) {
            $_SESSION["txtusername"] = $v_username;
            $_SESSION["txtpassword"] = $v_password;

            header('Location: ' . get_controllers('controladorDashboard.php'));
            exit();
        } else {
            $error = "Credenciales incorrectas";
            echo "Error de login: " . $error;
        }
    } else {
        $error = "Debe ingresar usuario y contraseña";
        echo "Error: " . $error;
    }
}

vistaLogin($error);
