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
    <title>Contact us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
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
</body>
</html>
