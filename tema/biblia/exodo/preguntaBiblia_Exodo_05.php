<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando Moisés estaba en Madián, ¿Quién le dijo que regresara a Egipto porque ya habían muerto todos los que querían matarle?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_05a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Séfora.</p>
				<p id="principiantes_05b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Aarón.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_05c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia(); llamar_bloqueo()">Un egipcio.</p>
				<p id="principiantes_05d" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia(); llamar_sombrear(); setTimeout(llamar_puntaje,200);">Dios.</p>
			</div>
		</div>
		<?php
	}  ?>