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
  <title>Ver consultas</title>
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
echo "<h1> Consultas de $nombre $apellido</h1><hr>";
$consultas = $paciente->getConsultas();
$count = count($consultas);
if ($count == 0) {
  echo "<p>Upps parece que $nombre no ha hecho consultas!</p>";
  echo "<p>¿Desea <a href='listarpacientes.php'>volver a la lista</a>?</p>";
}else{
for ($i=1; $i <= $count; $i++) { 
  $num = ($count - $i) + 1;
  echo "<h6>Consulta $num</h6>";
  echo "<p>Fecha: " . $consultas[($count - $i)]->getFechaConsulta() . "</p>";
  echo "Nota: ". $consultas[$count-$i]->getConsultaCadena(). "</p><hr><br>";
}}

?>
</main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>
</html>