<?php

function mostrarFormularioEliminacion($mensaje)
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar Usuario</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href=<?php echo get_css('eliminar.css') ?>>
    </head>

    <body>
        <div class="container">
            <h1><i class="fas fa-trash-alt"></i> Eliminar Usuario</h1>
            <div class="message">
                <?php echo $mensaje; ?>
            </div>
            <form action=<?php echo get_controllers('controladorEliminarUsuario.php') ?>" method="POST">
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" name="datusuario" id="datusuarioS" placeholder="Nombre de usuario" required>
                </div>
                <button type="submit"><i class="fas fa-trash"></i> Eliminar</button>
            </form>

        </div>
    </body>
<?php
}

?>