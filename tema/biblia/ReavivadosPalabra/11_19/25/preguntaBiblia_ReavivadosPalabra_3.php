<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La organización que se realizó para los sacerdotes en sus turnos, y los levitas en sus clases para el servicio de Dios, fue conforme: </p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">  
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Lo escrito en el libro de Moisés</p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El sumo sacerdote la planificó</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">A una orden de Darío</p>
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Capricho de Ciro</p>
			</div>
	</div>
		<?php
		$_SESSION["Versiculo"] = "Esdras 6:18";
	}  
	//25 de noviembre de 2019
    ?>