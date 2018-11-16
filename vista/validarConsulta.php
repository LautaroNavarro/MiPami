<?php 
require('../controlador/controladorConsultas.php');

session_start();
if (isset($_SESSION["id"])) {
  $usuario = Medico::obtenerMedico($_SESSION["id"]);
}else{
  header("location:login/index.php");
}
if ((empty($_POST["consulta"]) ||
	empty($_POST["fecha"]) ||
	empty($_REQUEST["id"]) )) {
	header("location:registrarMedicamento.php");
}else{
	$consulta = $_POST["consulta"];
	$fechaConsulta = $_POST["fecha"];
	$idPaciente = $_REQUEST["id"];
	$paciente = Paciente::getPaciente($idPaciente);
	ControladorConsultas::nuevaConsulta($idPaciente,$fechaConsulta,$consulta);
	header("location:listarpacientes.php");	
}
 ?>