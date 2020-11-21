

//Función check pass en login
var myInput = document.getElementById("contrasena");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
function onFocus() {
    document.getElementById("checkpass1").style.display = "block";
  }

function onBlur() {
    document.getElementById("checkpass1").style.display = "none";
  }

 function onkeyUp(e) {

    valorinput =e.value;
    var lowerCaseLetters = /[a-z]/g;
    if(valorinput.match(lowerCaseLetters)) {
      jQuery('#letter').removeClass("invalid");
      jQuery('#letter').addClass("valid");
    } else {
        jQuery('#letter').removeClass("valid");
        jQuery('#letter').addClass("invalid");

  }
  
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(valorinput.match(upperCaseLetters)) {
        jQuery('#capital').removeClass("invalid");
        jQuery('#capital').addClass("valid");

    } else {
        jQuery('#capital').removeClass("valid");
        jQuery('#capital').addClass("invalid");

    }
  
    // Validate numbers
  var numbers = /[0-9]/g;
  if(valorinput.match(numbers)) {
    jQuery('#number').removeClass("invalid");
        jQuery('#number').addClass("valid");

    } else {
        jQuery('#number').removeClass("valid");
        jQuery('#number').addClass("invalid");

    }
  
    // Validate length
    if(valorinput.length >= 8) {
        jQuery('#length').removeClass("invalid");
        jQuery('#length').addClass("valid");

    } else {
        jQuery('#length').removeClass("valid");
        jQuery('#length').addClass("invalid");
        

    }
  }

function checkpass(){
    var contrasena = document.getElementById("contrasena").value;  
    var contrasena1 = document.getElementById("contrasena1").value;  
    if(contrasena != contrasena1)  
    {   jQuery('#checkpass').css({'display':'block'});
        document.getElementById("checkpass").innerHTML='Las contraseñas no coinciden';  
    } else {  
        document.getElementById("checkpass").innerHTML=''; 
        jQuery('#checkpass').css({'display':'none'});
        document.getElementById("butsave").disabled = false;

    }  
}