<?php 

require('../controlador/controladorMedico.php');
session_start();


if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["nombre"]) || empty($_POST["apellido"])) {
	header("location:login/index.php");
	
}else{
	$email = $_POST["email"];
	$password = $_POST["password"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$resultado = ControladorMedico::nuevoMedico($nombre,$apellido,$email,$password);
	if ($resultado) {
		header("location:login/index.php");
	}else{
		header("location:registro/index.php");
	}
}


 ?>