<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php ';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';
// agregar la sesion 
// if (!isset($_SESSION['txtusername'])) {
//     header("Location: " . get_UrlBase('login.php'));
// }

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Guardar la página actual en la sesión
$_SESSION['current_page'] = $page;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href=<?php echo get_css('estilodashboard.css') ?>>
</head>

<body>


    <div class="menu">
        <ul>
            <li> <a href="?opcion=inicio"><i class="fas fa-home"></i> Inicio </a> </li>
            <li> <a href="?opcion=ver"><i class="fas fa-eye"></i> Ver </a></li>
            <li> <a href="?opcion=ingresar"><i class="fas fa-plus-circle"></i> Ingresar </a></li>
            <li> <a href="?opcion=modificar"><i class="fas fa-edit"></i> Modificar </a></li>
            <li> <a href="?opcion=eliminar"><i class="fas fa-trash-alt"></i> Eliminar </a></li>
            <li> <a href=<?php echo get_controller('logout.php') ?>><i class="fas fa-sign-out-alt"></i> Salir de Sistema </a></li>

        </ul>
    </div>

    <div class="contenido">
        <!-- <h1>Bienvenido al Dashboard</h1> -->
        <?php
        if (isset($_GET["opcion"])) {
            $opcion = $_GET["opcion"];
            // echo '<p>Has seleccionado: ' . htmlspecialchars($opcion) . '</p>';
        } else {
            echo '<h1>Bienvenido al Dashboard</h1>';
            $opcion = 'inicio';
        }

        switch ($opcion) {
            case 'inicio':
                include(get_views('inicio.php'));
                break;
            case 'ver':
                include(get_views('ver.php'));
                break;
            case 'ingresar':
                include(get_views('ingresar.php'));
                break;
            case 'modificar':
                include(get_views('modificar.php'));
                break;
            case 'eliminar':
                include(get_views('eliminar.php'));
                break;
            default:
                echo '<p>No has seleccionado ninguna opci&oacute;n</p>';
        }
        ?>
    </div>
    <script src=<?php echo get_js('dashboard.js') ?>></script>
</body>


</html>