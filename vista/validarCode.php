<?php 

require('../controlador/controladorMedico.php');
session_start();


if (empty($_POST["email"]) || empty($_POST["password"])) {
	header("location:login/index.php");
	
}else{
	$email = $_POST["email"];
	$password = $_POST["password"];
	$resultado = ControladorMedico::validarUsuario($email,$password);
	if ($resultado) {
		$_SESSION["id"] = ControladorMedico::obtenerId($email,$password);
		header("location:index.php");
	}else{
		header("location:login/index.php");
	}
}


 ?>