<?php   
    //conexion a la BD
    include("../conexion/Conexion_BD.php");

   	// $verifica = $_SESSION["verifica"];
    // if($verifica == 1906){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
 		// unset($_SESSION['verifica']);//se borra la $_SESSION verifica.
 
    	//se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
    	//echo $verifica;
		// se reciben los datos enviados del formulario de registro-
					
		$Usuario = htmlspecialchars($_GET["val_1"]);
		$Comentario = htmlspecialchars($_GET["val_2"]);

		// echo "Usuario: " . $Usuario . "<br>" ;
		// echo "Comentario: " . $Comentario . "<br>" ;
				
		//Se inserta el comentario en la tabla comentarios_capitulos
		$insertar= "INSERT INTO comentarios_capitulos(usuario, comentario, fecha_comentario) VALUES('$Usuario','$Comentario',NOW())";
        mysqli_query($conexion, $insertar) or die ("Algo ha dio mal en la consulta a la BD");
    		
			
	// }   
	// else{ // Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al formulario de registro  
	// 	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=registro.php'>";  
	// } 
?>



