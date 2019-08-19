<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Acáb despues de derrotar a Ben Adad, lo dejo en libertad al escuchar la siguiente propuesta: </p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">"No volvere a sitiar las ciudades de Israel"</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">"Te devolvere el oro y la plata"</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">"Dejare mi reinado para ti"</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Te devolvere las ciudades que mi padre le quito al tuyo"</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 20:34
// 19 de agosto de 2019
    
    ?>