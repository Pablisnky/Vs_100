<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Quien ayudo a Moises cuando tenia que hablar con el pueblo, debido a que él tenia dificultades para expresarse en publico?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_02a" class="efecto" onclick="llamar_bloqueo()">Su esposa.</p>
				<p id="principiantes_02b" class="efecto" onclick="llamar_bloqueo()">Su hijo.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_02c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Su hermano.</p>
				<p id="principiantes_02d" class="efecto" onclick="llamar_bloqueo()">Su sobrino.</p>
			</div>
		</div>
		<?php
	}  ?>