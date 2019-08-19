<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El palacio de Salomón se llamaba:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Bosque del Líbano</p></p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">El refugio</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Jehova es mi pastor</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">El sabio Salomón</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 
// 0 de agosto de 2019
    
    ?>