<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php ';

?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    $_SESSION['favcolor'] = "green";
    $_SESSION['favanimal'] = "cat";


    echo $_SERVER['DOCUMENT_ROOT'];

    // echo get_UrlBase_view('inicio.php');
    // echo '<br>';
    // echo 'la variables han sido almacenadas';
    // echo '<br>';


    // $conexion = new Conexion();
    // $pdo = $conexion->connection();
    // $query = $pdo->query("SELECT id, username , password, perfil FROM usuarios");

    // while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    //     echo "ID: " . $row['id'] . " - Usuario: " . $row['username'] . "<br>";
    // }


    // $query = $pdo->query("SELECT id, username FROM usuarios WHERE id = 1");
    // $usuario = $query->fetch(PDO::FETCH_ASSOC);

    // print_r($usuario['id']);
    // print_r($usuario['username']);
    // 
    ?>

    <a href="./vervariables.php">ir a ver la variables</a>
</body>

</html>