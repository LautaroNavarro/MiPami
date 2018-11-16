<?php 
require('../modelo/Medico.php');

class ControladorMedicamento{

	public static function nuevoMedicamento($idPaciente, $nombreComercial, $nombreGenerico , $miligramosXU , $cantidad , $codigo){
		$medicamento = new Medicamento(0,$idPaciente, $nombreComercial, $nombreGenerico , $miligramosXU , $cantidad , $codigo);
		$medicamento->registrarMedicamento();
	}
}
 ?>