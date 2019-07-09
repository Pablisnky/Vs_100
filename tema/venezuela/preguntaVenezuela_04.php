<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login
    	// echo "el valor de la variable session= " . $_SESSION["ID_PD"];

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">En Venezuela el deporte que reune más fanaticos por temporada es:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">Basket Ball.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Futbol.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Beisbol.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Voleiball.</p>
			</div>
		</div>
		<?php
	}  ?>