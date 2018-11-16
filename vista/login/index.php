<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/logo.png"> <!-- Icono superior -->

    <title>Inicio Sesion - Mi Pami</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bs4/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../bs4/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="../validarCode.php">
      <img class="mb-4" src="../img/logo.png" alt="" width="200" height="200">
      <img class="mb-4" src="../img/letras.png" alt="" width="100">
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Correo" required="" autofocus="" name="email">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="" name="password">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesion</button>
      <label>No tengo una cuenta </label> <a href="../registro/index.php">registrarme</a>
      <p class="mt-5 mb-3 text-muted">© 2018</p>
    </form>
  

</body></html>