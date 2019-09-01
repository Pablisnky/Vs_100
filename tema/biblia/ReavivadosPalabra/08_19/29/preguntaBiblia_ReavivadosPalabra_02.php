<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Jazael llegó a ser rey de Siria por:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="pauseAudioBiblia();sonidoInCorrecto(); llamar_bloqueo()">Lo proclamo el pueblo</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto();pauseAudioBiblia(); llamar_bloqueo()">Dios le dio la victoria</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Usurpó el trono</p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El sacerdote lo ungió</p>
			</div>
		</div
		<?php
    }  
   
// 2 reyes 8:15
// 29 de agosto de 2019 

    ?>