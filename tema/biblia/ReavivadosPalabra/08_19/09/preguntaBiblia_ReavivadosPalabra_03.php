<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando Salmón terminó de construir el templo del Señor y el palacio real, Dios aparecio ante el por:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Primera vez</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Segunda vez</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Tercera vez</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Ninguna de las anteriores</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 9:01
// 08 de agosto de 2019
    
    ?>