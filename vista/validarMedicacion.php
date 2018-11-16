


<?php 
require('../controlador/controladorMedicamento.php');

session_start();
if (isset($_SESSION["id"])) {
  $usuario = Medico::obtenerMedico($_SESSION["id"]);
}else{
  header("location:login/index.php");
}
if ((empty($_POST["codigo"]) ||
	empty($_POST["cantidad"]) ||
	empty($_POST["miligramosXU"]) ||
	empty($_POST["nombreGenerico"]) ||
	empty($_POST["nombreComercial"]) ||
	empty($_REQUEST["id"]) )) {
	header("location:registrarMedicamento.php");
}else{
	$codigo = $_POST["codigo"];
	$cantidad = $_POST["cantidad"];
	$miligramosXU = $_POST["miligramosXU"];
	$nombreGenerico = $_POST["nombreGenerico"];
	$nombreComercial = $_POST["nombreComercial"];
	$idPaciente = $_REQUEST["id"];
	$paciente = Paciente::getPaciente($idPaciente);
	ControladorMedicamento::nuevoMedicamento($idPaciente, $nombreComercial, $nombreGenerico , $miligramosXU , $cantidad , $codigo);
	header("location:listarpacientes.php");
}
 ?>