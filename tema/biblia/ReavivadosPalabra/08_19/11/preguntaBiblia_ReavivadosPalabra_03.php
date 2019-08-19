<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Porque el pueblo de Israel entro en conflicto con la familia de David?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Porque Roboán hizo más fuerte el yugo</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Porque Salomón era cruel</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Porque David traicionó a Urias</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Nunca entraron en conflicto</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 12:16-19
// 11 de agosto de 2019
    
    ?>