<?php
session_start();
session_destroy();
header("Location: http://localhost/examen_medio_curso/index.php");
exit();
