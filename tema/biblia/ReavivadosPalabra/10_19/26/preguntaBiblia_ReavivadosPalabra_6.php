<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La ira de Dios se apartó de Roboam y las cosas en Judá comenzaron a ir bien; este cambio fue debido a que Roboam decidió:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2"> 
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Comer sano.</p>
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Humillarse ante el Señor</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Leer un salmo diariamente</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Construir templos por toda Judá</p>
			</div>
		</div
		<?php
		$_SESSION["Versiculo"] = "2 Crónicas 12:12";
	}  
	//26 de octubre de 2019
    ?>