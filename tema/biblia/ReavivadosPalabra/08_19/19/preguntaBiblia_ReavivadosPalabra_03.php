<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Las tropas de los sirios e israelitas estuvieron acampando unos frente a los otros esperando el momento para desatar el combate, ¿En cual dia terminaron enfrentandose?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Al tercer dia.</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Al decimo dia</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Al quinto dia</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Al septimo dia</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 20:29
// 19 de agosto de 2019
    
    ?>