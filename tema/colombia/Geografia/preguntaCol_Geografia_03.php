<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿En cuál de los puntos cardinales se encuentra el límite con Panamá?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">Norte</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Este</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_sombrear();setTimeout(llamar_puntaje,200);">Oeste</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Sur</p>
			</div>
		</div>
		<?php
	}  ?>