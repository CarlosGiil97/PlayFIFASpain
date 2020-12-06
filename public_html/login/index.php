<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/jquery.ui.shake.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<script>
	 function verpass(){
            var x = document.getElementById("password");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }
</script>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90" data-anijs="if: click, do: flipInY animated>
				<form class="login100-form validate-form flex-sb flex-w" >
					<span class="login100-form-title p-b-51">
						Inicia sesión
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Usuario es obligatorio">
						<input class="input100" type="text" id="username" name="username" placeholder="Usuario">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "	Contraseña es obligatorio">
						<input class="input100" type="password" id="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>
					<input type="checkbox" class="input-checkbox100" Ver contraseña>
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input onclick="verpass()" class="input-checkbox100" id="ckb1" type="checkbox" name="verpass">
							<label class="label-checkbox100" for="ckb1">
								Ver contraseña
							</label>
						</div>
					
					
					

						<div>
							<a href="#" class="txt1">
								Forgot?
							</a>
						</div>
					</div>
					<div class="respuesta" id="respuesta"></div>
					<div class="container-login100-form-btn m-t-17">
						<button id="botonlogin" class="login100-form-btn">
							Iniciar sesión 
						</button>
					</div>

				</form>
				<script>
				$(document).ready(function() 
					{

					$('#botonlogin').click(function()
					{
					var username=$("#username").val();
					var password=$("#password").val();
					var dataString = 'username='+username+'&password='+password;
					if($.trim(username).length>0 && $.trim(password).length>0)
					{
					$.ajax({
					type: "POST",
					url: "ajaxLogin.php",
					data: dataString,
					cache: false,
					beforeSend: function(){ $("#botonlogin").val('Conectando ...');},
					success: function(data){
					if(data)
					{
					
						location.href = '../index.php';

					}
					else
					{
					//Shake animation effect.
					$(".wrap-login100").click ();
					$("#respuesta").html("<span style='color:#cc0000'><b>ERROR:</span> Nombre o contraseña incorrecta.</b>");
					}
					}
					});

					}
					return false;
					});

					});
					</script>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>