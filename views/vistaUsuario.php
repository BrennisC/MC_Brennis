<?php
function mostrarUsuarios($usuarios)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ver</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href=<?php echo get_css('ver.css') ?>>
    </head>

    <body>

        <div class="content">
            <h1><i class="fas fa-users"></i> Lista de Usuarios</h1>
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-id-badge"></i> Id</th>
                        <th><i class="fas fa-user"></i> Username</th>
                        <th><i class="fas fa-key"></i> Password</th>
                        <th><i class="fas fa-user-tag"></i> Perfil</th>
                        <th><i class="fas fa-cogs"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody class="table">
                    <?php foreach ($usuarios as $row) : ?>
                        <tr>
                            <td class="icon"><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['perfil'] ?></td>
                            <td class="actions">
                                <a class="edit" href=<?php echo get_controller('controladorModificarUsuario.php?username=' . $row['username']) ?>> <i class="fas fa-edit"></i>Editar</a>
                                <a class="delete" href=<?php echo get_controller('controladorEliminarUsuario.php?username=' . $row['username']) ?>>
                                    <i class="fas fa-trash-alt"></i>
                                    Eliminar</a>
                            </td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </body>
<?php
}
?>