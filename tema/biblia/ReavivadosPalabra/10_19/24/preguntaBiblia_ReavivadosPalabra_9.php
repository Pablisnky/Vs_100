<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La rebelión que se inició apenas Roboan fue coronado rey, se debió a que no supo:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2"> 
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Encontrar suficiente oro y plata</p>
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Escuchar los consejos de los ancianos.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Escoger a los gobernadores.</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Atacar a los babilonios.</p>
			</div>
		</div
		<?php
		$_SESSION["Versiculo"] = "2 Crónicas 10:15";
	}  
	//24 de octubre de 2019
    ?>