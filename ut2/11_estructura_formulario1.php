<?php
	//Comprobamos si estamos recibiendo el formulario
	if (!empty($_GET)){
		//Aquí procesamos el formulario
		require('siguiente_pagina.html');
		die(); //¡IMPORTANTE!!
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name=author content='Miguel Jaque <mjaque@migueljaque.com' />
	<title>Formulario - Estructura 1</title>
</head>
<body>
	<h1>Formulario</h1>
	<form>
	<!-- Por defecto, el action es la misma página y el método es GET -->
		<div>
			<label for="usuario">Usario:</label>
			<input type="text" id="usuario" name="campo_usuario" required>
		</div>
		<div>
			<label for="clave">Contraseña:</label>
			<input type="password" id="clave" name="campo_clave" required>
		</div>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>
