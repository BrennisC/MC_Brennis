<?php
session_start();
session_unset();
session_destroy();
header("Location: http://examen_medio_curso.test/");
exit();
