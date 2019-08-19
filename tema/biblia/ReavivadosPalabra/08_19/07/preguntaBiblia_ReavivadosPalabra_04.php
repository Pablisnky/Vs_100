<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El oro y la plata que David había consagrado terminaron siendo enviados por ordenes de Salomón a:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">El pueblo de Israel</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Los hornos de fundición</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Tiro, como pago por el cedro utilizado</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">El tesoro del templo del Señor</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 7:51
// 06 de agosto de 2019
    ?>