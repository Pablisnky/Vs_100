<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Quienes fueron expulsados de Israel por seguir idolos y hacer lo que ofende a Dios?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Los amorreos</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Los jezrelitas</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Los egipcios</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Los sirios</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 21:26
// 20 de agosto de 2019
    
    ?>