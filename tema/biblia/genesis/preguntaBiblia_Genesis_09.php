<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Quién fue conocido como el primer gran guerrero de la tierra y como un valiente cazador ante el Señor:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_09a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Sansón.</p>
				<p id="principiantes_09b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Salomón.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_09c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El rey David.</p>
				<p id="principiantes_09d" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,200);">Nimrod.</p>
			</div>
		</div>
		<?php
	}  ?>