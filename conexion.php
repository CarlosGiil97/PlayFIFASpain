<!DOCTYPE HTML>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<?php
require_once('php/conex.php');
?>
<!--

	Massively by HTML5 UP

	html5up.net | @ajlkn

	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)

-->

<html>

	<head>

		<title>Elements Reference - Massively by HTML5 UP</title>

		<meta charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="assets/css/main.css" />

		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

	</head>

	<body class="is-preload">



		<!-- Wrapper -->

			<div id="wrapper">



				<!-- Header -->

					<header id="header">

						<a href="index.html" class="logo">Massively</a>

					</header>



				<!-- Nav -->

					<nav id="nav">

						<ul class="links">

							<li><a href="index.html">This is Massively</a></li>

							<li><a href="generic.html">Generic Page</a></li>

							<li class="active"><a href="elements.html">Elements Reference</a></li>

						</ul>

						<ul class="icons">

							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>

							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>

							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>

							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>

						</ul>

					</nav>



				<!-- Main -->
					</html>
					
					<div id="main">



						<!-- Post -->

							<section class="post">
								<form id="userForm" method="POST" enctype="multipart/form-data">
								<h2>Regístrate para poder jugar:</h2>
									<label >Correo electrónico:</label>
									<input placeholder="Introduzca su correo ..." type="email" id="email" name="email"><br>
									<label >Username:</label>
									<input placeholder="Nombre de usuario ..." type="text"  id="username" name="username"><br>
									<label >Fecha de nacimiento:</label>
									<input style="border: 0.5px solid #eeeeee;"  type="date" id="fechadenacimiento" name="fechadenacimiento"><br><br>

									<label >Contraseña:</label>
									<input placeholder="Introduzca su contraseña" onfocus="onFocus()" onblur="onBlur()" onkeyup="onkeyUp(this)" type="password" id="contrasena" name="contrasena" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
									<div class="alert alert-info" id="checkpass1" role="alert" style="display:none">
									<h5>La contraseña debe tener:</h5>
										<p style="margin:0" id="letter" class="invalid"><b>Una letra minuscula</b> </p>
										<p  style="margin:0" id="capital" class="invalid"><b>Una letra mayuscula</b></p>
										<p  style="margin:0" id="number" class="invalid"><b>Un número</b></p>
										<p  style="margin:0" id="length" class="invalid"><b>Minimo 8 carácteres</b></p>
									</div>	
									<label >Repite contraseña:</label>
									<input placeholder="Repita su contraseña" type="password" onkeyup="checkpass()" id="contrasena1" name="contrasena1"><br>
									
									<div class="alert alert-danger" id="checkpass" role="alert" style="display:none"></div>									
									
									<input class="button primary" name="submit" type="submit" id="butsave" name="butsave" disabled/></form>
									<div id="msg"></p>
									<div class="alert alert-success" id="registrocorrecto" role="alert" style="display:none"></div>
									<div class="alert alert-danger" id="registrofallido" role="alert" style="display:none"></div>


									<script>
								$(document).on('submit','#userForm',function(e){
								e.preventDefault();
							
								$.ajax({
								method:"POST",
								url: "php/save.php",
								data:$(this).serialize(),
								success: function(data){
									alert(data);
									var obj = JSON.parse(data);
									alert(obj.clave);
								if(obj.clave=='Correcto'){
								$('#userForm').css({'display':'none'})
								$('#registrocorrecto').css({'display':'block'})
								$('#registrocorrecto').html('<b>Datos agregados correctamente! Se le ha enviado un correo para confirmar el registro</b>'); 						
							} 
							if(obj.clave=='Repetido'){
								$('#registrofallido').css({'display':'block'})
								$('#registrofallido').html('Email existente !'); 
							} 
							 if(obj.clave=='ErrorDistinto'){
								$('#registrofallido').css({'display':'block'})
								$('#registrofallido').html('Ha ocurrido un error ,pruebe de nuevo !'); 
							}
							// else {
							// 	$('#registrofallido').css({'display':'block'})
							// 	$('#registrofallido').html('Email existente !'); 
								
							// }

							}});
						});
									</script>
									
										<?php
								// if (isset($_POST['submit'])) {
								// 	$email = $_POST['email'];
								// 	$username = $_POST['username'];
								// 	$fechanacimiento = $_POST['fechadenacimiento'];
								// 	$password = $_POST['password'];
								// 	// $password1 = $_POST['password1'];
								// 	// echo $example . " " . $example2. " ". $example3 . " ". $example4 . " " . $example5;
								// 	var_dump($_POST);
								// 	var_dump($_FILES["imagen_perfil"]['tmp_name']);
								// 	//directorio para subir la imagen de perfil
								// 	$dir_subida = '/images/perfil/';
								// 	//para moverlo a esa ruta y cambiarle el nombre
								// 	$nombre_archivo = $username;
								// 	move_uploaded_file($_FILES['imagen_perfil']['tmp_name'],  './images/perfil/' . $nombre_archivo.'.png');
								// 	//insertar datos del usuario registrado en la base de datos ,en la tabla usuarios
								// 	$arrayDatosInsertar = [
								// 		'email' => $email,
								// 		'username' => $username,
								// 		'fechanacimiento' => $fechanacimiento,
								// 		'password' => $password
								// 	];
								// 	$sql = "INSERT INTO usuarios (email,username,fechadenacimiento,password) VALUES (:email, :username, :fechanacimiento, :password)";
								// 	$stmt= $cn->prepare($sql);
								// 	$stmt->execute($arrayDatosInsertar);
								// } 
								?>

							</section>



					</div>



				<!-- Footer -->

					<footer id="footer">

						<section>

							<form method="post" action="#">

								<div class="fields">

									<div class="field">

										<label for="name">Name</label>

										<input type="text" name="name" id="name" />

									</div>

									<div class="field">

										<!-- <label for="email">Email</label>

										<input type="text" name="email" id="email" /> -->

									</div>

									<div class="field">

										<label for="message">Message</label>

										<textarea name="message" id="message" rows="3"></textarea>

									</div>

								</div>

								<ul class="actions">

									<li><input type="submit" value="Send Message" /></li>

								</ul>

							</form>

						</section>

						<section class="split contact">

							<section class="alt">

								<h3>Address</h3>

								<p>1234 Somewhere Road #87257<br />

								Nashville, TN 00000-0000</p>

							</section>

							<section>

								<h3>Phone</h3>

								<p><a href="#">(000) 000-0000</a></p>

							</section>

							<section>

								<h3>Email</h3>

								<p><a href="#">info@untitled.tld</a></p>

							</section>

							<section>

								<h3>Social</h3>

								<ul class="icons alt">

									<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>

									<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>

									<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>

									<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>

								</ul>

							</section>

						</section>

					</footer>



				<!-- Copyright -->

					<div id="copyright">

						<ul><li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li></ul>

					</div>



			</div>



		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>

			<script src="assets/js/jquery.scrollex.min.js"></script>

			<script src="assets/js/jquery.scrolly.min.js"></script>

			<script src="assets/js/browser.min.js"></script>

			<script src="assets/js/breakpoints.min.js"></script>

			<script src="assets/js/util.js"></script>

			<script src="assets/js/main.js"></script>



	</body>

</html>