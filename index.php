<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href="./css/login.css" />
</head>

<body>

  <?php

  session_start();

  $error = '';
  if (isset($_SESSION['txtusername'])) {
    header("Location: http://127.0.0.1/examen_medio_curso/vistas/dashboard.php");
    exit();
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
      $username = $_POST['txtusername'];
      $password = $_POST['txtpassword'];
    }
    if ($username == 'admin' && $password == '1234') {
      header("Location: http://127.0.0.1/examen_medio_curso/vistas/dashboard.php");
      exit();
    } else {
      $error = 'credenciales incorrectas';
    }
  }

  ?>

  <div class="content">
    <div class="title-container">
      <h2>Remember Me</h2>
      <p>Username & Password</p>

      <form action="" method="POST">
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
        <a href="./vistas/registar.php">Register Me</a>
      </span>
    </div>
  </div>
</body>

</html>