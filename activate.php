<!DOCTYPE HTML>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<?php
require_once('php/conex.php');
$miDB = conexion();
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

						<a href="index.html" class="logo">PlayFIFASpain</a>

					</header>



				<!-- Nav -->

					<nav id="nav">

						<ul class="links">

							<li><a href="index.html">This is Massively</a></li>

							<li><a href="generic.html">Generic Page</a></li>

							<li class="active"><a href="#">Verificación de cuenta</a></li>

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

                    <div class="alert alert-success" id="alert-success" role="alert" ></div>
                    <div class="alert alert-danger" id="alert-danger" role="alert" ></div>
                    <div class="alert alert-secondary" id="alert-secondary" role="alert"></div>

                   <?php
                    mysql_connect("localhost", "id15424712_databasa_username", "Usuario1.?--") or die(mysql_error()); // Connect to database server(localhost) with username and password.
					mysql_select_db("id15424712_database_fifa") or die(mysql_error()); // Select registration database.
								 
					if(isset($_GET['id'])){
						// Verify data
						$id = intval(base64_decode($_GET["id"]));								 
						$search = mysql_query("SELECT id FROM usuarios WHERE id='".$id."' AND status='pending'") or die(mysql_error()); 
						$match  = mysql_num_rows($search);
									 
						if($match > 0){
							// We have a match, activate the account
							mysql_query("UPDATE usuarios SET status='approved' WHERE id='".$id."'  AND status='pending'") or die(mysql_error());
							echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
						}else{
							// No match -> invalid url or account has already been activated.
							echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
						}
									 
					}else{
						// Invalid approach
						echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
					}

                    ?>
						<!-- Post -->
<!-- 
							<section class="post">
								


							</section>
 -->


					</div>



				<!-- Footer -->

					<!-- <footer id="footer">

						

								<h3>Social</h3>

								<ul class="icons alt">

									<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>

									<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>

									<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>

									<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>

								</ul>

							</section>

						</section>

					</footer> -->



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