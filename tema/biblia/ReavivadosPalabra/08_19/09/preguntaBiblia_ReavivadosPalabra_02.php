<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Salomón le dio a Hiram rey de Tiro 20 ciudades en Galilea, este al visitarlas y verlas le dijo a Salomón:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Son ciudades hermosas</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Son ciudades modernas</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Estas ciudades apestan</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Que clase de ciudades son estas</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 9:13
// 08 de agosto de 2019
    
    ?>