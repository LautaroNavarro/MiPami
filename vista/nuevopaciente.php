<?php 
require('../controlador/controladorMedico.php');

session_start();
if (isset($_SESSION["id"])) {
$usuario = Medico::obtenerMedico($_SESSION["id"]);

}else{
  header("location:login/index.php");
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Agregar paciente</title>
 	<?php 
 	require('partes/head.php');
 	 ?>
 </head>
 <body>
 <?php 
require('partes/nav.php');
  ?>
<main role="main" class="container">
<form action="validarNuevo.php" method="POST">
	<h1>Registro de nuevo Paciente</h1><br>
  <div class="form-group">
    <label for="nombre">Primer Nombre</label>
    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Lautaro" name="nombre" required>
  </div>

 <div class="form-group">
    <label for="nombreDos">Segundo Nombre</label>
    <input type="text" class="form-control" id="nombreDos" aria-describedby="emailHelp" placeholder="Lionel" name="nombreDos" >
  </div>

 <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" id="apellido" aria-describedby="emailHelp" placeholder="Navarro" name="apellido" required>
  </div>

 <div class="form-group">
    <label for="nacimiento">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="nacimiento" aria-describedby="emailHelp"  name="nacimiento">
  </div>


 <div class="form-group">
    <label for="telefono">Telefono</label>
    <input type="text" class="form-control" id="telefono" aria-describedby="emailHelp"  name="telefono">
  </div>

 <div class="form-group">
    <label for="dni">DNI</label>
    <input type="number" class="form-control" id="dni" aria-describedby="emailHelp" placeholder="41752907" name="dni" required>
  </div>

 <div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control" id="direccion" aria-describedby="emailHelp" placeholder="Mariano Moreno 231" name="direccion" >
  </div>


<div class="form-group">
    <label for="beneficio">Numero de beneficio</label>
    <input type="text" class="form-control" id="beneficio" aria-describedby="emailHelp" placeholder="14692834523400" name="beneficio" required>
  </div>

  <div class="form-group">
    <label for="antecedentes">Antecedentes</label>
    <textarea class="form-control" id="antecedentes" rows="5" name="antecedentes"></textarea>
  </div>

  <div class="form-group">
    <label for="hclinica">Historia Clinica</label>
    <textarea class="form-control" id="hclinica" rows="5" name="hclinica"></textarea>
  </div>
<br><br>
  <button type="submit" class="btn btn-primary">Listo!</button>
</form>
<br>
</main>




<?php 
 require('partes/script.php');
require('partes/footer.php');
 ?>
 </body>
 </html>