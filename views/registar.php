<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <link rel="stylesheet" href="../css/register.css" />
</head>

<body>
  <div class="container">
    <div class="register">
      <h2>Create Account</h2>
      <p>Fill in the details to register</p>

      <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Choose a username" />

        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter your email" />

        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          placeholder="Choose a password" />

        <label for="confirm-password">Confirm Password</label>
        <input
          type="password"
          id="confirm-password"
          placeholder="Confirm your password" />

        <button type="submit" id="registar-btn">Register</button>
      </form>

      <div class="links">
        <p>Already have an account? <a href="../index.php">Login</a></p>
      </div>
    </div>
  </div>
</body>

</html>