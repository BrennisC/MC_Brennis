<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

$tmpdatusername = $tmpdatpassword = $tmpdatperfil = "";
$message = ""; // Variable para el mensaje

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos no estén vacíos
    $tmpdatusername = trim($_POST["dbusername"] ?? '');
    $tmpdatpassword = trim($_POST["dbpassword"] ?? '');
    $tmpdatperfil = trim($_POST["dbperfil"] ?? '');

    if (!empty($tmpdatusername) && !empty($tmpdatpassword) && !empty($tmpdatperfil)) {
        try {
            $conexion = new Conexion();
            $pdo = $conexion->connection();

            $query = $pdo->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)");
            $sentencia = $query->execute([$tmpdatusername, $tmpdatpassword, $tmpdatperfil]);

            if ($sentencia) {
                $message = "<p style='color: green;'>Usuario registrado exitosamente.</p>";
                $tmpdatusername = $tmpdatpassword = $tmpdatperfil = "";
            } else {
                $message = "<p style='color: red;'>Error al registrar el usuario.</p>";
            }
        } catch (Exception $e) {
            $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        }
    } else {
        $message = "<p style='color: red;'>Todos los campos son obligatorios.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href=<?php echo get_css('ingresar.css') ?>>
</head>

<body>
    <div class="container">
        <h1><i class="fas fa-user-plus"></i> Registrar Usuario</h1>

        <!-- Mostrar mensaje de confirmación o error -->
        <?= $message ?>

        <form action="" method="POST">
            <label for="dbusername"><i class="fas fa-user"></i> Usuario:</label>
            <input type="text" name="dbusername" id="dbusername" value="<?= $tmpdatusername ?>" required>

            <label for="dbpassword"><i class="fas fa-key"></i> Password:</label>
            <input type="password" name="dbpassword" id="dbpassword" value="<?= $tmpdatpassword ?>" required>

            <label for="dbperfil"><i class="fas fa-id-badge"></i> Perfil:</label>
            <input type="text" name="dbperfil" id="dbperfil" value="<?= $tmpdatperfil ?>" required>

            <button type="submit"><i class="fas fa-save"></i> Registrar Usuario</button>
        </form>
    </div>
</body>

</html>