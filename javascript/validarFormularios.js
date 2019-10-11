/*Validar formulario de registro en registro.php*/
function validar_01(){
    var nombre = document.registroGratis.nombre;
    var apellido = document.registroGratis.apellido;
    var correo = document.registroGratis.correo;
    var pais = document.registroGratis.pais;
    var departamento = document.registroGratis.departamento;
    var municipio_Col = document.registroGratis.municipio_Col;
    var iglesia = document.registroGratis.iglesia;
    var clave = document.registroGratis.clave;
    var confirmarClave = document.registroGratis.confirmarClave;
    // var contenidoDiv = document.getElementById("Mostrar_verificaCorreo").innerText; 

    if(nombre.value =="" || nombre.value.indexOf(" ") == 0  || (isNaN(nombre.value)==false) || nombre.value.length>20){
       alert ("Indique su nombre");
       document.getElementById("Nombre").value = "";
       document.getElementById("Nombre").focus();
       return false;
    }
    else if(apellido.value =="" || apellido.value.indexOf(" ") == 0 || (isNaN(apellido.value)==false) || apellido.value.length>20){
       alert ("Indique su apellido");
       document.getElementById("Apellido").value = "";
       document.getElementById("Apellido").focus();
       return false;
    }
    else if(correo.value =="" || correo.value.indexOf(" ") == 0 || correo.value.length > 70){
       alert ("Necesita introducir un correo electronico");
       document.getElementById("Correo").value = "";
       document.getElementById("Correo").focus();
       return false;
    }
    else if(pais.value =="" || pais.value == null || pais.value == 0 || pais.value == "Pais"){
      alert ("Indique su pais");
      document.getElementById("Pais").value = "";
      // document.getElementById("Pais").focus();
      return false;
   }
  //  else if(departamento.value =="" || departamento.value == null || departamento.value == 0 || departamento.value == "Departamento"){
  //    alert("Indique su departamento");
  //    document.getElementById("Departamento").value = "";
  //    // document.getElementById("Departamento").focus();
  //    return false;
  // }
  // else if(municipio_Col.value =="" || municipio_Col.value == null || municipio_Col.value == 0 || municipio_Col.value == "Municipio"){
  //   alert("Indique su municipio");
  //   document.getElementById("Municipio_Col").value = "";
  //   // document.getElementById("Municipio_Col").focus();
  //   return false;
  // }
  else if(iglesia.value =="" || iglesia.value.indexOf(" ") == 0 || (isNaN(iglesia.value)==false) || iglesia.value.length > 20){
    alert ("Indique su iglesia o grupo");
    document.getElementById("Iglesia").value = "";
    // document.getElementById("iglesia").focus();
    return false;
  }
    else if(clave.value =="" || clave.value.indexOf(" ") == 0 || clave.value.length > 20){
      alert ("Introduzca una clave de acceso");
      document.getElementById("Clave").value = "";
      document.getElementById("Clave").focus();
      return false;
    }
    else if(confirmarClave.value =="" || confirmarClave.value.indexOf(" ") == 0 || confirmarClave.value.length>20){
      alert ("Repita para confirmar clave de acceso");
      document.getElementById("ConfirmarClave").value = "";
      document.getElementById("ConfirmarClave").focus();
      return false;
    }
    //verifica que las contraseñas sean iguales, invocada desde registro.php
    else if(clave.value != confirmarClave.value){
      alert("La contraseña no coincide");
      document.getElementById("ConfirmarClave").value = "";
      document.getElementById("ConfirmarClave").focus();
      return false;
    }
    // else if(contenidoDiv.innerText != ""){
    //     alert ("Correo electronico, ya existe");
    //     // document.getElementById("Correo").value = "";
    //     // document.getElementById("Correo").focus();
    //     // document.getElementById("recibir").innerHTML="";
    //     //document.getElementById("recibir").style.color="black";
    //     //document.getElementById("Clave").value = "";
    //     return false;      
    // }
}

//Impide que se inserte un correo invalido invocada desde registro.php
    function validarFormatoCorreo(){ 
          campo = event.target;
          var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            
          if(document.getElementById("Correo").style.backgroundColor == "red"){
            document.getElementById("Correo").value = "";        
            document.getElementById("Correo").style.backgroundColor = "white";
            document.getElementById("Correo").focus();
          }
          else{
            if(emailRegex.test(campo.value)){      
               return true;
            } 
            else{
                alert("Correo no aceptado");      
                document.getElementById("Correo").style.backgroundColor="red"; 
                document.getElementById("Correo").value = "";
            }
          }
        
    }

//---------------------------------------------------------------------------------------------
//Coloca el campo correo en colr white
function ColorearCorreo(){
  document.getElementById("Correo").style.backgroundColor="white";
}
// ---------------------------------------------------------------------------------------------
// llamada desde registro.php
function literal() { 
  var m = document.getElementById("Nombre").value;
  var expreg = /^[A-Za-z,Ñ-ñ]+$/; /*No permite escribir dos palabras, el espacio no es permitido*/
  
  if(!expreg.test(m)){
    alert("El nombre no es correcto");
        document.getElementById("Nombre").value = "";
        document.getElementById("Nombre").focus();
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
      
//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
/*Validar formulario contactenos en contacto.php*/
function validar_02(){
    var nombre = document.Contacto.nombre;
    var apellido = document.Contacto.apellido;
    var correo= document.Contacto.correo;
    var contenido = document.Contacto.contenido;

    if(nombre.value =="" || nombre.value.indexOf(" ") == 0 || (isNaN(nombre.value)==false)  || nombre.value.length>13){
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
    else if(correo.value =="" || correo.value.indexOf(" ") == 0 || (isNaN(correo.value)==false) || correo.value.length>40){
        alert ("Indique su correo");
        document.getElementById("Correo").value = "";
        document.getElementById("Correo").focus();
       return false;
    }
    else if(contenido.value =="" || contenido.value.indexOf(" ") == 0 || (isNaN(contenido.value)==false) || contenido.value.length>1000){
       alert ("El contenido esta vacio o demasiado largo");
       document.getElementById("Contenido").value = "";
       document.getElementById("Contenido").focus();
       return false;
    }
}


//-----------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------