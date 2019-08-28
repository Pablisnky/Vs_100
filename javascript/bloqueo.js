		var http_request = false;
        var peticion= conexionAJAX();

        function conexionAJAX(){
            http_request = false;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                http_request = new XMLHttpRequest();
                if (http_request.overrideMimeType){
                    http_request.overrideMimeType('text/xml');
                }
            } else if (window.ActiveXObject){ // IE
                try {
                    http_request = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e){
                    try{
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {}
                }
            }
            if (!http_request){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          	/*else{
                alert("Instancia creada exitosamente ok");
            }*/
           return http_request;
        } 
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
function llamar_bloqueo(){//invocada en preguntaXXXXXXX_00.php 

    var aleatorio = parseInt(Math.random()*999999999);
    C=document.getElementById("ID_Participante").value;//se inserta el ID_Participante desde preguntaXXXXXXXX_00.php.
    D=document.getElementById("Tema").value;//se inserta el nombre del libro desde preguntaXXXXXXXX_0O.php.
    E=document.getElementById("ID_Pregunta").value;//se inserta el ID de la pregunta  desde preguntaXXXXXXXX_0O.php.
    H=document.getElementById("ID_PP").value;//se toma el ID de la prueba.
    
    var url="../controlador/bloquearPregunta.php?val_3=" + C  + "&val_4=" + D + "&val_5=" + E + "&val_6=" + H + "&r=" + aleatorio;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_bloqueo;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_bloqueo(){
    if (peticion.readyState == 4){
         if (peticion.status == 200){
           document.getElementById('RespuestaPreguntas').innerHTML=peticion.responseText;//envia respuesta a preguntaXxxxx_00.php
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    
    //Se llama a la función flecha() ubicada en Funciones_varias.js
    setTimeout(flecha,3000);
}

//-------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------
function llamar_bloqueo_Demo(){//invocada en preguntaXXXXXXX_00.php 

    var aleatorio = parseInt(Math.random()*999999999);
    D=document.getElementById("Tema").value;//se inserta el nombre del libro desde preguntaXXXXXXXX_0O.php.
    E=document.getElementById("ID_Pregunta").value;//se inserta el ID de la pregunta  desde preguntaXXXXXXXX_0O.php.
    H=document.getElementById("ID_PD").value;//se toma el ID de la prueba.
    var url="../../controlador/bloquearPreguntaDemo.php?val_4=" + D + "&val_5=" + E + "&val_6=" + H + "&r=" + aleatorio;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_bloqueo_Demo;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_bloqueo_Demo(){
    if (peticion.readyState == 4){
         if (peticion.status == 200){
           document.getElementById('RespuestaPreguntas').innerHTML=peticion.responseText;//envia respuesta a preguntaXxxxx_00.php
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    
    //Se llama a la función flecha() ubicada en Funciones_varias.js
    setTimeout(flecha,3000);
}