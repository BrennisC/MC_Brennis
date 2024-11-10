<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <?php

    if (isset($_SESSION['favcolor'])) {

        echo $_SESSION['favcolor'] . "<br>";
        echo $_SESSION['favanimal'] . "<br>";
    } else {
        echo "no se han almacenado variables";
        echo "<br>";
    }
    ?>

    <a href="./borrarvariables.php">borrar variables</a>
    <a href="./test.php"> regresar</a>

</body>

</html>