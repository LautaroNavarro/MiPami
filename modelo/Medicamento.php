<?php 

require('Consulta.php');

class Medicamento{
	private $idMedicamento;
	private $idPaciente;
	private $nombreComercial;
	private $nombreGenerico;
	private $miligramosXU;
	private $cantidad;
	private $codigo;


	/*
	Getters
	 */
	
	public function getIdMedicamento(){
		return $this->idMedicamento;
	}

	public function getIdPaciente(){
		return $this->idPaciente;
	}

	public function getNombreComercial(){
		return $this->nombreComercial;
	}

	public function getNombreGenerico(){
		return $this->nombreGenerico;
	}

	public function getMiligramosXU(){
		return $this->miligramosXU;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	/*
	Setters
	 */
	
	public function setIdMedicamento($idMedicamento){
		$this->idMedicamento = $idMedicamento;
	}

	public function setIdPaciente($idPaciente){
		$this->idPaciente = $idPaciente;
	}

	public function setNombreComercial($nombreComercial){
		$this->nombreComercial = $nombreComercial;
	}

	public function setNombreGenerico($nombreGenerico){
		$this->nombreGenerico = $nombreGenerico;
	}

	public function setMiligramosXU($miligramosXU){
		$this->miligramosXU = $miligramosXU;
	}

	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	/*
	constructores
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

	public function __construct6($idPaciente, $nombreComercial, $nombreGenerico , $miligramosXU , $cantidad , $codigo){
		$this->idMedicamento = 0;
		$this->idPaciente = $idPaciente;
		$this->nombreComercial = $nombreComercial;
		$this->nombreGenerico = $nombreGenerico;
		$this->miligramosXU = $miligramosXU;
		$this->cantidad = $cantidad;
		$this->codigo = $codigo;
	}

	public function __construct7($idMedicamento,$idPaciente, $nombreComercial, $nombreGenerico , $miligramosXU , $cantidad , $codigo){
		$this->idMedicamento = $idMedicamento;
		$this->idPaciente = $idPaciente;
		$this->nombreComercial = $nombreComercial;
		$this->nombreGenerico = $nombreGenerico;
		$this->miligramosXU = $miligramosXU;
		$this->cantidad = $cantidad;
		$this->codigo = $codigo;
	}

	/*
	Metodos estaticos
	 */
	

	/**
	 * [getMedicamento description]
	 * @param  [type] $idMedicamento [description]
	 * @return [type]                [description]
	 */
	public static function getMedicamento($idMedicamento){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM medicamento WHERE idmedicamento LIKE :idMedicamento");
		$sel->execute(array(":idMedicamento" => $idMedicamento));
		Conexion::killConexion();
		$row = $sel->fetch();
		$medicamento = new Medicamento($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
		return $medicamento;
	}


	/**
	 * [getConsultas description]
	 * @param  [type] $idPaciente [description]
	 * @return [type]             [description]
	 */
	public static function getMedicamentos($idPaciente){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM medicamento WHERE idpaciente LIKE :idPaciente");
		$sel->execute(array(":idPaciente" => $idPaciente));
		Conexion::killConexion();
		$listaMedicamentos = array();
		while ($row = $sel->fetch()) {
			$medicamento = new Medicamento($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
			array_push($listaMedicamentos, $medicamento);
		}
		

		return $listaMedicamentos;
	}


	/*
	Metodos de instancia
	 */
	public function registrarMedicamento(){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$ins = $con->prepare("INSERT INTO medicamento(idmedicamento, idpaciente, nombrecomercial, nombregenerico, miligramosxu, cantidad, codigo) VALUES (:idmedicamento,:idpaciente,:nombrecomercial,:nombregenerico,:miligramosxu,:cantidad,:codigo)");
		$ins->execute(array(
			":idmedicamento" => 0,
			":idpaciente" => $this->getIdPaciente(),
			":nombrecomercial" => $this->getNombreComercial(),
			":nombregenerico" => $this->getNombreGenerico(),
			":miligramosxu" => $this->getMiligramosXU(),
			":cantidad" => $this->getCantidad(),
			":codigo" => $this->getCodigo()
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