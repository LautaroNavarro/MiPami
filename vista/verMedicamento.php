<?php 
require('../controlador/controladorMedico.php');

session_start();
if (isset($_SESSION["id"])) {
  $usuario = Medico::obtenerMedico($_SESSION["id"]);
}else{
  header("location:login/index.php");
}
if (empty($_REQUEST["idPaciente"])) {
	header("location:listarpacientes.php");
}else{
	$idPaciente = $_REQUEST["idPaciente"];
	$paciente = Paciente::getPaciente($idPaciente);
}

$pacientes = $usuario->getPacientes();
$contiene = false;
$pacienteDos = Paciente::getPaciente($idPaciente);

  if ($pacienteDos->getIdMedico() == $usuario->getId()) {
    $contiene = true;
  }

if ($contiene == false) {
  header("location:listarpacientes.php");
}
 ?>

<html lang="en">
<head>
  <title>Ver medicamentos</title>
  <?php 
  require('partes/head.php');
  ?>
</head>

<?php 
require('partes/nav.php');
 ?>

<main role="main" class="container">
<?php 
$nombre = $paciente->getPrimerNombre();
$apellido = $paciente->getApellido();
echo "<h1> Medicacion de $nombre $apellido</h1><hr>";
$medicacion = $paciente->getMedicacion();
$mediacionCount = count($medicacion);
if ($mediacionCount == 0) {
  echo "<p>Upps parece que $nombre no tiene medicamentos!</p>";
  echo "<p>¿Desea <a href='listarpacientes.php'>volver a la lista</a>?</p>";
}else{
$count = 1;
foreach ($medicacion as $medicamento) {
  echo "<h6>Medicamento $count</h6>";
  echo "<p>Nombre comercial: " . $medicamento->getNombreComercial() . "</p>";
  echo "Nombre generico: ". $medicamento->getNombreGenerico(). "</p>";
  echo "Miligramos por unidad: ". $medicamento->getMiligramosXU(). "</p>";
  echo "Unidades: ". $medicamento->getCantidad(). "</p>";
  echo "Codigo: ". $medicamento->getCodigo(). "</p><hr><br>";
  $count++;
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