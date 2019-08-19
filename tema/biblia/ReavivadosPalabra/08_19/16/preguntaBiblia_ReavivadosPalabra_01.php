<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Quién le dijo a Elías que se fuera hacia el oriente y se escondiera en el arroyo de Querit?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">La viuda de Sarepta</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Dios</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">El rey Acáb</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">El profeta Jehú</p>
			</div>
		</div
		<?php
	}  
	
// 1 Reyes 17:02
// 16 de agosto de 2019
	?>

	 