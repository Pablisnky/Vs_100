<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Luego del saqueo al templo, Roboán reemplazo los escudos de oro que Salomón habia hecho por escudos de:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Madera de cedro</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Plata pulda</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Niquel</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Bronce</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 14:27
// 13 de agosto de 2019
    
    ?>