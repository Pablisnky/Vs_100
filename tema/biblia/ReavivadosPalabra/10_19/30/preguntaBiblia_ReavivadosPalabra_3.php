<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Una vez Asa fue atacado por Baasa rey de Israel, tomó la decisión de buscar apoyo en:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">  
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">El rey de Asiria </p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Dios</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Los egipcios</p>
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Los ángeles de Dios</p>
			</div>
		</div
		<?php
		$_SESSION["Versiculo"] = "2 Crónicas 16:1";
	}  
	//30 de octubre de 2019
    ?>