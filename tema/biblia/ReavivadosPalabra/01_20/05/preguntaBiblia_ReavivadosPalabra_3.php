<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Si se envejece en la tierra la raíz de un árbol, y su tronco muere, reverdecerá como planta nueva ____:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2"> 
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Al percibir el agua</p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Al recibir los rayos del sol</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Al colocarle abono</p>
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Al llegar la primavera</p>
			</div>
	</div>
		<?php
		$_SESSION["Versiculo"] = "Job 14:8-9";
	}  
	//05 de enero de 2019
    ?>