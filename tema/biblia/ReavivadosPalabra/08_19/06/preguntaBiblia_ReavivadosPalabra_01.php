<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Quién construyó el templo del Señor?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Los israelitas</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">David</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Hiron</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Salomón</p>
			</div>
		</div
		<?php
	}  
// 1 Reyes 6
// 05 de agosto de 2019
	?>

	 