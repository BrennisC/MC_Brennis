<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
session_start(); // Inicia la sesión

// Elimina todas las variables de sesión
session_unset();
// Destruye la sesión
session_destroy();

header("Location: " . get_UrlBase('index.php'));
