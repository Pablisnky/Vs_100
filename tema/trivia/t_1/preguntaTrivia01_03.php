<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_ParticipanteTrivia"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Qué carabela no volvió del viaje en el que Colón arribó a América por primera vez?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo_trivia()">La niña</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo_trivia()">La Pinta</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear_trivia(); setTimeout(llamar_puntaje_trivia,200)";>La Santa María</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo_trivia()">Ninguna, todas resgresaron</p>
			</div>
		</div>
		<?php
	}  ?>
