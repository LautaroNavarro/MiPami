<?php 
require('../modelo/Medico.php');

class ControladorConsultas{


public static function nuevaConsulta($idPaciente,$fechaConsulta,$consulta){
	$consulta = new Consulta($idPaciente,$fechaConsulta,$consulta);
	$consulta->registrarConsulta();
}

}

 ?>