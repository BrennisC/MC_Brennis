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
$datusuario = "";

// Procesar el formulario al enviarse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datusuario = trim($_POST["datusuario"] ?? '');

    if (empty($datusuario)) {
        $message = "<p style='color: red;'>El campo de usuario no puede estar vacío.</p>";
    } else {
        try {
            // Eliminar el usuario por nombre de usuario
            $query = $pdo->prepare("DELETE FROM usuarios WHERE username = ?");
            $sentencia = $query->execute([$datusuario]);

            if ($sentencia && $query->rowCount() > 0) {
                $message = "<p style='color: green;'>El usuario '$datusuario' fue eliminado exitosamente.</p>";
                $datusuario = ''; // Vaciar el input después de la eliminación
            } else {
                $message = "<p style='color: red;'>No se encontró un usuario con el nombre '$datusuario'.</p>";
            }
        } catch (Exception $e) {
            $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
        }
    }
}
?>
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

        <?php if (!empty($message)) : ?>
            <div class="message <?= strpos($message, 'exitosamente') !== false ? 'success' : 'error' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="input-container">
                <i class="fas fa-user"></i>
                <input type="text" name="datusuario" id="datusuario" value="<?= htmlspecialchars($datusuario) ?>" placeholder="Nombre de usuario" required>
            </div>
            <button type="submit"><i class="fas fa-trash"></i> Eliminar</button>
        </form>
    </div>
</body>

</html>