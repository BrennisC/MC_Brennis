<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    $_SESSION['favcolor'] = "green";
    $_SESSION['favanimal'] = "cat";

    echo 'la variables han sido almacenadas';
    echo '<br>';
    ?>

    <a href="./vervariables.php">ir a ver la variables</a>
</body>

</html>