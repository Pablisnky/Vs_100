<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login
    	// echo "el valor de la variable session= " . $_SESSION["ID_PD"];

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La temperatura más baja que se puede encontrar actualmente en una ciudad de Venezuela en ciertas condiciones climaticas, estan alrededor de:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">20 a 25 C</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200); ">7 a 12 C.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">-10 a -6 C.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">15 a 20 C.</p>
			</div>
		</div>
		<?php
	}  ?>