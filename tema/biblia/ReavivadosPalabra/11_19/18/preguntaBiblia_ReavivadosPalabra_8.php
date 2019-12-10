<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Qué palabras leyó el rey a oídos de todos los varones de Judá, y los moradores de Jerusalén, los sacerdotes, los levitas y todo el pueblo?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">       
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Los edictos del rey</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El evangelio de Jesús</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">El libro del pacto </p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Las normas de los jueces en Judá</p>
			</div>
		</div
		<?php
		$_SESSION["Versiculo"] = "2 Crónicas 34:30";
	}  
	//18 de noviembre de 2019
    ?>