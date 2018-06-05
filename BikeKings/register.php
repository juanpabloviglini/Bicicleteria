<?php
    $errores=[];
    $name='';
    $email='';
    $username='';
    $phone='';
    $direction='';

    if ($_POST) {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $username=$_POST['username'];
      $phone=$_POST['phone'];
      $direction=$_POST['direction'];

      if ($name=="") {
        $errores['name']="*Completa tu nombre.";
      }
      if ($email=="" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email']="*Completa tu email correctamente.";
      }
      if ($username=="") {
        $errores['username']="*Completa tu username correctamente.";
      }
      if ($direction=="") {
        $errores['direction']="*Completa tu dirección correctamente.";
      }
      if ($phone=="") {
        $errores['phone']="*Completa tu telefono correctamente.";
      }
      if ($_POST['password']!=$_POST['passwordr']) {
        $errores['pass']="*Las contraseñas no coinciden.";
      }else if ($_POST['password']=="" || $_POST['passwordr']=="") {
        $errores['pass']="*Complete las contraseñas.";
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
          <li><a href="index.html">HOME</a></li>
          <li><a href="productos.html">PRODUCTOS</a></li>
          <li><a href="#">REGISTRO</a></li>
          <li><a href="faq.html">FAQ's</a></li>
          <li><a href="login.php">Log in</a></li>
        </ul>
      </nav>
    </header>



   <form method='post'>
      <fieldset >
			<legend>Registrate</legend>

			<strong>* campos requeridos</strong><br><br>

			<div class='form-control'>
				<label for='name' >Nombre completo*: </label>
				<input type='text' name='name' id='name' value=<?=$name?>>
        <div class="error">
          <?php if (!empty( $errores['name'])): ?>
            <?= $errores['name']; ?>
          <?php endif; ?>
        </div>
			</div>



			<div class='form-control'>
				<label for='email' >Email*:</label>
				<input type='text' name='email' id='email' value=<?=$email?>>
        <div class="error">
          <?php if (!empty( $errores['email'])): ?>
            <?= $errores['email']; ?>
          <?php endif; ?>
        </div>
			</div>

			<div class='form-control'>
				<label for='username' >Nombre de usuario*:</label>
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
          <?php if (!empty( $errores['pass'])): ?>
            <?= $errores['pass']; ?>
          <?php endif; ?>
        </div>
			</div>
			<div class='form-control'>
				<label for='passwordr'>Confirme la Contraseña*:</label>
				<input type='password' name='passwordr' id='passwordr'>
        <div class="error">
          <?php if (!empty( $errores['pass'])): ?>
            <?= $errores['pass']; ?>
          <?php endif; ?>
        </div>
			</div>
      <div class='form-control'>
				<label for='phone'>Teléfono de contacto*:</label>
				<input type='text' name='phone' id='phone' value=<?=$phone?>>
        <div class="error">
          <?php if (!empty( $errores['phone'])): ?>
            <?= $errores['phone']; ?>
          <?php endif; ?>
        </div>
			</div>
      <div class='form-control'>
				<label for='direction'>Dirección del domicilio*:</label>
				<input type='text' name='direction' id='direction' value=<?=$direction?>>
        <div class="error">
          <?php if (!empty( $errores['direction'])): ?>
            <?= $errores['direction']; ?>
          <?php endif; ?>
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
