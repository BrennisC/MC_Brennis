<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Error 404 - Página no encontrada</title>
  <link rel="stylesheet" href=<?php echo get_css('/404.css') ?> />
</head>

<body>
  <div class="container">
    <div class="error-code">404</div>
    <div class="error-message">Página no encontrada</div>
    <div class="error-description">
      Lo sentimos, la página que buscas no existe o ha sido movida.
    </div>
    <a href="/" class="back-button">Volver al inicio</a>
  </div>
</body>

</html>