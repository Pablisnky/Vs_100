<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Qué sucedió cuando Sanbalat, Tobías, los árabes, los amonitas y los de Asdod, se enteraron que los muros de Jerusalén eran reparados?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">     
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Se encolerizaron</p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Ofrecieron ayuda</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Suministraron piedras y madera</p>
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Ninguna de las anteriores</p>
			</div>
	</div>
		<?php
		$_SESSION["Versiculo"] = "Nehemías 4:7";
	}  
	//03 de diciembre de 2019
    ?>