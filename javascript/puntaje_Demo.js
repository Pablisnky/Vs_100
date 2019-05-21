	var http_request = false;
    var peticion= conexionAJAX();

    function conexionAJAX(){
        http_request = false;
        if (window.XMLHttpRequest){ // Mozilla, Safari,...
            http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType){
                http_request.overrideMimeType('text/xml');
            }
        } 
        else if (window.ActiveXObject){ // IE
            try {
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            } 
            catch (e){
                try{
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                } 
                catch (e) {}
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
//--------------------------------------------------------------------------------------------------------------------
function llamar_puntaje(){//funcion invocada en preguntaXxxxxx_00.php
    var aleatorio = parseInt(Math.random()*999999999);
    C=document.getElementById("ID_Participante").value;//se inserta el ID_Participante desde preguntaXxxxxxx_00.php.
    var url="../../controlador/sumaPuntaje.php?val_3=" + C  + "&r=" + aleatorio;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_puntaje;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_puntaje(){
    if (peticion.readyState == 4){
         if (peticion.status == 200){
           document.getElementById('mostrarPuntos').innerHTML=peticion.responseText;//se recoje 
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
}