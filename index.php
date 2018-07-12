<?php
	require_once('functions.php');

	if (!estaLogueado()) {
		header('location: login.php');
		exit;
	}
	$usuario = traerPorUsername($_SESSION['username']);

 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>BikeKing's e-Shop - HOME</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
<body>
	<div class="container">
		<header class="main-header">
			<img class="logo" src="img/logoConNombre.svg" alt="logo" width="100">
			<a href="#" class="toggle-nav">
				<span class="ion-navicon-round"></span>
			</a>
			<nav class="main-nav">
				<ul>
					<li><a href="#">HOME</a></li>
					<li><a href="productos.php">PRODUCTOS</a></li>
					<li><a href="faq.php">FAQ's</a></li>
					<?php if (isset($_SESSION['username'])): ?>
						<li><a> Hola <?=$usuario['username']?></a></li>
						<li><a href="logout.php">CERRAR SESIÓN</a></li>
					<?php else: ?>
						<li><a href="register.php">REGISTRO</a></li>
						<li><a href="login.php">Log in</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		</header>
		<?php if (isset($_GET['bienvenido'])): ?>
			<h2 class="registroExitoso">Registro exitoso! Bienvenido a BikeKing</h2>
		<?php endif; ?>
		<?php if (isset($_GET['logueoExitoso'])): ?>
			<h2 class="registroExitoso">Logueo exitoso! Bienvenido, <?php echo $usuario['username'] ?> a BikeKing</h2>
		<?php endif; ?>
		<section class="banner">
			<img src="img/banner01.png" alt="banner">
		</section>

		<footer class="main-footer">
			<article class="footer_lef">Contacto</article>
			<article class="footer_rig">Ubicación
				<div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.331313980621!2d-58.383861985103444!3d-34.62106686592263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb28ea8781cb%3A0x950feb519009506e!2sLima+1111%2C+C1073AAW+CABA!5e0!3m2!1ses-419!2sar!4v1528223819043" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></div>
			</article>
		</footer>
	</div>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		$('.toggle-nav').click(function () {
			$('.main-nav').slideToggle();
		});
	</script>
</body>
</html>
