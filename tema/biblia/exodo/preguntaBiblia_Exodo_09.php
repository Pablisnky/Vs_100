<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿En la batalla contra los Amalecitas, mientras Moises mantenia los brazos alzados para que los israelitas salieran victoriosos, ¿Quien dirigia a los soldados en el campo de batalla?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_09a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Josue.</p>
				<p id="principiantes_09b" class="efecto" onclick="llamar_bloqueo()">Aarón.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_09c" class="efecto" onclick="llamar_bloqueo()">El sacerdote.</p>
				<p id="principiantes_09d" class="efecto" onclick="llamar_bloqueo()">Jetro.</p>
			</div>
		</div>
		<?php
	}  ?>