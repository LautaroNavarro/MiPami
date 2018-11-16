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
  <title>Registrar medicamento</title>
  <?php 
  require('partes/head.php');
  ?>
</head>

<?php 
require('partes/nav.php');
 ?>

<main role="main" class="container">
<form action="<?php echo"validarMedicacion.php?id=$idPaciente"; ?>" method="POST"> 
<?php 
$nombre = $paciente->getPrimerNombre();
$apellido = $paciente->getApellido();
echo "<h1>Registrar medicamento para $nombre $apellido</h1>";
 ?>
<br>
 <div class="form-group">
    <label for="nombreComercial">Nombre comercial</label>
    <input type="text" class="form-control" id="nombreComercial" aria-describedby="emailHelp" placeholder="Ibu400" name="nombreComercial" required>
  </div>
 <div class="form-group">
    <label for="nombreGenerico">Nombre generico</label>
    <input type="text" class="form-control" id="nombreGenerico" aria-describedby="emailHelp" placeholder="Ibuprofeno" name="nombreGenerico" required>
  </div>
   <div class="form-group">
    <label for="miligramosXU">Miligramos por unidad</label>
    <input type="text" class="form-control" id="miligramosXU" aria-describedby="emailHelp" placeholder="400 mg" name="miligramosXU" required>
  </div>
  <div class="form-group">
    <label for="cantidad">Unidades</label>
    <input type="number" class="form-control" id="cantidad" aria-describedby="emailHelp" placeholder="30" name="cantidad" required>
  </div>
  <div class="form-group">
    <label for="codigo">Codigo</label>
    <input type="text" class="form-control" id="codigo" aria-describedby="emailHelp" placeholder="34S5" name="codigo" required>
  </div>
<br>
  <button type="submit" class="btn btn-primary">Listo</button>
 </form>
 <br>
</main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>
</html>