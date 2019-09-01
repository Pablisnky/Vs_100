<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Sem, Cam y Jafet, fueron los hijos de:?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_02a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Abraham.</p>
				<p id="principiantes_02b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Cáin.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_02c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Moises.</p>
				<p id="principiantes_02d" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,200);">Noé.</p>
			</div>
		</div>
		<?php
	}  ?>