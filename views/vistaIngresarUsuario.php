<?php
function mostrarFormularioIngreso($mensaje)
{

    if (empty($mensaje)) {

?>

        <form action="/controllers/controladorIngresarUsuario.php" method="POST">
            <label for="datusername"><i class="fas fa-user"></i> Usuario:</label>
            <input type="text" name="dbusername" id="datusername" required>

            <label for="datpassword"><i class="fas fa-key"></i> Password:</label>
            <input type="password" name="dbpassword" id="datpassword" required>

            <label for="datperfil"><i class="fas fa-id-badge"></i> Perfil:</label>
            <input type="text" name="dbperfil" id="datperfil" required>

            <button type="submit"><i class="fas fa-save"></i> Registrar Usuario</button>
        </form>
<?php
    } else {
        echo $mensaje;
    }
}
?>