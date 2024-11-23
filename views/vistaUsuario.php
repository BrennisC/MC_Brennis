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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $row) : ?>
                        <tr>
                            <td class="icon"><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['perfil'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </body>
<?php
}
?>