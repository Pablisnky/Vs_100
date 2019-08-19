<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El pacto de Dios con Salomón le garantizaba a Salomón:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Afirmar por siempre su trono en Israel</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Abundancia de oro, plata, bronce y madera</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Muchas esposas y concubinas</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Salud, fuerza y juventud</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 9:05
// 08 de agosto de 2019
    
    ?>