<?php
	//Comprobamos si estamos recibiendo el formulario
	if (!empty($_GET)){
		//Aquí procesamos el formulario
		require('siguiente_pagina.html');
		die(); //¡IMPORTANTE!
	}
	include('12_formulario.html');

//Sin marca de cierre!!
