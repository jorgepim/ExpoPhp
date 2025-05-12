<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>Login</title>
</head>

<body>

  <div class="container">

    <div class="container-form">

      <form class="sign-in" action="/actions/UserActions.php?action=login" method="post">

        <h2>Iniciar Sesión</h2>
        <span>Use su correo y contraseña</span>
        <div class="container-input">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="container-input">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <a href="#">¿Olvidaste tu contraseña?</a>

        <button class="button" type="submit">INICIAR SESIÓN</button>

      </form>

    </div>

    <div class="container-form">

      <form class="sign-up" action="/actions/UserActions.php?action=register" method="post">

        <h2>Registrarse</h2>
        <span>Use su correo electrónico para registrarse</span>
        <div class="container-input">
          <ion-icon name="person-outline"></ion-icon>
          <input type="text" name="username" placeholder="Nombre de usuario" required>
        </div>

        <div class="container-input">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="container-input">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <button class="button" type="submit">REGISTRARSE</button>

      </form>

    </div>

    <div class="container-welcome">

      <div class="welcome-sign-up welcome">
        <h3>¡Bienvenido!</h3>
        <p>Ingrese sus datos personales para usar todas las funciones del sitio</p>
        <button class="button" id="btn-sign-up">Registrarse</button>
      </div>

      <div class="welcome-sign-in welcome">
        <h3>¡Hola!</h3>
        <p>Regístrese con sus datos personales para usar todas las funciones del sitio</p>
        <button class="button" id="btn-sign-in">Iniciar Sesión</button>
      </div>

    </div>

  </div>

  <script src="assets/js/login.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>


</html>