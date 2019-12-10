<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Darío ordeno que cualquiera que alterara el decreto que el dio, acerca de no interrumpir la reconstrucción del Templo en Jerusalén, fuese :</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">        
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Encarcelado</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Matado a filo de espada</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Llevado a la hoguera</p>
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Colgado de un madero de su casa</p>
			</div>
	</div>
		<?php
		$_SESSION["Versiculo"] = "Esdras 6:11";
	}  
	//25 de noviembre de 2019
    ?>