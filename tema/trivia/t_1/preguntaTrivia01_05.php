<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_ParticipanteTrivia"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Cuál es el río más caudaloso del mundo?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo_trivia()">El Nilo</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo_trivia()">El Sena</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo_trivia()">El Tamesis</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear_trivia(); setTimeout(llamar_puntaje_trivia,200)";>El Amazonas</p>
			</div>
		</div>
		<?php
	}  ?>

