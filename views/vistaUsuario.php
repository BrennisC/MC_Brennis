<?php
function mostrarUsuarios($usuarios)
{
?>

    <h2>Lista de usuarios del SISTEMA</h2>
    <br>
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>Perfil</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['username']; ?></td>
                <td><?php echo $usuario['password']; ?></td>
                <td><?php echo $usuario['perfil']; ?></td>
            </tr>
        <?php
        }

        ?>

    </table>
<?php
}
?>