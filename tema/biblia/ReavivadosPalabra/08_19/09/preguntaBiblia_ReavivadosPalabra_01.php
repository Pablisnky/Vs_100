<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuantas veces al año Salomón presentaba holocausto y sacrificios de comunión sobre el altar que habia construido:</p></p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">				
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">tres veces</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Ocho veces</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Una vez</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">doce veces</p>
			</div>
		</div
		<?php
	}  
	
// 1 Reyes 9:25
// 08 de agosto de 2019
	?>

	 