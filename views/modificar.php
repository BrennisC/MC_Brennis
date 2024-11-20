<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$conexion = new Conexion();
$pdo = $conexion->connection();

$message = "";
$userData = ["id" => "", "username" => "", "password" => "", "perfil" => ""];

if (isset($_POST["search_user"])) {
    $query = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = ?");
    $query->execute([$_POST["search_username"]]);
    $userData = $query->fetch(PDO::FETCH_ASSOC) ?: ["id" => "", "username" => "", "password" => "", "perfil" => ""];
    $message = $userData["id"] ? "" : "<p style='color: red;'>Usuario no encontrado.</p>";
}

if (isset($_POST["update_user"])) {
    $query = $pdo->prepare("UPDATE usuarios SET username = ?, password = ?, perfil = ? WHERE id = ?");
    $updated = $query->execute([$_POST["new_username"], $_POST["new_password"], $_POST["new_perfil"], $_POST["user_id"]]);
    $message = $updated ? "<p style='color: green;'>Usuario actualizado.</p>" : "<p style='color: red;'>Error al actualizar.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href=<?php echo get_css('modificar.css') ?>>
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-user-edit"></i> Modificar Usuario</h1>
        <div class="message"><?= $message ?></div>

        <?php if (empty($userData["id"])): ?>
            <!-- Formulario de búsqueda -->
            <form action="" method="POST">
                <input type="text" name="search_username" id="search_username" placeholder="Nombre de usuario" required>
                <button type="submit" name="search_user"><i class="fas fa-search"></i> Buscar</button>
            </form>
        <?php endif; ?>

        <?php if (!empty($userData["id"])): ?>
            <!-- Formulario de modificación -->
            <form action="" method="POST">
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