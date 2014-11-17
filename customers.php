<!DOCTYPE HTML>
<html>
<head>
	<title>TeacherOnLine</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" >
	<?php
		include('HeaderBar.html');
	?>

	<script>
		function AgregarUser(){
		<!--alert('Mostrando formulario');-->
		formulario.style.visibility='visible';
		botonAddUser.style.visibility='hidden';
		spaceForResult.style.visibility='hidden';
		}
		
		function CancelarAddUser(){
		formulario.style.visibility='hidden';
		botonAddUser.style.visibility='visible';
		spaceForResult.style.visibility='visible';
		var frm = document.getElementsByName('formulario')[0];
		frm.reset();  // Reseteo el formulario
   		return false; // No refresco la pagina
		}
	</script>
	
</head>
<body>
<br>
<img alt="Add user" id="botonAddUser" onclick="AgregarUser()" src="img/more.png" height="50" width="50" style="float: right" >
<br>

	<div id="spaceForResult" style="visibility:visible">
		<p>-----------------------------------------------------------------------------------------------------------------------</p>
		<a>Espacio reservado para mostrar los nombres de los usuarios leyendolos desde la base de datos</a>
		<br>
		<p>-----------------------------------------------------------------------------------------------------------------------</p>
	</div>

<br>

<form name="formulario" action="" method="post" style="visibility:hidden">
	<label class="h4">Name&nbsp;&nbsp;&nbsp; </label>
	<input id="Name" type="text" class="input-sm" style="width: 291px; height: 30px"><label class="h4">Last name&nbsp;&nbsp;&nbsp; </label><input type="text" class="input-sm" style="height: 30px; width: 180px">&nbsp;&nbsp;&nbsp;&nbsp;<br>
	<label class="h4">E-Mail&nbsp;&nbsp;&nbsp; </label><input class="input-sm" type="text" placeholder="usuario@example.com" style="height: 30px; width: 200px"><label class="h4">Phone&nbsp;&nbsp;&nbsp;</label><input class="input-sm" type="text" style="height: 30px"><label class="h4">Age&nbsp;&nbsp;&nbsp;</label><input class="input-sm" type="text" style="width: 57px; height: 30px">
	<br>
		<label class="h4">Scholarship&nbsp;&nbsp;&nbsp;</label><select class="checkbox" id="" name="scolar" style="left: 119px; top: -21px"> 
				<option value="" selected="selected"></option>
				<option value="1" >Primaria</option>
				<option value="2" >Secundaria</option>
				<option value="3" >Preparatoria</option>
				<option value="4" >Carrera tecnica</option>
				<option value="5" >Licenciatura</option>
				<option value="6" >Posgrado</option>
			</select>
	<br>
	<button class="btn">Add user</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn" onclick="CancelarAddUser()">Cancel</button>

</form>

</body>
</html>