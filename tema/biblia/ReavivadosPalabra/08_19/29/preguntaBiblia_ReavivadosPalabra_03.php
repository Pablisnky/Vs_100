<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Que sucedería en Sunem por siete años en tiempos de Eliseo?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto();pauseAudioBiblia(); llamar_sombrear(); setTimeout(llamar_puntaje,100)">Hambruna</p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto();pauseAudioBiblia(); llamar_bloqueo()">Plagas</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto();pauseAudioBiblia(); llamar_bloqueo()">Terremotos</p>
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto();pauseAudioBiblia(); llamar_bloqueo()">Lluvias</p>
			</div>
		</div
		<?php
    }  
   
	// 2 reyes 8:1
	// 29 de agosto de 2019 
    ?>