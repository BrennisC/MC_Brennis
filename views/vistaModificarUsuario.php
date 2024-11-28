<?php
function mostrarFormularioModificacion($userData, $mensaje = '')
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vista Modificar</title>
        <link rel="stylesheet" href=<?php echo get_css('modificar.css') ?>>
    </head>

    <body>
        <div class="container">
            <h1><i class="fas fa-user-edit"></i> Modificar Usuario</h1>
            <div class="message"><?= $mensaje ?>
            </div>
            <?php if (!empty($userData["id"])): ?>
                <!-- Formulario de modificación -->
                <form action=<?php echo get_controllers('controladorModificarUsuario.php') ?> method="POST">
                    <input type="hidden" name="user_id" value="<?= $userData["id"] ?>">

                    <div class="form-icon">
                        <i class="fas fa-user"></i>
                        <label for="new_username">Nuevo Usuario:</label>
                    </div>
                    <input type="text" name="new_username" id="new_username" value="<?= $userData["username"] ?>" required>

                    <div class="form-icon">
                        <i class="fas fa-key"></i>
                        <label for="new_password">Nuevo Password:</label>
                    </div>
                    <input type="text" name="new_password" id="new_password" value="<?= $userData["password"] ?>" required>

                    <div class="form-icon">
                        <i class="fas fa-address-card"></i>
                        <label for="new_perfil">Nuevo Perfil:</label>
                    </div>
                    <input type="text" name="new_perfil" id="new_perfil" value="<?= $userData["perfil"] ?>" required>

                    <button type="submit" name="update_user"><i class="fas fa-save"></i> Actualizar</button>
                </form>
            <?php endif; ?>
        </div>
    </body>

    </html>

<?php
}
?>
<?php

function buscarUsuario($mensaje = '')
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vista Modificar</title>
        <link rel="stylesheet" href=<?php echo get_css('modificar.css') ?>>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body>

        <?php if (empty($userData["id"])) {  ?>
            <div class="container">
                <h1>
                    <i class="fas fa-search"></i> Buscar Usuario
                </h1>
                <?php if (!empty($mensaje)) : ?>
                    <div class="message">
                        <?php echo $mensaje; ?>
                    </div>
                <?php endif; ?>
                <form action=<?php echo get_controllers('controladorModificarUsuario.php') ?> method="POST">
                    <input type="text" name="search_username" id="search_username" placeholder="Nombre de usuario" required>
                    <button type="submit" name="search_user"><i class="fas fa-search"></i> Buscar</button>
                </form>
            </div>
        <?php
        } ?>
    </body>

    <!-- Formulario de búsqueda -->


<?php
}

?>