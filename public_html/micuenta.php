<?php 
session_start();  
// include("php/conex.php");
include("php/conex.php");

?>
<!DOCTYPE HTML>
<!--

	Massively by HTML5 UP

	html5up.net | @ajlkn

	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)

-->

<html>

	<head>

		<title>Massively by HTML5 UP</title>

		<meta charset="utf-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<link rel="stylesheet" href="assets/css/main.css" />

		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	</head>

	<body class="is-preload">



		<!-- Wrapper -->

			<div id="wrapper" class="fade-in">



				<!-- Intro -->

					<div id="intro">

						<h1>This is<br />

						Massively</h1>

						<p>A free, fully responsive HTML5 + CSS3 site template designed by <a href="https://twitter.com/ajlkn">@ajlkn</a> for <a href="https://html5up.net">HTML5 UP</a><br />

						and released for free under the <a href="https://html5up.net/license">Creative Commons license</a>.</p>
						
						<ul class="actions">

							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>

						</ul>

					</div>



				<!-- Header -->

					<header id="header">

						<a href="index.html" class="logo">Massively</a>

					</header>



				<!-- Nav -->

					<nav id="nav">

						<ul class="links">

							<li class="active"><a href="index.html">Mi perfil</a></li>
<!-- 
							<li><a href="generic.html">Generic Page</a></li>

							<li><a href="elements.html">Elements Reference</a></li>
							<li><a href="conexion.php">Prueba conexión con BD</a></li>
							<li><a href="micuenta.php">Mi cuenta</a></li> -->

						</ul>

						<ul class="icons">

							<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>

							<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>

							<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>

							<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>

						</ul>

					</nav>



				<!-- Main -->

					<div id="main">



						<!-- Featured Post -->

							

								<!-- <header class="major"> -->

									<!-- <span class="date">April 25, 2017</span> --><?php
									
								if($_SESSION == null){?>
								<script>
								jQuery('major').css({'background-color': '#f34848','border-radius': '4px'});
								</script>
								<article class="post featured">
								<header class="major" style="background-color:#bfeac6 !important;border-radius:4px !important;padding: 75px;">
									<h2>¿Eres miembro de PlayFIFASpain?</h2>
									<h5>Si ya formas parte de PlayFIFASpain , tan solo inicia sesión<br>
									 <input type="button" value="Iniciar sesión" style="margin-top:15px !important;margin-bottom:15px !important" class="homebutton" id="btnHome" onClick="document.location.href='login/index.php'" /><br>
									Si aún no tienes cuenta , puedes registrarte desde <a  href="conexion.php">aquí</a><br>
									A que esperas para unirte?😏</h5><br>
									<input type="button" value="Registro" style="margin-top:15px !important;margin-bottom:15px !important" class="homebutton" id="btnHome" onClick="document.location.href='conexion.php'" /><br>
									</header>
								</article>

									<?php
								}else{ ?>
									<footer id="footer">
									<section>
											<div class="fields">
												<div class="field">
													<h3 style="font-size:1.5rem !important;color:black !important">Bienvenido <?php echo $_SESSION['sesion']['username'] ?> </h3>
												</div>
												<div class="field">
												<h4>Datos personales:</h4>
												<h5 style="color:black !important"><i class="far fa-envelope"></i><input type="text" value="<?php echo $_SESSION['sesion']['email']; ?>" disabled></input></h5>												</div>
												<div class="field">
												<h5 style="color:black !important"><i class="fas fa-key"></i><input type="password" value="<?php echo md5($_SESSION['sesion']['contrasena']); ?>" disabled></input></h5>
												</div>
											</div>
											<div class="field">
											<h4 style="color:#3287dc !important">Vinculación cuenta PSN:</h4><br>
											
											<i class="fab fa-playstation"></i>
											<div style="display:flex">
											<?php
											$miDB = conexion();
											$id=$_SESSION['sesion']['id'];
											$stmt = $miDB->query("SELECT * FROM usuario_psn WHERE id = ".$id."");
											$user = $stmt->fetch();
											if($user){ ?>
											<input id="updatepsn" style="text-align:center;margin-bottom: 10px;font-family: 'Source Sans Pro';" name="updatepsn" value ="<?php echo $_SESSION['sesion']['usuario_psn']?>" type="text" disabled>
											<?php
											}else{
												?>
												<input id="psn" name="psn" type="text"><input id="psnboton" type="submit" value="Vincular" />
											<?php
											}
												?>											
											</div>											
											
											<!-- Para insertar el ID_PSN en la tabla -->
											<script>
											$(document).ready(function() {
												$('#psnboton').on('click', function() {
													var psn = $('#psn').val();
													
													if(psn!=""){
														$.ajax({
															url: "add-psn.php",
															type: "POST",
															data: {
																psn: psn,			
															},
															cache: false,
															success: function(dataResult){
																if(dataResult){
																	
																	window.location.reload();
																}
																else if(dataResult.statusCode==201){
																alert("Error occured !");
																}
																
															}
														});
													}
													else{
														alert('Please fill all the field !');
													}
												});
											});
											</script>
											
							
											
											</div>
											<div class="field">
												<input style="width:100%" type="submit" value="Programar entrenamiento"  onclick="location.href='entrenamientos.php';"  />
												<input style="width:100%" type="submit" value="Historial de partidos" />
											</div>
										
									</section>
									<section class="split contact">
										<section class="alt">
											<?php 
											$nombre_fichero = './images/perfil/'.$_SESSION['sesion']['username'].'.png';
											// echo $nombre_fichero;
											if (file_exists($nombre_fichero)) {
												
												echo "<img style='border-top-left-radius: 50% 50%;border-top-right-radius: 50% 50%;
												border-bottom-right-radius: 50% 50%;
												border-bottom-left-radius: 50% 50%' src='".$nombre_fichero."'>";
											}else{?>
												 <input type="file" id="photo"><br/>
												 <span id="msg" ></span><br/>

												 <script>
												 $(document).ready(function(){
												$(document).on('change','#photo',function(){
													var property = document.getElementById('photo').files[0];
													var image_name = property.name;
													var image_extension = image_name.split('.').pop().toLowerCase();

													if(jQuery.inArray(image_extension,['gif','jpg','jpeg','png']) == -1){
													alert("Invalid image file");
													}

													var form_data = new FormData();
													form_data.append("file",property);
													$.ajax({
													url:'upload.php',
													method:'POST',
													data:form_data,
													contentType:false,
													cache:false,
													processData:false,
													beforeSend:function(){
														$('#msg').html('<b>Subiendo......</b>');
													},
													success:function(data){
														location.reload();
													}
													});
												});
												});
											</script>
												
											<?php }
											?>
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
<?php
								}
								?>
								


								




					

						<!-- Footer -->




					</div>



				<!-- Footer -->

					


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