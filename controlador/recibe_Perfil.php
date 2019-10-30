<?php
    session_start(); //Se reaunada la sesion abierta en validarSesion.php
    $sesion=$_SESSION["ID_Participante"];//aqui se almacena el ID_Afiliado en la variable $sesion
    // echo $sesion . "<br>";

    //conexion a la BD
    include("../conexion/Conexion_BD.php");

    //se capturan todos los campos del formulario perfil_ingeniero.php Seccion datos personales, se almacenará en la tabla afiliados
    $Nombre= ucfirst($_POST['nombre']);
    $Apellido=ucfirst($_POST['apellido']);
    $Correo=$_POST['correo'];   
    $Pais=$_POST['pais']; 
        if(!empty($_POST["departamento"])){
            $Region= $_POST["departamento"];
        }  
        else if(!empty($_POST["departamento_BD"])){
            $Region= $_POST["departamento_BD"];
        }

        if(!empty($_POST["municipio_Col"])){
            $Sub_Region= $_POST["municipio_Col"];
        } 
        else if(!empty($_POST["municipioCol_BD"])){
            $Sub_Region= $_POST["municipioCol_BD"];
        }

        if(!empty($_POST["estado"])){
            $Region= $_POST["estado"];
        }  
        else if(!empty($_POST["estado_BD"])){
            $Region= $_POST["estado_BD"];
        }

        if(!empty($_POST["municipio"])){
            $Sub_Region= $_POST["municipio"];
        } 
        else if(!empty($_POST["municipio_BD"])){
            $Sub_Region= $_POST["municipio_BD"];
        }
    $Iglesia= $_POST["iglesia"];
    if(!empty($_POST["otra_iglesia"])){
        $OtraIglesia=$_POST["otra_iglesia"];
    }
    else{
        $OtraIglesia="Seleccionó iglesia catalogo";
    }

    // echo "Nombre=" . $Nombre . "<br>";
    // echo "Apellido=" . $Apellido . "<br>";
    // echo "Correo=" . $Correo . "<br>";
    // echo "Pais=" . $Pais . "<br>";
    // echo "Region= " . $Region . "<br>";
    // echo "Sub Region= " . $Sub_Region . "<br>";
    // echo "Iglesia= " . $Iglesia . "<br>";

// -----------------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------------
    //Seccion fotografia
    //Recibo los datos de la imagen
    $nombre_img = $_FILES['imagen']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
    $tipo = $_FILES['imagen']['type'];
    $tamaño = $_FILES['imagen']['size'];
        
        // echo "Nombre de la imagen = " . $nombre_img . "<br>";
        // echo "Tipo de archivo = " .$tipo .  "<br>";
        // echo "Tamaño = " . $tamaño . "<br>";
        // echo "Tamaño maximo permitido = 20.000" . "<br>";// en bytes
        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
        
        //Si existe imagen y tiene un tamaño correcto 
        if (($nombre_img == !NULL) AND ($tamaño <= 7000000)){
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/jpeg")
                || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")){
                
                // Ruta donde se guardarán las imágenes que subamos la variable superglobal 
                //usar en remoto
                // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                //Usar en remoto
                $directorio = $_SERVER['DOCUMENT_ROOT'] . '/images/usuarios/'; 

                //usar en local
                //$directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/Vs_100/Versus_20_2/images/usuarios/';

                //se muestra el directorio temporal donde se guarda el archivo
                //echo $_FILES['imagen']['tmp_name'];
                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);

                //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                if(($_FILES['imagen']['name']) != ""){
                    $insertarImagen= "UPDATE participante SET Fotografia='$nombre_img' WHERE ID_Participante= '$sesion' ";
                    mysqli_query($conexion, $insertarImagen);
                }
            } 
            else{
                //si no cumple con el formato
                echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                exit();
            }
        } 
        else{
           //si existe la variable pero se pasa del tamaño permitido
           if($nombre_img == !NULL){
                echo "La imagen es demasiado grande "; 
                echo "<a href='perfil.php'>Regresar</a>";
                exit();
            }
        }
    
// --------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------

//insercion de los datos capturados del formulario en la base de datos 
//Datos para almacenar en la tabla 
   $actualizar1= "UPDATE participante SET Nombre= '$Nombre', Apellido= '$Apellido', Correo= '$Correo', Pais= '$Pais', Region= '$Region', SubRegion= '$Sub_Region', Iglesia='$Iglesia', Otra_Iglesia='$OtraIglesia' WHERE ID_Participante= '$sesion'";
    mysqli_query($conexion,$actualizar1);
    
    header("location: perfil.php"); 
?>