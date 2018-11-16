<?php 
require('Medicamento.php');

class Paciente{
	
	private $idPaciente;  			/* 1 */
	private $idMedico;				/* 2 */
	private $primerNombre;			/* 3 */
	private $segundoNombre;			/* 4 */
	private $apellido;				/* 5 */
	private $fechaNacimiento;		/* 6 */
	private $edad;					/* 7 */
	private $dni;					/* 8 */
	private $direccion;				/* 9 */
	private $beneficio;				/* 10 */
	private $telefono;				/* 11 */
	private $antecedentes;			/* 12 */
	private $medicacion;			/* 13 */
	private $historiaClinica;		/* 14 */
	private $consultas;				/* 15 */

	/*
	Getters
	 */
	
	public function getConsultas(){
		return $this->consultas;
	}

	public function getHistoriaClinica(){
		return $this->historiaClinica;
	}

	public function getMedicacion(){
		return $this->medicacion;
	}

	public function getAntecedentes(){
		return $this->antecedentes;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getBeneficio(){
		return $this->beneficio;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function getDni(){
		return $this->dni;
	}

	public function getEdad(){
		return $this->edad;
	}

	public function getFechaNacimiento(){
		return $this->fechaNacimiento;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getSegundoNombre(){
		return $this->segundoNombre;
	}

	public function getPrimerNombre(){
		return $this->primerNombre;
	}

	public function getIdMedico(){
		return $this->idMedico;
	}

	public function getIdPaciente(){
		return $this->idPaciente;
	}


	/*
	Setters
	 */

	public function setConsultas($consultas){
		$this->consultas = $consultas;
	}

	public function setHistoriaClinica($historiaClinica){
		$this->historiaClinica = $historiaClinica;
	}

	public function setMedicacion($medicacion){
		$this->medicacion = $medicacion;
	}

	public function setAntecedentes($antecedentes){
		$this->antecedentes = $antecedentes;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono; 
	}

	public function setBeneficio($beneficio ){
		$this->beneficio = $beneficio;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function setDni($dni){
		$this->dni = $dni;
	}

	public function setEdad($edad){
		$this->edad = $edad;
	}

	public function setFechaNacimiento($fechaNacimiento){
		$this->fechaNacimiento = $fechaNacimiento;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setSegundoNombre($segundoNombre){
		$this->segundoNombre = $segundoNombre;
	}

	public function setPrimerNombre($primerNombre){
		$this->primerNombre = $primerNombre;
	}

	public function setIdMedico($idMedico){
		$this->idMedico = $idMedico;
	}

	public function setIdPaciente($idPaciente){
		$this->idPaciente = $idPaciente;
	}

	/*
	Metodos estaticos
	 */
	
	public function __construct(){
		$params = func_get_args();
		$num_params = func_num_args();
		$funcion_constructor ='__construct'.$num_params;
		if (method_exists($this,$funcion_constructor)) {
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}


	/*
	Constructores
	 */

	public function __construct0(){

	}

	public function __construct11($idMedico,$primerNombre,$segundoNombre,$apellido,$fechaNacimiento,$dni,$direccion,$beneficio,$telefono,$antecedentes,$historiaClinica){
		$this->historiaClinica = $historiaClinica;
		$this->antecedentes = $antecedentes;
		$this->telefono = $telefono; 
		$this->beneficio = $beneficio;
		$this->direccion = $direccion;
		$this->dni = $dni;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->apellido = $apellido;
		$this->segundoNombre = $segundoNombre;
		$this->primerNombre = $primerNombre;
		$this->idMedico = $idMedico;
	}


	public function __construct15($idPaciente,$idMedico,$primerNombre,$segundoNombre,$apellido,$fechaNacimiento,$edad,$dni,$direccion,$beneficio,$telefono,$antecedentes,$medicacion,$historiaClinica,$consultas){
		$this->consultas = $consultas;
		$this->historiaClinica = $historiaClinica;
		$this->medicacion = $medicacion;
		$this->antecedentes = $antecedentes;
		$this->telefono = $telefono; 
		$this->beneficio = $beneficio;
		$this->direccion = $direccion;
		$this->dni = $dni;
		$this->edad = $edad;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->apellido = $apellido;
		$this->segundoNombre = $segundoNombre;
		$this->primerNombre = $primerNombre;
		$this->idMedico = $idMedico;
		$this->idPaciente = $idPaciente;
	}

	public function __construct14($idMedico,$primerNombre,$segundoNombre,$apellido,$fechaNacimiento,$edad,$dni,$direccion,$beneficio,$telefono,$antecedentes,$medicacion,$historiaClinica,$consultas){
		$this->consultas = $consultas;
		$this->historiaClinica = $historiaClinica;
		$this->medicacion = $medicacion;
		$this->antecedentes = $antecedentes;
		$this->telefono = $telefono; 
		$this->beneficio = $beneficio;
		$this->direccion = $direccion;
		$this->dni = $dni;
		$this->edad = $edad;
		$this->fechaNacimiento = $fechaNacimiento;
		$this->apellido = $apellido;
		$this->segundoNombre = $segundoNombre;
		$this->primerNombre = $primerNombre;
		$this->idMedico = $idMedico;
	}

	/*
	Metodos estaticos
	 */

	public static function getPaciente($idPaciente){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM paciente WHERE idpaciente LIKE :idPaciente");
		$sel->execute(array(':idPaciente' => $idPaciente));
		$row = $sel->fetch();
		$medicacion = Medicamento::getMedicamentos($idPaciente);
		$consultas = Consulta::getConsultas($idPaciente);
		$anios = $row[5] + "Y";
		$fechaActual = date("Y");
		$edad = $fechaActual - $anios;
		$paciente = new Paciente($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$edad,$row[6],$row[7],$row[8],$row[9],$row[10],$medicacion,$row[11],$consultas);
		return $paciente;

	}

	public static function getPacientes($idMedico){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM paciente WHERE idmedico LIKE :idMedico");
		$sel->execute(array(':idMedico' => $idMedico));
		$pacientes = array();
		while ($row = $sel->fetch()) {
			$medicacion = Medicamento::getMedicamentos($row[0]);
			$consultas = Consulta::getConsultas($row[0]);
			$anios = $row[5] + "Y";
			$fechaActual = date("Y");
			$edad = $fechaActual - $anios;
			$paciente = new Paciente($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$edad,$row[6],$row[7],$row[8],$row[9],$row[10],$medicacion,$row[11],$consultas);
			array_push($pacientes,$paciente);
		}
		

		return $pacientes;

	}



	public function insertarPaciente(){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$ins = $con-> prepare("INSERT INTO paciente(idpaciente, idmedico, primernombre, segundonombre, apellido, fechanacimiento, dni, direccion, beneficio, telefono, antecedentes, historiaclinica) VALUES (:idpaciente,:idmedico,:primernombre,:segundonombre,:apellido,:fechanacimiento,:dni,:direccion,:beneficio,:telefono,:antecedentes,:historiaclinica)");
		$ins->execute(array(
			":idpaciente" => 0,
			":idmedico" => $this->getIdMedico(),
			":primernombre" => $this->getPrimerNombre(),
			":segundonombre" => $this->getSegundoNombre(),
			":apellido" => $this->getApellido(),
			":fechanacimiento" => $this->getFechaNacimiento(),
			":dni" => $this->getDni(),
			":direccion" => $this->getDireccion(),
			":beneficio" => $this->getBeneficio(),
			":telefono" => $this->getTelefono(),
			":antecedentes" => $this->getAntecedentes(),
			":historiaclinica" => $this->getHistoriaClinica()));
		Conexion::killConexion();
	}


}


 ?>
