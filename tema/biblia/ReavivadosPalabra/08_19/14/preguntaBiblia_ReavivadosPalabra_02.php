<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La relación que el rey Abías tuvo con el Señor fue:  </p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Hizo lo que al Señor le agrada</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Construyó un templo especial para Dios</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">No fue fiel a Dios</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Siguio los pasos de David.</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 15:3
// 14 de agosto de 2019
    ?>