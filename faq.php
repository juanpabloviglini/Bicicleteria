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
		<title>BikeKing's e-Shop - FAQ's</title>
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
					<li><a href="index.php">HOME</a></li>
					<li><a href="productos.php">PRODUCTOS</a></li>
					<li><a href="#">FAQ's</a></li>
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

		<section class="preguntas">
			<h2 class=" titulo">PREGUNTAS FRECUENTES</h2>
			<a href="#" class="toggle1">
			<div class="pregunta1"><h3>¿CÓMO COMPRAR?</h3></div>
			</a>
			<div class="respuesta1"><p>Deberás registrarte para poder tener tu usuario personal.</p></div>

			<a href="#" class="toggle2">
			<div class="pregunta2"><h3>¿DEBO REGISTRARME CON UNA TARJETA DE CRÉDITO?</h3></div>
			</a>
			<div class="respuesta2"><p>Sí, al momento de registrarte te pediremos una tarjeta de crédito, débito o cuenta bancaria valida para tener tu info llegado el momento de tu compra.</p></div>

			<a href="#" class="toggle3">
			<div class="pregunta3"><h3>YA ELEGÍ MI PRODUCTO, ¿CÓMO REALIZO LA COMPRA?</h3></div>
			</a>
			<div class="respuesta3"><p>Una vez elegido el producto, hacé click en el botón "AGREGAR" y seleccion+á la cantidad de unidades. Si querés agregar otros artículos, elegí la opción "Seguir comprando". Una vez seleccionados todos los productos, volvé a tu Carrito y hacé click en "PAGAR". Allí deberás completar todos tus datos, fundamentales para ponernos en contacto y realizar tu envío.</p></div>

			<a href="#" class="toggle4">
			<div class="pregunta4"><h3>¿QUÉ FORMAS DE PAGO PUEDO ELEGIR?</h3></div>
			</a>
			<div class="respuesta4"><p>Una vez ingresados tus datos, podrás elegir la forma de pago más conveniente: Tarjeta de crédito y efectivo a través de Mercado Pago, transferencia o depósito bancario. Los datos necesarios para ésta última operación aparecerán en pantalla una vez elegida la forma de pago.</p></div>

			<a href="#" class="toggle5">
			<div class="pregunta5"><h3>¿TIENEN PROMOCIONES CON TARJETAS?</h3></div>
			</a>
			<div class="respuesta5"><p>Por supuesto! Abonando tu compra a través de Mercado Pago, accedés a descuentos y financiación en cuotas sin interés. Chequeá las promociones vigentes.</p></div>

			<a href="#" class="toggle6">
			<div class="pregunta6"><h3>¿PUEDO MODIFICAR LA DIRECCIÓN DE ENTREGA?</h3></div>
			</a>
			<div class="respuesta6"><p>Sí, podés elegir entre la dirección con la que te registraste o alguna otra, a la que prefieras que te enviemos el producto, al momento de seleccionar la forma de envío.</p></div>

			<a href="#" class="toggle7">
			<div class="pregunta7"><h3>¿EL ENVÍO A DOMICILIO TIENE COSTO?</h3></div>
			</a>
			<div class="respuesta7"><p>El costo de envío depende de la distancia.</p></div>

			<a href="#" class="toggle8">
			<div class="pregunta8"><h3>¿PUEDO RETIRAR EL PRODUCTO POR EL LOCAL?</h3></div>
			</a>
			<div class="respuesta8"><p>Podés retirar en nuestro local sin costo.</p></div>
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
		$('.toggle1').click(function () {
			$('.respuesta1').slideToggle();
		});
		$('.toggle2').click(function () {
			$('.respuesta2').slideToggle();
		});
		$('.toggle3').click(function () {
			$('.respuesta3').slideToggle();
		});
		$('.toggle4').click(function () {
			$('.respuesta4').slideToggle();
		});
		$('.toggle5').click(function () {
			$('.respuesta5').slideToggle();
		});
		$('.toggle6').click(function () {
			$('.respuesta6').slideToggle();
		});
		$('.toggle7').click(function () {
			$('.respuesta7').slideToggle();
		});
		$('.toggle8').click(function () {
			$('.respuesta8').slideToggle();
		});
	</script>
</body>
</html>
