<?php
function vistaDashboard()
{ ?>
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
                <li> <a href="?opcion=inicio"><i class="fas fa-home"></i> Inicio </a> </li>
                <li> <a href="?opcion=ver"><i class="fas fa-eye"></i> Ver </a></li>
                <li> <a href="?opcion=ingresar"><i class="fas fa-plus-circle"></i> Ingresar </a></li>
                <li> <a href="?opcion=modificar"><i class="fas fa-edit"></i> Modificar </a></li>
                <li> <a href="?opcion=eliminar"><i class="fas fa-trash-alt"></i> Eliminar </a></li>
                <li> <a href=<?php echo get_controllers('logout.php') ?>><i class="fas fa-sign-out-alt"></i> Salir de Sistema </a></li>

            </ul>
        </div>

        <div class="contenido">
            <!-- <h1>Bienvenido al Dashboard</h1> -->
            <?php
            if (isset($_GET["opcion"])) {
                $opcion = $_GET["opcion"];
                // echo '<p>Has seleccionado: ' . htmlspecialchars($opcion) . '</p>';
            } else {
                $opcion = 'inicio';
            }

            switch ($opcion) {
                case 'inicio':
                    echo "<iframe src='" . get_views('inicio.php') . "' width='800' height='600'></iframe>";
                    break;
                case 'ver':
                    echo "<iframe src='" . get_controllers('controladorUsuario.php') . "' width='800' height='600'></iframe>";
                    break;
                case 'ingresar':
                    echo "<iframe src='" . get_controllers('controladorIngresarUsuario.php') . "' width='800' height='600'></iframe>";
                    break;
                case 'modificar':
                    echo "<iframe src='" . get_controllers('controladorModificarUsuario.php') . "' width='800' height='600'></iframe>";
                    break;
                case 'eliminar':
                    echo "<iframe src='" . get_controllers('controladorEliminarUsuario.php') . "' width='800' height='600'></iframe>";
                    break;
                default:
                    echo '<p>No has seleccionado ninguna opción</p>';
            }

            ?>
        </div>
        <script src=<?php echo get_js('dashboard.js') ?>></script>
    </body>
<?php

} ?>