<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Cuando Isaac nació, Abraham su padre tenía la edad de:?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_04a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">180 años.</p>
				<p id="principiantes_04b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">70 años.</p>
			</div>
			<div class="Quinto_2">	
				<p id="principiantes_04c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,200);">100 años.</p>
				<p id="principiantes_04d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">350 años.</p>
			</div>	
		</div>	
		<?php
	}  ?>		