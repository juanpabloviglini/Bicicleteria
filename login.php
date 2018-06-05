<?php
    $errores=[];
    $username='';
    $usuario1=['username'=>'soymanucho','pass'=>'jajaja'];
    $usuario2=['username'=>'soymanucho2','pass'=>'jajaja2'];
    $usuarios=[$usuario1,$usuario2];

    if ($_POST) {

      $username=$_POST['username'];

      if ($username=="") {
        $errores['username']="*Completa tu username correctamente.";
      }
      foreach ($usuarios as $usuario => $datosUser) {
        if ($datosUser['username']==$username and $datosUser['pass']==$_POST['password']) {
          echo "Login Completado correctamente! Bienvenido $username !";
          break;
        }else {
          $errores['pass']="*No coinciden las credenciales, pruebe de hacer Log In nuevamente.";
        }
      }

    }



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   <form method='post'>
      <fieldset >
			<legend>Log In</legend>

			<strong>* campos requeridos</strong><br><br>

			<div class='form-control'>
				<label for='username' >Nombre de usuario*:</label>
				<input type='text' name='username' id='username' value=<?=$username?>>
        <div class="error">
          <?php if (!empty( $errores['pass'])): ?>
            <?= $errores['pass']; ?>
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
				<button type="submit">ENVIAR</button>
			</div>

      </fieldset>

   </form>
</body>
</html>
