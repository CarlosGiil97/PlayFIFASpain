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

                    <!-- <div class="alert alert-success" id="alert-success" role="alert" ></div>
                    <div class="alert alert-danger" id="alert-danger" role="alert" ></div>
                    <div class="alert alert-secondary" id="alert-secondary" role="alert"></div> -->

                   <?php
                    if (isset($_GET["id"])) {
                    $id = intval(base64_decode($_GET["id"]));
                    $sql = "SELECT * from usuarios where id = :id";
                    try {
                        $stmt = $miDB->prepare($sql);
                        $stmt->bindValue(":id", $id);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        if (count($result) > 0) {
                        if ($result[0]["status"] == "approved") {
							echo '<div class="alert alert-secondary" id="alert-secondary" role="alert" > <b>Cuenta ya verificada anteriormente</b></div>';
							$msgType = "info";
                        } else {
                            $sql = "UPDATE usuarios SET  status =  'approved' WHERE id = :id";
                            $stmt = $miDB->prepare($sql);
                            $stmt->bindValue(":id", $id);
                            $stmt->execute();
                            // echo '<script type="text/javascript">document.getElementById("alert-success").innerHTML = "<b>Tu cuenta se ha confirmado correctamente <img src="https://img.icons8.com/ios/50/000000/ok--v1.png"/>.Ya puede < a href="#">iniciar sesión.</a></b>";</script>';
							echo '<div class="alert alert-success" id="alert-success" role="alert" > <b>Cuenta verificada correctamente.<a href="#">Inicie sesión</a></b></div>';

                            // $msg = "Tu cuenta ha sido activada";

                            // $msgType = "success";
                        }
                        } else {

							echo '<div class="alert alert-danger" id="alert-danger" role="alert" > <b>Ha ocurrido un error.Inténtelo de nuevo</b></div>';

                        // $msgType = "warning";
                        }
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                    }
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