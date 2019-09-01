<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando Abraham salió de Egipto con su esposa y con todos sus bienes, en dirección a la región del Néguev, ¿Quién lo acompañó?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_03a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Jacob.</p>
				<p id="principiantes_03b" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear();setTimeout(llamar_puntaje,200); ">Lot.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_03c" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Moisés.</p>
				<p id="principiantes_03d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Job.</p>
			</div>
		</div>
		<?php
	}  ?>