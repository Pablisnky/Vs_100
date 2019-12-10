<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando los habitantes vecinos vinieron a ofrecer ayuda para la reconstruir el templo, ¿Quiénes se opusieron a la colaboración que querían brindar?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">    
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Zorobabel, Jesúa, y los patriarcas de casas</p>
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El profeta Hageo y Zacarías</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El sumo sacerdote</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El rey Ciro</p>
			</div>
	</div>
		<?php
		$_SESSION["Versiculo"] = "Esdras 4:3";
	}  
	//23 de  noviembre de 2019
    ?>