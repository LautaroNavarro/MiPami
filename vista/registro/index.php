<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/logo.png"> <!-- Icono superior -->

    <title>Registrarme - Mi Pami</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bs4/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../bs4/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="../validarRegistro.php">
      <img class="mb-4" src="../img/logo.png" alt="" width="200" height="200">
      <h1 class="h3 mb-3 font-weight-normal">Registrarme</h1>

      <input type="text" id="inputText" class="form-control" placeholder="Nombre" required="" autofocus="" name="nombre">

      <input type="text" id="inputText" class="form-control" placeholder="Apellido" required="" name="apellido">

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Correo" required="" name="email">

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="password">

      <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarme</button>
      <label>Ya tengo una cuenta </label> <a href="../login/index.php">iniciar sesion</a>
      <p class="mt-5 mb-3 text-muted">© 2018</p>
    </form>
  

</body></html>