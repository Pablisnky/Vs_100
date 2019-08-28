<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">En la batalla de Siria contra Israel, el rey de Siria ordeno a sus capitanes de carros de combates persiguir y luchar exclusivamente contra:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">La caballería real enemiga.</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">La infantería de guerra Israelí</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">El rey Acab.</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">El rey Josafat</p>
			</div>
		</div
		<?php
    }  
	//1 Reyes 22:31
	//21 de agosto de 2019    
    ?>