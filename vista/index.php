<?php 
require('../controlador/controladorMedico.php');

session_start();
if (isset($_SESSION["id"])) {
$usuario = Medico::obtenerMedico($_SESSION["id"]);

}else{
  header("location:login/index.php");
}


 ?>



<html lang="en">
<head>
  <title>Mi Pami</title>
  <?php 
  require('partes/head.php');
  ?>
</head>
  <body>
<?php 
require('partes/nav.php');
 ?>
    <main role="main" class="container">

      <div class="starter-template">
        <?php  
        echo "<h1>".$usuario->getNombre().", bienvenido a Mi Pami </h1>";
        ?>
        <h2>Un sistema de gestion para medicos prestadores de Pami</h2>
        <p class="lead">Aquí encontraras las herramientas necesarias para poder gestionar a tus pacientes<br> Junto con opciones personalizadas para facilitarte problemas.</p>
      </div>

    <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="Anciano" data-slide-to="0" class="active"></li>
    <li data-target="Anciano" data-slide-to="1"></li>
    <li data-target="Anciano" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/fondo3.png" alt="Anciano">
    </div>
    <div class="carousel-item">
      <img src="img/fondo5.png" alt="Anciano">
    </div>
    <div class="carousel-item">
      <img src="img/fondo4.png" alt="Anciano">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
<br><br>
  
    </main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>

</html>