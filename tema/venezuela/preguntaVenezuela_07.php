<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login
    	// echo "el valor de la variable session= " . $_SESSION["ID_PD"];

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Los mitos y leyendas venezolanos son cuentos fictisios que algunas veces estan llenos de terror y miedo, de los siguientes personajes, quien existio en realidad en la Venezuela de los años  1800:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Las momias del Dr. Kanoche.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">El silvon de los llanos.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">El pez Nicolas.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">El hachador de San Casimiro.</p>
			</div>
		</div>
		<?php
	}  ?>