<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
    
    if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
    
        header("location:../vista/principal.php");           
    }
    else{  
        if(isset($_GET["Categoria"])){
            // echo $_GET["Tema"];
        }
        else{
            echo "No esta declarada";
        }  
          
        switch($_GET["Categoria"]){
            case 'colombia': 
                header("location:temas.php?categoria=Colombia");
            break;
            case 'venezuela': 
                header("location:temas.php?categoria=Venezuela");
            break;
            case 'biblia': 
                header("location:temas.php?categoria=Biblia");
            break;
            case 'familia': 
                header("location:temas.php?categoria=Familia");
            break;
            case 'musica': 
                header("location:temas.php?categoria=Musica");
            break;
        }
    }
