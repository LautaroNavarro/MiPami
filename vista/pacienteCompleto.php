<?php 
require('../controlador/controladorMedico.php');

session_start();
if (isset($_SESSION["id"])) {
  $usuario = Medico::obtenerMedico($_SESSION["id"]);
}else{
  header("location:login/index.php");
}
if (empty($_REQUEST["idPaciente"])) {
  header("location:listarpacientes.php");
}else{
  $idPaciente = $_REQUEST["idPaciente"];
  $paciente = Paciente::getPaciente($idPaciente);
}
$pacientes = $usuario->getPacientes();
$contiene = false;
$pacienteDos = Paciente::getPaciente($idPaciente);

  if ($pacienteDos->getIdMedico() == $usuario->getId()) {
    $contiene = true;
  }

if ($contiene == false) {
  header("location:listarpacientes.php");
}
 ?>


<html lang="en">
<head>
  <title>Mi Pami</title>
  <?php 
  require('partes/head.php');
  ?>
</head>
  <body>
<?php 
require('partes/nav.php');
 ?>
  
    <main role="main" class="container">
      <?php 
      echo "<h4>Primer nombre: </h4><p>" . $paciente->getPrimerNombre(). "</p><hr>";

      echo "<h4>Segundo nombre: </h4><p>" . $paciente->getSegundoNombre(). "</p><hr>";
      echo "<h4>Apellido: </h4><p>" . $paciente->getApellido(). "</p><hr>";
      echo "<h4>Fecha de nacimiento: </h4><p>" . $paciente->getFechaNacimiento(). "</p><hr>";
      echo "<h4>Edad: </h4><p>" . $paciente->getEdad(). "</p><hr>";
      echo "<h4>Dni: </h4><p>" . $paciente->getDni(). "</p><hr>";
      echo "<h4>Direccion: </h4><p>" . $paciente->getDireccion(). "</p><hr>";
      echo "<h4>Numero de beneficio: </h4><p>" . $paciente->getBeneficio(). "</p><hr>";
      echo "<h4>Telefono: </h4><p>" . $paciente->getTelefono(). "</p><hr>";
      echo "<h4>Antecedentes: </h4><p>" . $paciente->getAntecedentes(). "</p><hr>";
      echo "<h4>Medicacion:</h4>";

      $medicacion = $paciente->getMedicacion();
      $mediacionCount = count($medicacion);   
      if ($mediacionCount == 0) {
        echo "<p>Sin medicamentos</p>";
      }else{
      $count = 1;
      foreach ($medicacion as $medicamento) {
        echo "<h6>Medicamento $count</h6>";
        echo "<p>Nombre comercial: " . $medicamento->getNombreComercial() . "</p>";
        echo "Nombre generico: ". $medicamento->getNombreGenerico(). "</p>";
        echo "Miligramos por unidad: ". $medicamento->getMiligramosXU(). "</p>";
        echo "Unidades: ". $medicamento->getCantidad(). "</p>";
        echo "Codigo: ". $medicamento->getCodigo(). "</p><hr>";
        $count++;
      }
      }

      echo "<h4>Historia Clinica: </h4><p>" . $paciente->getHistoriaClinica(). "</p><hr>";
      echo "<h4>Consultas:</h4>";

      $consultas = $paciente->getConsultas();
      if (count($consultas) == 0) {
        echo "Sin consultas";
      }else{
      $contador = 1;
      foreach ($consultas as $consulta){
        echo "<h6>Consulta $contador</h6>";
        echo "<p>Fecha: " . $consulta->getFechaConsulta() . "</p>";
        echo "Nota: ". $consulta->getConsultaCadena(). "</p><hr><br>";
      $contador++;

      }}
      ?>
  
    </main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>

</html>