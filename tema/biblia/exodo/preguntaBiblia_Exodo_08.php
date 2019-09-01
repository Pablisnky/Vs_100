<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Quien construyo el becerro de oro que adoraban los israelitas en el desierto al salir de Egipto?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_08a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Moises.</p>
				<p id="principiantes_08b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_sombrear(); setTimeout(llamar_puntaje,200);">Aarón.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_08c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">El Faraon.</p>
				<p id="principiantes_08d" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Ninguno de los anteriores.</p>
			</div>
		</div>
		<?php
	}  ?>