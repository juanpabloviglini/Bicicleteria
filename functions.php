<?php

session_start();


if (isset($_COOKIE['username'])) {
  $_SESSION['username'] = $_COOKIE['username'];
}


function validar($data, $filePic){
  $errores = [];
  $name=  trim($data['name']);
	$email=  trim($data['email']);
	$password=  trim($data['password']);
	$passwordr=  trim($data['passwordr']);

  $username=trim($data['username']);
  $phone=trim($data['phone']);
  $direction=trim($data['direction']);

	if ($name == '') {
		$errores['name']='*Por favor completa el nombre';
	}
	if ($email == '') {
		$errores['email']='*Por favor completa el email';
	}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $errores['email']='*Por favor completa el email con un formato válido';
  }elseif (existeEmail($email)) {
    $errores['email']='*El email ya existe, elegí otro';
  }
	if ($password == '' || $passwordr == '') {
		$errores['password']='*Por favor completa tus contraseñas';
	}elseif ($password !== $passwordr) {
    $errores['password']='*Por favor verifica las contraseñas, no coinciden';
  }
  if ($direction=="") {
    $errores['direction']="*Completa tu dirección correctamente.";
  }
  if ($phone=="") {
    $errores['phone']="*Completa tu telefono correctamente.";
  }
  if ($username=="") {
    $errores['username']="*Completa tu usuario correctamente.";
  }elseif (existeUsername($username)) {
    $errores['username']="*El username ya existe, elegí otro.";
  }


  if ($filePic['archivo']['error']==UPLOAD_ERR_OK) {
    $name = $filePic['archivo']['name'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $archivo= $filePic['archivo']['tmp_name'];

    if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ) {
      move_uploaded_file($archivo,'profilePics/'.$data['username'].'.'.$ext);
    }

  }else {
    $errores['profilePic']="Error al cargar la foto de perfil, intentá de nuevo por favor.";
  }



  return $errores;

}

function crearArrayUsuario ($data,$files){
  $usuario = [
    'name'=>$data['name'],
    'email'=>$data['email'],
    'direction'=>$data['direction'],
    'phone'=>$data['phone'],
    'username'=>$data['username'],
    'password'=>password_hash($data['password'],PASSWORD_DEFAULT),
    'foto' => 'profilePics/'.$data['username'].'.'. pathinfo($files[$imagen]['name'], PATHINFO_EXTENSION)
  ];
  return $usuario;
}

function guardarUsuario($usuario){
  $usuarioJSON = json_encode($usuario);
  file_put_contents('usuarios.json', $usuarioJSON.PHP_EOL, FILE_APPEND);
  // $dsn='mysql:host=127.0.0.1;dbname=kingsebike_db;port=3306';
  // $db_user = 'root';
  // $db_pass = 'root';
  // $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  // try {
  //   $db = new PDO($dsn,$db_user,$db_pass,$opt);
  // } catch (PDOException $Exception) {
  //   echo $Exception->getMessage();
  // }
  //
  // try {
  //   $huboError=false;
  //   $sql = "INSERT INTO usuarios(name,username,email,phone,password,direction)
  //           VALUES ('{$usuario['name']},{$usuario['username']},{$usuario['email']},{$usuario['phone']},{$usuario['password']},{$usuario['direction']}')";
  //   $query = $db->prepare($sql);
  //   $query->execute();
  // } catch (PDOException $Exception) {
  //   $huboError=true;
  //   echo $Exception->getMessage();
  //   echo $sql;
  // }
   return true;

}

function traerTodos(){
  $usuariosJson=file_get_contents('usuarios.json');

  $usuariosArrayJSON=explode(PHP_EOL,$usuariosJson);
  $usuariosPHP=[];
  foreach ($usuariosArrayJSON as $value) {
    $usuariosPHP[]=json_decode($value,true);
  }
  array_pop($usuariosPHP);
  return $usuariosPHP;
}

function existeEmail($email){

  $usuarios = traerTodos();

  foreach ($usuarios as $usuario) {
    if ($email == $usuario['email']) {
      return $usuario;
    }
  }
  return false;
}
function existeUsername($username){

  $usuarios = traerTodos();

  foreach ($usuarios as $usuario) {
    if ($username == $usuario['username']) {
      return $usuario;
    }
  }
  return false;
}

function loguear($usuario) {

   $_SESSION['username'] = $usuario['username'];
  header('location: index.php?Logueado');
  exit;
}


function estaLogueado() {
  return isset($_SESSION['username']);
}


function validarLogin($data) {
		$errores = [];
		$username = trim($data['username']);
		$password = trim($data['password']);

		if ($username == '') {
			$errores['username'] = 'Completá tu username';
		} elseif (!$usuario = existeUsername($username)) {
			$errores['username'] = 'Este username no está registrado';
		} else {
        
      	if (!password_verify($password, $usuario["password"])) {
         	$errores['password'] = "Credenciales incorrectas";
      	}
		}

		return $errores;
	}

  function traerPorUsername($user){
    // me traigo todos los usuarios
    $todos = traerTodos();

    // Recorro el array de todos los usuarios
    foreach ($todos as $usuario) {
      if ($user == $usuario['username']) {
        return $usuario;
      }
    }

    return false;
  }



 ?>
