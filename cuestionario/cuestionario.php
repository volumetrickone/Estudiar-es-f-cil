<?php
session_start();
$seleccionada = $_SESSION['seleccionada'];
$user_id = $_SESSION['user_id'];
$respuesta = $_POST['respuesta'];
$conjunto = $_SESSION['conjunto'];
$respuesta = trim($respuesta);
$conjunto = trim($conjunto);

return $respuesta;
/*

$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$stmt = $conn ->prepare("SELECT correct FROM preguntas WHERE id = :seleccionada");
$stmt->bindValue(':seleccionada', $seleccionada);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$correct = $result["correct"];
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$correct = trim($correct);


if($correct == $respuesta){

  $stmt = $conn->prepare("INSERT INTO respondidas(id, pregunta , conjunto , alumno , respuesta) VALUES (NULL , :pregunta , :conjunto , :alumno , '1')");
      $stmt->bindValue(':pregunta', $seleccionada);
      $stmt->bindValue(':conjunto', $conjunto);
      $stmt->bindValue(':alumno', $user_id);

  $stmt->execute();
//$respuesta2 = array(1,"$correct");
return $correct;
}
else{
  $stmt = $conn->prepare("INSERT INTO respondidas(id, pregunta , conjunto , alumno , respuesta) VALUES (NULL , :pregunta , :conjunto , :alumno , '2')");
      $stmt->bindValue(':pregunta', $seleccionada);
      $stmt->bindValue(':conjunto', $conjunto);
      $stmt->bindValue(':alumno', $user_id);

  $stmt->execute();
//$respuesta2 = array(0,"$correct");
return $correct;
}
*/

?>
