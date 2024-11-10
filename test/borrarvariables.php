<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<body>

    <?php
    session_unset();
    session_destroy();

    ?>

    se borraron todas las variables de la sesion
    <br>
    <a href="./test.php">regresar</a>
    <br>
    <a href="./vervariables.php">ver variables</a>
</body>