<?php
header('Content-Type: text/html; charset=utf-8');
//include_once('./../functions.php');
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['password_confirmation'];
$usuario = $_POST['usuario'];
$pass = trim($pass);
$pass_confirm = trim($pass_confirm);
$mail = trim($mail);

if(!empty($nombre) AND !empty($apellidos) AND !empty($mail) AND !empty($pass) AND !empty($usuario) AND !empty($pass_confirm)){

  $conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  try{
  $stmt = $conn ->prepare("SELECT 'mail' FROM usuario WHERE `mail` = :seleccionado");
  $stmt->bindValue(':seleccionado', $mail);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $confirmacion_mail = $result["mail"];
}
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

  $confirmacion_mail = trim($confirmacion_mail);



    if($pass != $pass_confirm){
      echo "las contraseñas no coinciden";
      return "las contraseñas no coinciden";
    }
    else if($mail == $confirmacion_mail){
      echo "este usuario ya tiene cuenta";
      return "ya hay un usuario con esta cuenta";
    }
    else{


    	$stmt = $conn->prepare("INSERT INTO usuario(id, nombre , apellidos , mail , pass , usuario) VALUES (NULL , :nombre , :apellidos , :mail , :pass , :usuario)");

    			$stmt->bindValue(':nombre', $nombre);
    			$stmt->bindValue(':apellidos', $apellidos);
    			$stmt->bindValue(':mail', $mail);
    			$stmt->bindValue(':pass', $pass);
          $stmt->bindValue(':usuario', $usuario);

    	$stmt->execute();
    header('Location:http://localhost:8888/iniciar_sesion');
    }
}
else{
  echo "faltan parametros";
  return "faltan parámetros";
}

?>
