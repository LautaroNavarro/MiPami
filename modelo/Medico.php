<?php 

require('Paciente.php');

class Medico{

	private $idmedico;
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $pacientes;

	/*
	Getters
	 */
	
	public function getPacientes(){
		return $this->pacientes;
	}

	public function getId(){
		return $this->idmedico;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getPassword(){
		return $this->password;
	}

	/*
	Setters
	 */
	
	public function setPacientes($pacientes){
		$this->pacientes = $pacientes;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setPassword($password){
		$this->password = $password;
	}



	/*
	Constructor
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
		$this->idmedico = 0;
	}

	public function __construct4($nombre,$apellido,$email,$password){
		$this->idmedico = 0;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->password = $password;
	}

	public function __construct5($id,$nombre,$apellido,$email,$password){
		$this->idmedico = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->password = $password;
	}
	
	public function __construct6($id,$nombre,$apellido,$email,$password,$pacientes){
		$this->idmedico = $id;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->password = $password;
		$this->pacientes = $pacientes;
	}

	/*
	Metodos estaticos : 
	 */

	/**
	 * [obtenerMedico devuelve un objeto de la clase Medico a traves de una consulta en la base de datos con el id pasado por parametro]
	 * @param  [int] $idMedico [id del medico solicitado]
	 * @return [object-Medico]           [objeto Medico]
	 */
	public static function obtenerMedico($idMedico){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM medico WHERE idmedico LIKE :id");
		$sel->execute(array(":id" => $idMedico));
		$row = $sel->fetch();
		$pacientes = Paciente::getPacientes($idMedico);
		$medico = new Medico($row[0],$row[1],$row[2],$row[3],$row[4],$pacientes);
		Conexion::killConexion();
		return $medico;
	}

	/*
	Metodos de instancia
	 */

	/**
	 * [actualizarMedico actualiza el objeto con los valores de la base de datos]
	 * @return [type] [description]
	 */
	public function actualizarMedico(){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$sel = $con->prepare("SELECT * FROM medico WHERE idmedico LIKE :id");
		$sel->execute(array(":id" => $this->getId()));
		$row = $sel->fetch();
		$this->setNombre($row[1]);
		$this->setApellido($row[2]);
		$this->setEmail($row[3]);
		$this->setPassword($row[4]);
		Conexion::killConexion();
	}

	/**
	 * [registrarMedico registra el objeto en la base de datos]
	 * @return [boolean] [si se concreto con exito]
	 */
	public function registrarMedico(){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$ins = $con->prepare("INSERT INTO medico(idmedico,nombre,apellido,email,password) VALUES (:id,:nombre,:apellido,:email,:password)");
		$ins->execute(array(
		":id" => 0,
		":nombre" =>$this->getNombre(),
		":apellido" =>$this->getApellido(),
		":email" =>$this->getEmail(),
		":password" =>$this->getPassword()	
		));
		if ($ins) {
			return true;
		}else{
			return false;
		}
		Conexion::killConexion()

;	}

	/**
	 * [updateMedico description]
	 * @return [boolean] [si se concreto con exito]
	 */
	public function updateMedico(){
		Conexion::getConexion();
		$con = Conexion::$conexion;
		$upd = $con->prepare("UPDATE  medico SET nombre = :nombre, apellido = :apellido, email = :email, password = :password WHERE idmedico LIKE :id");
		$upd->execute(array(
		":id" => $this->getId(),
		":nombre" =>$this->getNombre(),
		":apellido" =>$this->getApellido(),
		":email" =>$this->getEmail(),
		":password" =>$this->getPassword()	
		));
		return $upd;
	}

}




?>