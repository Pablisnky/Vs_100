<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Que rey atacó a Jerusalem en el reinado de Roboán y saqueó los tesoros del templo del Señor y del palacio real?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">El rey Jeroboán</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">El rey de Persia</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">El rey de Egipto</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Ningunode los anteriores</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 14:25
// 13 de agosto de 2019
    
    ?>