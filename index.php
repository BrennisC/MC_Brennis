<?php
// conexion de la base de datos
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
header("location:" . get_controllers('controladorLogin.php'));
