<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Elías el profeta, le dijo a el rey Acáb que convocara al pueblo de Israel para reunirse en:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">El monte Sinaí</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">El monte Carmelo</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Las puertas de Jerusalem</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">La rivera del rio Jordan</p>
			</div>
		</div
		<?php
	}  
	
// 1 Reyes 18:19
// 17 de agosto de 2019
	?>

	 