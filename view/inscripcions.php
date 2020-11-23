<!DOCTYPE html>
<html lang="es">

<head>
	<title>Proyecto 1</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Estilos enlazados-->
	<link rel="stylesheet" type="text/css" href="../css/estilos_insc.css">
	<script src="../js/code.js"></script>
</head>
<body>

	<div class="header">
		<div class="logo">
			<img src="../img/logo.png" width="110px" height="30px"
				style='float: left;margin-left: 15px; margin-top: 20px;'></img>
		</div>
		<nav class="menu-main">
			<a href="../index.html">Inici</a>
			<a href="#">Classificacions</a>
			<a href="">Inspripcions</a>
			<a href="#">Noticies</a>
			<a href="#">Galeria</a>
		</nav>
		<div class="idioma">
			<select>
				<option>Español</option>
				<option>Catalan</option>
				<option>Ingles</option>
				<option>Frances</option>
				<option>Italiano</option>
			</select>
			<input type="button" value="Enviar">
		</div>
		<div class="logohospi">
			<img src="img/logohospi.png"></img>
		</div>
	</div>
	<div class="contenedorinicio">
		<br>
		<h2>Formulari d'Inscripció</h2>
		<div class="iniciocentra">
			<img src="../img/persona.png">
			<div class="inicioderecha">
				<div class="form">
					<?php
						if (isset($_GET['dni'])) {
							$dni=$_GET['dni'];
							echo "<p style='color:green;'>El participante con dni: ".$dni." se ha inscrito correctamente.</p>";
						}
						if (isset($_GET['ins'])) {
							echo "<p style='color:red;'>El dni que quiere inscribir ya se encuentra inscrito en esta cursa.</p>";
						}
						if (isset($_GET['err'])) {
							echo "<p style='color:red;'>La edad introducida no corresponde a ninguna categoria, lamentamos que no pueda competir, y le animamos que a que lo intente en próximos años.</p>";
						}
					?>
					<form action="inscripcions.php" method="POST" onsubmit="return validacionForm()">
						<label>DNI</label>
						<input type="text" id="dni" name="dni">

						<label>Nom</label>
						<input type="text" id="nom" name="nom">

						<label>1r Cognom</label>
						<input type="text" id="cognom1" name="cognom1">

						<label>2n Cognom</label>
						<input type="text" id="cognom2" name="cognom2">

						<label>Email</label>
						<input type="email" id="email" name="email">

						<label>Data naixement</label>
						<input type="date" id="data" name="data">

						<label>Sexe</label>
						<select class="selects" id="sexe" name="sexe">
						<option value="Home">Home</option>
						<option value="Dona">Dona</option>
						</select>

						<label>Discapacitat</label>
						<select class="selects" id="disc" name="disc">
						<option value="No">No</option>
						<option value="Si">Si</option>
						</select>
					
						<input type="submit" value="Inscribir">
						<div id="message"></div>
					</form>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
	</div>
	
	<?php
	if (isset($_POST['dni'])) {
		require_once '../model/inscripcioDAO.php';
        $inscripcioDAO = new InscripcioDAO();
        $inscripcioDAO->inscripcio();
	}
	?>
	<footer class="footer-distributed">

		<div class="footer-left">

			<h3>Cursa <span>Bellvitge</span></h3>

			<p class="footer-links">
				<a href="#">Inici</a>
				·
				<a href="#">Classificacions</a>
				·
				<a href="#">Inscripcions</a>
				·
				<a href="#">Noticies</a>
				·
				<a href="#">Login - Admin</a>
				·
				<a href="#">FeedBack</a>
			</p>

			<p class="footer-company-name">Copyright &copy; 2020 Cursa Bellvitge</p>
		</div>

		<div class="footer-center">
			<div>
				<h3>Contacto</h3>
			</div>
			<div>
				<i class="fa-map-marker"></i>
				<p><span>Av. Mare de Déu de Bellvitge, 100</span> L'Hospitalet de Llobregat, España</p>
			</div>

			<div>
				<i class="fa-phone"></i>
				<p>+34 93 665 26 21</p>
			</div>

			<div>
				<i class="fa-envelope"></i>
				<p><a href="contacto@cursabellvitge.com">contacto@cursabellvitge.com</a></p>
			</div>

		</div>

		<div class="footer-right">

			<p class="footer-company-about">
				<span>Sobre la cursa</span>
				Organitzada per l’AMPA Jesuïtes Bellvitge – C.E. Joan XXIII, la cursa tindrà lloc el proper diumenge 10
				de maig 2020 al matí i donarà tots els diners recaptats a la Fundació La Vinya.
			</p>

			<div class="footer-icons">

				<a href="https://www.facebook.com/"><img src="../img/facebook.png" alt="Facebook" /><i
						class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/"><img src="../img/twitter.png" alt="Twitter" /><i
						class="fa fa-twitter"></i></a>
				<a href="https://www.instagram.com/"><img src="../img/instagram.png" alt="Instagram" /><i
						class="fa fa-instagram"></i></a>

			</div>

		</div>

	</footer>
</body>

</html>