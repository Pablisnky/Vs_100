<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Luego de ser visitado por el hombre de Dios, Jeroboán tomo una actitud de:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Obediencia a Dios</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Demolió los altares en Betel y Dam</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">No cambio su mala conducta</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Castigo a los sacerdotes paganos</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 13:33
// 12 de agosto de 2019
    ?>