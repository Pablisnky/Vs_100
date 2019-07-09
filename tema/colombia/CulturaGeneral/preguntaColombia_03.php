<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El arbol nacional de Colombia hasta la introducción de la electricidad era usado para hacer velas, este arbol emblematico es:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">La Caoba.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_sombrear();setTimeout(llamar_puntaje,200); ">La Palma de Cera del Quindío.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">El Palo de Rosa.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">El Cedro.</p>
			</div>
		</div>
		<?php
	}  ?>