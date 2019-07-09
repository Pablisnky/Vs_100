<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La novela Cien Años de Soledad, fue escrita por el escritor colombiano:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">Jorge Isaacs.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Gabriel Garcia Marquez.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Fernando Botero.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Romulo Gallegos.</p>
			</div>
		</div>	
		<?php
	}  ?>