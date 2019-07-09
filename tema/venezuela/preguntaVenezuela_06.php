<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login
    	// echo "el valor de la variable session= " . $_SESSION["ID_PD"];

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La linea del Ecuador atraviesa 13 paises; con respecto a Venezuela, esta linea imaginaria se ubica:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">En la costa venezolana.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Divide a Venezuela en dos.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">En los Andes venezolanos.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Cerca del limite sur de Venezuela.</p>
			</div>
		</div>
		<?php
	}  ?>