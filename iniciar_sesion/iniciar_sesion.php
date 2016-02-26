<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$mail = trim($mail);
$pass = trim($pass);

        $conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
        $stmt = $conn ->prepare("SELECT mail FROM usuario WHERE mail = :seleccionado");
        $stmt->bindValue(':seleccionado', $mail);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $confirmacion_mail = $result["mail"];
        }
        catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
/*echo $mail;
echo $confirmacion_mail;*/
        $confirmacion_mail = trim($confirmacion_mail);
if ($mail ==  $confirmacion_mail){

        try{
        $stmt = $conn ->prepare("SELECT pass FROM usuario WHERE mail = :mail");
        //$stmt->bindValue(':seleccionado', $pass);
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $confirmacion_pass = $result["pass"];
        }
          catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

if($confirmacion_pass == $pass){
        //echo "You're in";
        try{
        $stmt = $conn ->prepare("SELECT usuario FROM usuario WHERE mail = :mail");
        //$stmt->bindValue(':seleccionado', $pass);
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $usuario = $result["usuario"];
        }
          catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        try{
        $stmt = $conn ->prepare("SELECT id FROM usuario WHERE mail = :mail");
        //$stmt->bindValue(':seleccionado', $pass);
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $result["id"];
        }
          catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        try{
        $stmt = $conn ->prepare("SELECT nombre FROM usuario WHERE mail = :mail");
        //$stmt->bindValue(':seleccionado', $pass);
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $nombre = $result["nombre"];
        }
          catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }


$_SESSION['user_id']=$id;
$_SESSION['usuario']=$usuario;
$_SESSION['nombreusuario']=$nombre ;
if($usuario == 1){
header('Location:http://localhost:8888/dashboard');
}
else{
header('Location:http://localhost:8888/alumno');
}

}

    else{
      echo "Te has equivocado, porfavor vuelve a introducir tus datos de mail y contraseña";
    }
}
    else{
      echo "No hay ningún usuario con este mail";
    }
?>
