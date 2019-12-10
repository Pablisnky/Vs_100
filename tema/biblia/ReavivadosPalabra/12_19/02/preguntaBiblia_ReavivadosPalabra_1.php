<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El propósito de este capítulo parece ser rendir homenaje a los que lo merecían, hacer figurar en el registro a quienes noblemente participaron en:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">  	         
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El regreso a Jerusalén</p>
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">La reconstrucción de Jerusalén </p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">La rebelión de Jeremías</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Ninguna de las anteriores</p>
			</div>
	</div>
		<?php
		$_SESSION["Versiculo"] = "Nehemías 3";
	}  
	//02 de diciembre de 2019
	?>

	 