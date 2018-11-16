<?php 
require('../controlador/controladorMedico.php');

session_start();
if (isset($_SESSION["id"])) {
$usuario = Medico::obtenerMedico($_SESSION["id"]);

}else{
  header("location:login/index.php");
}


 ?>
<html lang="en">
<head>
  <title>Lista de Pacientes</title>
  <?php 
  require('partes/head.php');
  ?>
</head>

<?php 
require('partes/nav.php');
 ?>

<main role="main" class="container">

  <h2>Lista de tus pacientes</h2><br>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Beneficio</th>
        <th>Medicacion</th>
        <th>Consultas</th>
        <th>Más info</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $pacientes = $usuario->getPacientes();
      foreach ($pacientes as $paciente) {
        $nombre = $paciente->getPrimerNombre();
        $apellido = $paciente->getApellido();
        $beneficio = $paciente->getBeneficio();
        $idPaciente = $paciente->getIdPaciente();
      echo "<tr>
            <td>$nombre</td>
            <td>$apellido</td>
            <td>$beneficio</td>
            <td><a href='verMedicamento.php?idPaciente=$idPaciente'>Ver</a> | <a href='registrarMedicamento.php?idPaciente=$idPaciente'>Agregar</a></td>
            <td><a href='verConsultas.php?idPaciente=$idPaciente''>Ver</a> | <a href='registrarConsulta.php?idPaciente=$idPaciente'>Agregar</a></td>
            <td><a href='pacienteCompleto.php?idPaciente=$idPaciente'>Ver</a></td>
      </tr>";
      }
       ?>


    </tbody>
  </table>
</div>
    </main><!-- /.container -->




<?php 
require('partes/script.php');
require('partes/footer.php');
 ?>
</body>
</html>