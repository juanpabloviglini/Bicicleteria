<?php

    require_once('functions.php');

    if (estaLogueado()) {
    header('location: index.php');
    exit;
    }

    $username='';

    $usuarios=traerTodos();

    if ($_POST) {
      $username=trim($_POST['username']);
      $errores=validarLogin($_POST);

      if (empty($errores)) {
  			$usuario = existeUsername($username);

  			loguear($usuario);


  			if (isset($_POST["recordar"])) {
  	        setcookie('username', $usuario['username'], time() + 3600 * 24 * 365);
  	      }

  			header('location: index.php?logueoExitoso');
  			exit;
  		}
    }


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BikeKing's e-Shop - REGISTRO</title>
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
          <li><a href="faq.php">FAQ's</a></li>
          <li><a href="register.php">REGISTRO</a></li>
          <li><a href="#">Log in</a></li>
        </ul>
      </nav>
    </header>


   <form method='post'>
      <fieldset >
			<legend>Log In</legend>

			<strong>* campos requeridos</strong><br><br>

			<div class='form-control'>
				<label for='username' >Username*:</label>
				<input type='text' name='username' id='username' value=<?=$username?>>
        <div class="error">
          <?php if (!empty( $errores['username'])): ?>
            <?= $errores['username']; ?>
          <?php endif; ?>
        </div>
			</div>

			<div class='form-control'>
				<label for='password'>Contraseña*:</label>
				<input type='password' name='password' id='password'>
        <div class="error">
          <?php if (!empty( $errores['password'])): ?>
            <?= $errores['password']; ?>
          <?php endif; ?>
        </div>
			</div>

      <div class="row">
        <div class="form-control">
          <div class="form-group">
            <input type="checkbox" name="recordar">
            Recordar
          </div>
        </div>
      </div>

			<div class='form-control'>
				<button type="submit">ENVIAR</button>
			</div>

      </fieldset>

   </form>

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
