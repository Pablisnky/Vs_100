/*Validar formulario de registro en registro.php*/
function validar_01(){
    var nombre = document.registroGratis.nombre;
    var apellido = document.registroGratis.apellido;
    var pais = document.registroGratis.pais;
    var correo = document.registroGratis.correo;
    var clave = document.registroGratis.clave;
    var contenidoDiv = (document.getElementById("recibir").innerHTML);  

    
    if(nombre.value =="" || (isNaN(nombre.value)==false) || nombre.value.length>13){
       alert ("Indique su nombre");
       document.getElementById("Nombre").value = "";
       document.getElementById("Nombre").focus();
       return false;
    }
    else if(apellido.value =="" || apellido.value.indexOf(" ") == 0 || (isNaN(apellido.value)==false) || apellido.value.length>13){
       alert ("Indique su apellido");
       document.getElementById("Apellido").value = "";
       document.getElementById("Apellido").focus();
       return false;
    }
   else if(pais.value=="Seleccione pais"){ 
       alert ("Indique su Pais");
       document.getElementById("Pais").value = "";
       document.getElementById("Pais").focus();
       return false;
    } 
    else if(correo.value =="" || correo.value.indexOf(" ") == 0 || (isNaN(correo.value)==false) || correo.value.length>3000){
       alert ("El correo esta vacio");
       document.getElementById("Correo").value = "";
       document.getElementById("Correo").focus();
       return false;
    }
     else if(clave.value =="" || clave.value.indexOf(" ") == 0 || clave.value.length>3000){
       alert ("Necesita introducir un correo electronico");
       document.getElementById("Clave").value = "";
       document.getElementById("Clave").focus();
       return false;
    }
     else if((contenidoDiv =="La dirección de correo electronico ya existe")) {
       alert ("Necesita introducir un correo electronico");
       document.getElementById("Correo").value = "";
       document.getElementById("Correo").focus();
       document.getElementById("recibir").innerHTML="";
       //document.getElementById("recibir").style.color="black";
       //document.getElementById("Clave").value = "";
       return false;
    }
}


// llamada desde registro.php
function literal() { 
  var m = document.getElementById("Nombre").value;
  var expreg = /^[A-Za-z,Ñ-ñ]+$/; /*Solo acepta mayusculas la coma se salta el filtro*/
  
  if(!expreg.test(m)){
    alert("El nombre NO es correcto");

        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
      }
} 

// llamada desde registro.php
function literal_2() { 
  var m = document.getElementById("Apellido").value;
  var expreg = /^[A-Za-z,Ñ-ñ]+$/; /*Solo acepta mayusculas la coma se salta el filtro*/
  
  if(!expreg.test(m)){
    alert("El apellido NO es correcto");

        document.getElementById("Apellido").value = "";
        document.getElementById("Apellido").focus(); 
      }
}

function literal_3(){ 
  var m = document.getElementById("Clave").value;
  var re = /^[\w ]+$/; /*Solo acepta caracrteres alfanumericos la coma se salta el filtro*/
  
  if(!re.test(m)){
    alert("Solo introduzca letras y numeros en su contraseña");

        document.getElementById("Clave").value = "";
        document.getElementById("Clave").focus();
        return false;
      }
} 

/*Validar formulario de login en principal.php*/
function validar_02(){
    var correo = document.getElementById("Correo");
    var clave = document.getElementById("Clave"); 

    if(correo.value =="" || correo.value.indexOf(" ") == 0 || (isNaN(correo.value)==false) || correo.value.length>80){
       alert ("El correo no es valido");
       document.getElementById("Correo").value = "";
       document.getElementById("Correo").focus();
       return false;
    }
     else if(clave.value =="" || clave.value.indexOf(" ") == 0 || clave.value.length>15){
       alert ("Clave invalida");
       document.getElementById("Clave").value = "";
       document.getElementById("Clave").focus();
       return false;
    }
}
      