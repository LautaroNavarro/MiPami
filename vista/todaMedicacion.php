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
  $medicacion = $paciente->getMedicacion();
    $nombrePaciente = $paciente->getPrimerNombre();
    echo "<h5>$nombrePaciente</h5> ";
    if (count($medicacion) == 0) {
      echo "<p>Sin medicacion </p>";
    }else{
  foreach ($medicacion as $medicamento) {
  echo "<h6>Medicamento $count</h6>";
  echo "<p>Nombre comercial: " . $medicamento->getNombreComercial() . "</p>";
  echo "Nombre generico: ". $medicamento->getNombreGenerico(). "</p>";
  echo "Miligramos por unidad: ". $medicamento->getMiligramosXU(). "</p>";
  echo "Unidades: ". $medicamento->getCantidad(). "</p>";
  echo "Codigo: ". $medicamento->getCodigo(). "</p><hr><br>";
  $count++;}
}
}


         ?>

    </main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>

</html>