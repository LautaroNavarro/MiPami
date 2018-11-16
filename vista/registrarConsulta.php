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
 ?>




<html lang="en">
<head>
  <title>Registrar consulta</title>
  <?php 
  require('partes/head.php');
  ?>
</head>

<?php 
require('partes/nav.php');
 ?>

<main role="main" class="container">
<form action="<?php echo"validarConsulta.php?id=$idPaciente"; ?>" method="POST"> 
<?php 
$nombre = $paciente->getPrimerNombre();
$apellido = $paciente->getApellido();
echo "<h1>Registrar consulta de $nombre $apellido</h1>";
 ?>
<br>
 <div class="form-group">
    <label for="fecha">Fecha </label>
    <input type="date" class="form-control" id="fecha" aria-describedby="emailHelp"  name="fecha" required>
  </div>

  <div class="form-group">
    <label for="consulta">Nota</label>
    <textarea class="form-control" id="consulta" rows="8" name="consulta"></textarea>
  </div>

<br>
  <button type="submit" class="btn btn-primary">Listo!</button>
 </form>
 <br>
</main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>
</html>