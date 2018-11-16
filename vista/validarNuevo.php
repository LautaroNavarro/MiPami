<?php 
require('../controlador/controladorMedico.php');

session_start();
if (isset($_SESSION["id"])) {
$usuario = Medico::obtenerMedico($_SESSION["id"]);

}else{
  header("location:login/index.php");
}


if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["dni"]) && isset($_POST["beneficio"])) {
	$nombre = $_POST["nombre"];
	$nombreDos = $_POST["nombreDos"];
	$apellido = $_POST["apellido"];
	$nacimiento = $_POST["nacimiento"];
	$dni = $_POST["dni"];
	$direccion= $_POST["direccion"];
	$beneficio = $_POST["beneficio"];
	$antecedentes= $_POST["antecedentes"];
	$hclinica= $_POST["hclinica"];
	$id = $usuario->getId();
	$telefono = $_POST["telefono"];
	$paciente = ControladorMedico::nuevoPaciente($id,$nombre,$nombreDos,$apellido,$nacimiento,$dni,$direccion,$beneficio,$telefono,$antecedentes,$hclinica);
	header("location:listarpacientes.php");

}else{
	header("location:nuevopaciente.php");
}

 ?>