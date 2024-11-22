<?php
// conexion de la base de datos
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href=<?php echo get_css('/login.css') ?> />

</head>

<body>

  <?php

  // para mantener las sesiones
  session_start();
  // conexion de la base de dat
  // estableciendo la conexion a mi usuario ADMIN
  $conexion = new Conexion();
  $pdo = $conexion->connection();
  $query = $pdo->query("SELECT id, username, password FROM usuarios WHERE id = 25");
  $usuario = $query->fetch(PDO::FETCH_ASSOC);


  print_r($usuario);
  $error = '';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo "<br>";
    //echo "SE EMBIARON LAS SIGUIENTES VARIABLES: ";
    //echo "<br>";
    //echo $_POST["txtusername"];
    //echo "<br>";
    //echo $_POST["txtpassword"];
    //echo "<br>";
    $v_username = "";
    $v_password = "";

    if (isset($_POST["txtusername"])) {
      $v_username = $_POST["txtusername"];
    }

    if (isset($_POST["txtpassword"])) {
      $v_password = $_POST["txtpassword"];
    }

    if (($v_username == $usuario["username"] && $v_password == $usuario["password"])) {
      $_SESSION["txtusername"] = $v_username;
      $_SESSION["txtpassword"] = $v_password;
      //header("location: dashboard.php");
      // sleep(120);
      $_SESSION['loading'] = true;
      header('Location: ' . get_views('dashboard.php'));
      //echo "dashboard";
    } else {
      //header("Location: claveequivocada.php");
      // header('Location: ' . get_views('claveequivocada.php'));
      $error = "credenciales incorrectas";
    }
  }
  ?>
  <div id="loader" class="loader-overlay">
    <div class="loader"></div>
  </div>

  <div class="content">
    <div class="title-container">
      <h2>Remember Me</h2>
      <p>Username & Password</p>

      <form action="" method="post">
        <label for="username">Username</label>
        <input
          type="text"
          id="txtusername"
          name="txtusername"
          placeholder="Enter your username" />

        <label for="password">Password</label>
        <input
          type="password"
          id="txtpassword"
          name="txtpassword"
          placeholder="Enter your password" />
        <!-- </div> -->

        <!-- <div class="options">
            <label>
              <input type="checkbox" id="remember" />
              Remember Me
            </label>
            <a href="#">Forgot Password?</a>
          </div> -->

        <?php if (isset($error)) : ?>
          <span class="error">
            <?php
            echo $error;
            unset($_SESSION['error']); // elimina el error de la sesión después de mostrarlo
            ?>
          </span>
        <?php endif; ?>

        <input type="submit" class="btn" value="Login" />
      </form>


      <span class="links">
        <a href=<?php echo get_views('registar.php') ?>>Register Me</a>
      </span>
    </div>
  </div>
  <script src="./js/aminacion.js"></script>
</body>

</html>