<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Salomón confirma que ____ lo ha puesto como rey de Israel para que suceda a su padre.</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2"> .     
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El pueblo </p>
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Dios</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Los jueces</p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Los sacerdote</p>
			</div>
		</div
		<?php
		$_SESSION["Versiculo"] = "2 Crónicas 1:8";
	}  
	//15 de octubre de 2019
    ?>