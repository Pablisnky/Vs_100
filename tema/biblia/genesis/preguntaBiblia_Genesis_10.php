<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Qué nombre recibió el primer hombre que la Biblia registra que fue al cielo sin ver muerte?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_10a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Josué</p>
				<p id="principiantes_10b" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,200);">Enoc</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_10c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Lamec</p>
				<p id="principiantes_10d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Moisés</p>
			</div>
		</div>
		<?php
	}  ?>