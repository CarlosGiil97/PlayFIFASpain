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

                            <li class="active"><a href="index.html">Tablón de partidos de entrenamiento</a></li>
                           
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
									
                                    <br>
                        <section>
                            <table style="text-align:center;font-family: 'Source Sans Pro';">
                                <tbody>
                                <tr>
                                <td><div style="align-items:center">RIVAL<img src="./images/psn.png" width=25px height=25px></div></td>
                                <td>HORA</td>
                                <td>INFORMACIÓN</td>
                                </tr>
                                <?php
                                $partidos_disponibles = $miDB->query("SELECT * FROM partidos_entrenamiento WHERE estado='pendiente'",PDO::FETCH_ASSOC);
                                $numeropartidos = $partidos_disponibles->rowCount();
                                foreach ($partidos_disponibles as $row1) {
                                 echo "<tr>";
                                 $query = "SELECT usuario_psn FROM usuario_psn WHERE id=".$row1['id_local']."";
                                 $query = $miDB->prepare($query); 
                                 $params=[];
                                $query->execute($params) ; 
                                $total = $query->fetchColumn();
                                echo "<td>".$total."</td>"; 
                                // $miDB->query("SELECT usuario_psn FROM usuario_psn WHERE id=".$row1['id_local']."");
                                //  echo "<td>".$miDB->query("SELECT usuario_psn FROM usuario_psn WHERE id=".$row1['id_local']."")."</td>";
                                 echo "<td>".$row1['hora_partido']."</td>";
                                 echo "<td><button type='button' class='btn btn-success'>Jugar</button></td>";
                                 echo "</tr>";
                                }
                                ?>
                                </tbody>
                                </table>
                            </section>

								
									<footer id="footer" style="background-color:white !important">
									<section style="padding:27px !important">
                                 
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