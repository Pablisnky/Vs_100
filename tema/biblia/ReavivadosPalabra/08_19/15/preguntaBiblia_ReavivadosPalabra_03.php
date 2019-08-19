<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cual de los siguientes reyes tuvo el favor de Dios por segir sus mandamientos y actuar con buena voluntad?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Asá  rey de Judá</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Zimrí rey de Israel</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Basá rey de Israel</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Ninguno de los anteriores</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 16
// 15 de agosto de 2019
    
    ?>