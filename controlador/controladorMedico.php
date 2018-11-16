<?php 

require('../modelo/Medico.php');

class ControladorMedico{


	public static function nuevoPaciente($idMedico,$primerNombre,$segundoNombre,$Apellido,$fechaNacimiento,$dni,$direccion,$beneficio,$telefono,$antecedentes,$historiaClinica){

		$paciente = new Paciente($idMedico,$primerNombre,$segundoNombre,$Apellido,$fechaNacimiento,$dni,$direccion,$beneficio,$telefono,$antecedentes,$historiaClinica);
		$paciente->insertarPaciente();
	}

	public static function empaquetarMedico(){

	}

	public static function obtenerId($email,$password){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM medico WHERE email LIKE :email");
		$sel->execute(array(
			":email" => $email
		));
		$row = $sel->fetch();
		$contrasenia = $row[4];
		if (password_verify($password, $contrasenia)){
			return $row[0];
		}

	}


	public static function nuevoMedico($nombre,$apellido,$email,$password){
		$password = password_hash($password, PASSWORD_DEFAULT);
		$medico = new Medico($nombre,$apellido,$email,$password);
		$result = $medico->registrarMedico();
		return result;
	}


	public static function validarUsuario($email,$password){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM medico WHERE email LIKE :email");
		$sel->execute(array(
			":email" => $email
		));
		$row = $sel->fetch();
		$contrasenia = $row[4];
		if ($sel->rowCount() > 0) {
			if (password_verify($password, $contrasenia)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}


 ?>