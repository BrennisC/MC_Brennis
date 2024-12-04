<?php
function vistaLogin($error)
{ ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" href=<?php echo get_css('login.css') ?> />

    </head>

    <body>
        <div id="loader" class="loader-overlay">
            <div class="loader"></div>
        </div>

        <div class="content">
            <div class="title-container">
                <h2>Remember Me</h2>
                <p>Username & Password</p>

                <form action=<?php echo get_controllers('controladorLogin.php') ?> method="post">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="txtusername"
                        name="txtusername"
                        placeholder="Enter your username"
                        required />

                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="txtpassword"
                        name="txtpassword"
                        placeholder="Enter your password"
                        required />
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


            </div>
        </div>
        <script src=<?php echo get_js('aminacion.js') ?>></script>
    </body>

    </html>


<?php

}
?>