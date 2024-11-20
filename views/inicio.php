<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Simple</title>
    <link rel="stylesheet" href=<?php echo get_css('inicio.css') ?>>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <h1>Dashboard </h1>

        <!-- Sección de estadísticas -->
        <div class="stats">
            <div class="card">
                <h3>Usuarios</h3>
                <p id="users-count">1500</p>
            </div>
            <div class="card">
                <h3>Ventas</h3>
                <p id="sales-count">$4800</p>
            </div>
            <div class="card">
                <h3>Visitas</h3>
                <p id="visits-count">7800</p>
            </div>
        </div>

        <!-- Gráfico -->
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>

        <!-- Calendario -->
        <div class="calendar">
            <h3>Calendario</h3>
            <p id="current-date"></p>
        </div>
    </div>

    <script src="<?php echo get_js('inicio.js') ?>"></script>
</body>

</html>