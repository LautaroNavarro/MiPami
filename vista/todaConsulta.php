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
  <title>Todos los medicamentos</title>
  <?php 
  require('partes/head.php');
  ?>
</head>
  <body>
<?php 
require('partes/nav.php');
 ?>
    <main role="main" class="container">

        <?php 

$pacientes = $usuario->getPacientes();
foreach ($pacientes as $paciente) {
  $count = 1;
  $consultas = $paciente->getConsultas();
    $nombrePaciente = $paciente->getPrimerNombre();
    echo "<h5>$nombrePaciente</h5> ";
    if (count($consultas) == 0) {
      echo "<p>Sin consultas </p>";
    }else{
      $contadorConsultas = count($consultas);
      if ($contadorConsultas == 0) {
        echo "<p>Sin consultas</p>";
      }else{
        $contadorConsultas = 1;
        foreach ($consultas as $consulta){

  echo "<h6>Consulta $contadorConsultas</h6>";
  echo "<p>Fecha: " . $consulta->getFechaConsulta() . "</p>";
  echo "Nota: ". $consulta->getConsultaCadena(). "</p><hr><br>";
  $contadorConsultas++;
        }
      }
}}


         ?>

    </main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>

</html>