<?php 

require('../datos/Conexion.php');

class Consulta {

	private $idConsulta;
	private $idPaciente;
	private $fechaConsulta;  /* [date] [("Y-m-d")]*/
	private $consultaCadena;

	/*
	Getters
	 */

	public function getIdPaciente(){
		return $this->idPaciente;
	}

	public function getIdConsulta(){
		return $this->idConsulta;
	}

	public function getFechaConsulta(){
		return $this->fechaConsulta;
	}

	public function getConsultaCadena(){
		return $this->consulta;
	}

	/*
	Setters
	 */

	public function setIdPaciente($idPaciente){
		$this->idPaciente = $idPaciente;
	}

	public function setIdConsulta($idConsulta){
		$this->idConsulta = $idConsulta;
	}

	public function setFechaConsulta($fechaConsulta){
		$this->fechaConsulta = $fechaConsulta;
	}
	public function setconsultaCadena($consulta){
		$this->consulta = $consulta;
	}

	/*
	Constructs
	 */

	public function __construct(){
		$params = func_get_args();
		$num_params = func_num_args();
		$funcion_constructor ='__construct'.$num_params;
		if (method_exists($this,$funcion_constructor)) {
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}

	public function __construct0(){

	}

	public function __construct3($idPaciente,$fechaConsulta,$consulta){
		$this->idConsulta = 0;
		$this->idPaciente = $idPaciente;
		$this->fechaConsulta = $fechaConsulta;
		$this->consulta = $consulta;
	}


	public function __construct4($idConsulta,$idPaciente,$fechaConsulta,$consulta){
		$this->idConsulta = $idConsulta;
		$this->idPaciente = $idPaciente;
		$this->fechaConsulta = $fechaConsulta;
		$this->consulta = $consulta;
	}

	/*
	Metodos estaticos
	 */

	/**
	 * [Método estatico que genera objeto con atributos tomados de la bd, del registro con el id enviado]
	 * @param  [int] $idConsulta [Id de la consulta]
	 * @return [object-Consulta]             [Consulta]
	 */
	public static function getConsulta($idConsulta){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM consulta WHERE idconsulta LIKE :idConsulta");
		$sel->execute(array(":idConsulta" => $idConsulta));
		Conexion::killConexion();
		$row = $sel->fetch();
		$consulta = new Consulta($row[0],$row[1],$row[2],$row[3]);

		return $consulta;
	}


	/**
	 * [getConsultas Trae todas las consultas de un paciente de la base de datos]
	 * @param  [int] $idPaciente [n identificador de paciente]
	 * @return [Array- objects-Consulta]             [description]
	 */
	public static function getConsultas($idPaciente){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM consulta WHERE idpaciente LIKE :idPaciente");
		$sel->execute(array(":idPaciente" => $idPaciente));
		Conexion::killConexion();
		$listaConsultas = array();
		while ($row = $sel->fetch()) {
			$consulta = new Consulta($row[0],$row[1],$row[2],$row[3]);
			array_push($listaConsultas, $consulta);
		}
		
		return $listaConsultas;
	
}

	/*
	Metodos de instancia
	 */
	
	/**
	 * [Metodo para registrar un objeto consulta en la base de datos]
	 * @return [boolean] [Si se inserto correctamente]
	 */
	public function registrarConsulta(){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$ins = $con->prepare("INSERT INTO consulta(idconsulta, idpaciente, fechaconsulta, consulta) VALUES (:idconsulta,:idpaciente,:fechaconsulta,:consulta)");
		$ins->execute(array(
			":idconsulta" => 0,
			":idpaciente" => $this->getIdPaciente(),
			":fechaconsulta" => $this->getFechaConsulta(),
			":consulta" => $this->getConsultaCadena()
			));
		Conexion::killConexion();
		if ($ins) {
			return true;
		}else{
			return false;
		}
		
	}

}


 ?>