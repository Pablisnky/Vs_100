<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El hombre de Dios que llego desde Judá, por desobedecer e irse a comer a casa del profeta del pueblo fue castigado con:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Se le paralizó un brazo.</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Destierro de Judá</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Jeroboán lo condeno a prisión</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Lo mató un león</p>
			</div>
		</div
		<?php
	}  
	
// 1 Reyes 13:24
// 12 de agosto de 2019
	?>

	 