<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login
    	// echo "el valor de la variable session= " . $_SESSION["ID_PD"];

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Venezuela limita por el norte con el Mar Caribe, ¿En cual oceano se encuentra dicho Mar?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Atlántico.</p><!-- llamar_puntaje() se encuentra en puntaje.js -->
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Pacífico.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Índico.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Caribeño.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
			</div>
		</div>
		<?php
	}  ?>