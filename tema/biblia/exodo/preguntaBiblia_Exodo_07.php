<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Dios llenó de sabiduría, inteligencia y capacidad creativa para hacer trabajos artísticos en oro, plata y bronce a:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_07a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Moises.</p>
				<p id="principiantes_07b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Pablo Picasso.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_07c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Los egipcios.</p>
				<p id="principiantes_07d" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia(); llamar_sombrear(); setTimeout(llamar_puntaje,200);">Bezalel.</p>
			</div>
		</div>
		<?php
	}  ?>