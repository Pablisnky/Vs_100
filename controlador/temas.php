<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
    
    if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
    
        header("location:../principal.html");           
    }
    else{ 
        if(!isset($_POST["Enviar"])){//sino se a pulsado el boton enviar de este archivo se entra en el formulario?>
            <!DOCTYPE html>
                <html lang="es">
                    <head>
                        <title>Versus_20 Inicio</title>

                        <meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
                        <meta name="description" content="Juego de preguntas para ganar dinero."/>
                        <meta name="keywords" content="juego, preguntas, dinero"/>
                        <meta name="author" content="Pablo Cabeza"/>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

                        <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
                        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
                        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

                        <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
                  	</head>        	  
            	<header class="fixed_1" >
                    <div>
                        <h1 class="popup">Versus_20</h1>
                    </div>
                </header>
                <script type="text/javascript">      
                    function Regform(){
                        var elementos = document.getElementsByName("temaPrueba");
                        var register;
                        for(var i=0; i<elementos.length; i++){
                        if(elementos[i].checked){register = elementos[i].value; break;}
                        }
                        var tema= register;
                        }
                    }
                </script>        
                <div class="contenedor_4">   
                    <?php                
                    $Categoria= $_GET["categoria"];
                    //echo "La categoria es: " . $Categoria;

                    include("../conexion/Conexion_BD.php");

                    //Se consulta los temas disponibles según la categoría seleccionada
                    $Consulta_1= "SELECT tema, ID_Tema FROM temas WHERE categoria= '$Categoria'";
                    $Recordset_1 = mysqli_query($conexion, $Consulta_1);  ?> 

                    <h2 class="popup_1">Seleccione un tema para su prueba</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="Fortema">  <?php
                        while($Seleccion_1 = mysqli_fetch_array($Recordset_1)){
                            ?>
                            <div style="background-color: ; width:100%; box-sizing: border-box; ">
                                <input type="radio" name="temaPrueba" id=<?php echo $Seleccion_1["ID_Tema"];?> value="<?php echo $Seleccion_1['tema'];?>" onclick=" Regform()">
                                <label class="nav_8" for="<?php echo $Seleccion_1["ID_Tema"];?>"><?php echo $Seleccion_1['tema'];?></label>
                                <input  type="hidden" name="categoria" value="<?php echo $Categoria;?>">
                                <!-- <input  type="hidden" name="tema" id="Tema" value="<script>tema;</script>">  -->
                            </div> <?php 
                        } ?>
                        <input type="submit" value="Cargar" name="Enviar">
                    </form>
                </div>
				<nav class="navegacion_1">
					<div>
                        <!-- <input type="buttom" class="nav_10" value="Volver" onclick="cerrar()"> -->
                    </div>
				</nav>
                    <?php
        }
        else{//Si se a pulsado en boton enviar se recibe el formulario
            $Categoria= $_POST["categoria"];
            // echo "El tema es: " . $Tema= $_POST["temaPrueba"] . "<br>";
            // echo  "La categoria es: " . $Categoria . "<br>";

            if($Categoria != "Biblia"){
                //se crea la sesión verifica, para validar que el participante envio los datos desde este formulario
                $corroborar = 44;  
                $_SESSION["verifica"] = $corroborar;
                // echo $_SESSION["verifica"];
                ?>        
                <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
                <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>  
                <header class="fixed_1">
                    <div>
                        <h1 class="popup">Versus_20</h1>
                    </div>
                </header>
                <section>
                    <?php
                        $participante=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en entrada.php
                        // echo "El nombre del participante: " .  $participante . "<br>";                 
                    ?>
                    <div>
                        <h2 class="tema_1">El tema de la prueba seleccionada es:</h2>
                        <h4><?php echo $Categoria ."_" . $_POST["temaPrueba"] ;?></h4>
                    </div>
                </section>
                <section class="tema_2">
                    <h2 style="width: 100%">Registro de pago.</h2>
                        <div class="contenedor_2">
                            <fieldset class="Afiliacion_4"> 
                                <legend>Depositos para Colombia</legend>                        
                                <p>Bancolombia</p>                                                      
                                <p>Cuenta de ahorros</p>                    
                                <p>13017178677</p>
                            </fieldset>
                        </div>
                        <div class="contenedor_2">
                            <form action="recibePago.php" method="POST" name="registroGratis" onsubmit="return validar_01()">
                                <fieldset class="Afiliacion_4">
                                    <legend>Registrar pago</legend>
                                    <input type="text" name="cedula" id="Cedula" placeholder="Cedula" autocomplete="off">
                                    <input type="text" name="telefono" id="Telefono" placeholder="Telefono" autocomplete="off">
                                    <input type="text" name="deposito" id="Deposito" placeholder="Nº Consignación bancaria" autocomplete="off"">
                                    <input type="text" name="tema" value="<?php echo $_POST["temaPrueba"];?>" style="display: none;">
                                    <input type="text" name="categoria" value="<?php echo $Categoria;?>" style="display: none;">

                                    <input type="submit" value="Registrar" style="margin-top: 6%;">
                                </fieldset>
                            </form>
                        </div>
                    <!-- <a class="nav_7" href="../informacion_Pago.php">Datos bancarios para depositos.</a> -->
                    <div class="contenedor_3">
                        <a style="display: block; margin: auto; cursor: pointer; margin-bottom: 4%;" onclick="cerrar()">Regresar</a>
                    </div>
                </section> 
                <?php
            }
            else{//Entramos aqui cuando es Biblia
                $Categoria= $_POST["categoria"];
                $Tema= $_POST["temaPrueba"];
                // echo "Se entró en la sección Biblia" . "<br>";
                // echo "Categoria= " . $Categoria . "<br>";
                // echo "Tema= " . $Tema;
                header("location:registro_Libre.php?Tema=$Tema&Categoria=$Categoria");
            }
        }
    } 
?>

<script type="text/javascript">
    // function Cargar(id){//Esta funcion se encarga de almacenar es llamada al precionar el boton cargar de este archivo
    //     var colombia= document.getElementById(id).value;
    // }         
    function cerrar(){//esta funcion es llamada desde este archivo
        // Se recarga la ventana padre
        window.opener.location.reload();
        window.close();
    }
</script>