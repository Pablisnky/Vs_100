<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Colombia a tenido representantes en la Formula 1, máxima categoria del automovilimo, uno de ellos fue:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">Santiago Villa.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Radamel Falcao.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Juan Pablo Montoya.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Nairo Quintana.</p>
			</div>
		</div>
		<?php
	}  ?>