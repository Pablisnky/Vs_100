<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Actualmente Colombia impulsa la intención de destacar la importancia de la cultura, las ideas y la innovación en la economía, este modelo lo han llamado:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Economia Naranja.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">El impulso del ciudadano.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Modelo Economico del futuro.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Ninguno de los anteriores.</p>
			</div>
		</div>	
		<?php
	}  ?>