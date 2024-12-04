<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
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
        <span class="username">
            <h1>
                <i class="fas fa-user"></i> <?= $_SESSION["txtusername"]; ?>
            </h1>
            <hr>
        </span>

        </h1>
        <ul>
            <li> <a href="/inicio"><i class="fas fa-home"></i> Inicio </a> </li>
            <li> <a href="/ver"><i class="fas fa-eye"></i> Ver </a></li>
            <li> <a href="/ingresar"><i class="fas fa-plus-circle"></i> Ingresar </a></li>
            <li> <a href="/modificar"><i class="fas fa-edit"></i> Modificar </a></li>
            <li> <a href="/eliminar"><i class="fas fa-trash-alt"></i> Eliminar </a></li>
            <li> <a href=<?php echo get_controllers('logout.php') ?>><i class="fas fa-sign-out-alt"></i> Salir de Sistema </a></li>
        </ul>
    </div>
    <div class="contenido">
        <?php
        if (isset($contenido)) {
            echo $contenido;
        }
        ?>
    </div>


    <script src=<?php echo get_js('dashboard.js') ?>></script>
</body>