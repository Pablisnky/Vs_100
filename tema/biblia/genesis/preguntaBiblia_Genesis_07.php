<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿A quiénes hizo Dios la promesa de dar una nueva tierra donde vivir?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_07a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Noé y su familia.</p>
				<p id="principiantes_07b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Adan y Eva.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_07c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Caín y Abel.</p>
				<p id="principiantes_07d" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,200);">Abraham, Isaac y Jacob.</p>
			</div>
		</div>
		<?php
	}  ?>