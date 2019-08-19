<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El profeta que Dios había enviado, visitó la casa del profeta del pueblo en virtud de:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Debia hacerlo</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Necesitaba comer</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Lo esperaban alli</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Fue engañado</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 13:18
// 12 de agosto de 2019
    
    ?>