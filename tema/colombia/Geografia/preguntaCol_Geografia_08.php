<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Qué nombre tiene el río  que está en la Serranía de la Macarena, el cual se le conoce como el Arcoiris o río de los 5 colores?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">Río Las Gachas</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Caño Cristales</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Caño colorido</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Caño Macarena</p>
			</div>
		</div>	
		<?php
	}  ?>