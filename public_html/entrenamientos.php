<?php 
session_start();  
// include("php/conex.php");
include("php/conex.php");
$miDB=conexion();
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

							<li class="active"><a href="index.html">Entrenamientos</a></li>
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

									<!-- <span class="date">April 25, 2017</span> -->
									
							

								
									<footer id="footer" style="background-color:white !important">
									<section style="padding:27px !important">
                                    <h2 style="text-align:center">Programar entrenamiento</h2>
                                    <p style="text-align:justify;font-family: system-ui;font-size: 15px;">Añade un reto 1vs1 al tablón de FIFA 21 para la fecha que deseé.Cualquier jugador de la comunidad podrá aceptar el desafío y podreis 
                                    realizar un partido de entrenamiento ⚽🕹<br>
                                    🔸Los partidos serán a BO3<br>
                                    🔸En caso de no jugar el 3 partido se deja vacio el resultado</p>
                                    
                                    <p  style="text-align:justify;font-family: system-ui;font-size: 15px;"><b>¿Para cuando quieres progamar el entrenamiento?</b></p>
                                    <!-- Paso el dia actual de manera oculta al usuario -->
                                    <div style="display:flex">
                                    <input  id="fecha_actual" type="hidden" value="'<?php echo date("d") . "/" . date("m") . "/" . date("Y");?>'">
                                        <input style="width:30%" type="time" step="3600" name="hora_partido" id="hora_partido"><input style="width:75%" type="button" id="añadir-partido" name="añadir-partido" value="Añadir">
                                       
                                    </div>
                                    <div id="correcto" style="background-color: #9fff99;border-radius: 3px;display:none;margin-top: 8px;"></div> 
                                    <br>
                                    <p style="text-align:center"><a href="tablon.php"><b>VER PARTIDOS DISPONIBLES 🕐</b></a></p>
                                     <!-- Para insertar el ID_PSN en la tabla -->
											<script>
											$(document).ready(function() {
												$('#añadir-partido').on('click', function() {
													var hora_partido = $('#hora_partido').val();
													if(hora_partido!="" && fecha_actual!=""){
														$.ajax({
															url: "anadir_a_tablon.php",
															type: "POST",
															data: {
																hora_partido: hora_partido
															},
															cache: false,
															success: function(dataResult){
																if(dataResult){
																	$('#añadir-partido').prop("disabled", true);
                                                                    $('#hora_partido').prop("disabled", true);
                                                                    $('#correcto').css({'display':'inherit'});
																	$('#correcto').html('Reto añadido correctamente en el tablon ! <a href="tablon.php">Ver</a>');
																}
																else{
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
									</section>
									<section class="split contact">
										<section class="alt">
											<h2>Mis estadísticas en entrenamientos</h2>
											
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