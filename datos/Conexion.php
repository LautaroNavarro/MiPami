<?php 

class Conexion{

	public static $conexion;

	public static function getConexion(){
		self::$conexion = new PDO(
			"mysql:host=localhost; dbname=cuidar",
			"root",
			"root");
	}

	public static function killConexion(){
		self::$conexion = null;
	}
}


 ?>