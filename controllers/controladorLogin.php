<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaLogin.php';

$modeloUsuario = new modeloUsuario();
$query = $modeloUsuario->obtenerUsuarios();
$usuario = $query[0];
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo "<br>";
    //echo "SE EMBIARON LAS SIGUIENTES VARIABLES: ";
    //echo "<br>";
    //echo $_POST["txtusername"];
    //echo "<br>";
    //echo $_POST["txtpassword"];
    //echo "<br>";
    $v_username = "";
    $v_password = "";

    if (isset($_POST["txtusername"])) {
        $v_username = $_POST["txtusername"];
    }

    if (isset($_POST["txtpassword"])) {
        $v_password = $_POST["txtpassword"];
    }

    if (($v_username == $usuario["username"] && $v_password == $usuario["password"])) {
        $_SESSION["txtusername"] = $v_username;
        $_SESSION["txtpassword"] = $v_password;
        //header("location: dashboard.php");
        // sleep(120);
        $_SESSION['loading'] = true;
        header('Location: ' . get_controllers('controladorDashboard.php'));
        //echo "dashboard";
    } else {
        //header("Location: claveequivocada.php");
        // header('Location: ' . get_views('claveequivocada.php'));
        $error = "credenciales incorrectas";
    }
}
vistaLogin($error = '');
