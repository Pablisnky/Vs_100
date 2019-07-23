<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La frase "Sutil es el engaño y loca la pasión" forma parte de una estrofa del Himno Adventista:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">541-Señor reposamos</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo()">175-Señor, yo he prometido</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)";>256-Jesus, yo he prometido</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Ninguno de los anteriores</p>
			</div>
		</div>
		<?php
	}  ?>

	<!-- Jeremías 21:7 -->