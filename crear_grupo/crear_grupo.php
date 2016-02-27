<?php
session_start();
$user_id = $_SESSION['user_id'];

$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$email3 = $_POST['email3'];
$email4 = $_POST['email4'];
$problema1 = $_POST['problema1'];
$problema2 = $_POST['problema2'];
$problema3 = $_POST['problema3'];
$problema4 = $_POST['problema4'];

$nombregrupo = $_POST['nombregrupo'];


$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try{
$stmt = $conn ->prepare("SELECT id FROM usuario WHERE mail = :mail");
$stmt->bindValue(':mail', $email1);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$alumno1 = $result["id"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

try{
$stmt = $conn ->prepare("SELECT id FROM usuario WHERE mail = :mail");
$stmt->bindValue(':mail', $email2);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$alumno2 = $result["id"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
try{
$stmt = $conn ->prepare("SELECT id FROM usuario WHERE mail = :mail");
$stmt->bindValue(':mail', $email3);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$alumno3 = $result["id"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

try{
$stmt = $conn ->prepare("SELECT id FROM usuario WHERE mail = :mail");
$stmt->bindValue(':mail', $email4);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$alumno4 = $result["id"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}


if($problema1 == 1){
  try{
  $stmt = $conn ->prepare("INSERT INTO problema(alumno , problema) VALUES(:alumno , :problema)");
  $stmt->bindValue(':alumno', $alumno1);
  $stmt->bindValue(':problema', $problema1);
  $stmt->execute();

  }
  catch(PDOException $e) {
  	echo "Error: " . $e->getMessage();
  }
}

if($problema2 == 1){
  try{
  $stmt = $conn ->prepare("INSERT INTO problema(alumno , problema) VALUES(:alumno , :problema)");
  $stmt->bindValue(':alumno', $alumno2);
  $stmt->bindValue(':problema', $problema2);
  $stmt->execute();

  }
  catch(PDOException $e) {
  	echo "Error: " . $e->getMessage();
  }
}
if($problema3 == 1){
  try{
  $stmt = $conn ->prepare("INSERT INTO problema(alumno , problema) VALUES(:alumno , :problema)");
  $stmt->bindValue(':alumno', $alumno4);
  $stmt->bindValue(':problema', $problema4);
  $stmt->execute();

  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
if($problema4 == 1){
  try{
  $stmt = $conn ->prepare("INSERT INTO problema(alumno , problema) VALUES(:alumno , :problema)");
  $stmt->bindValue(':alumno', $alumno4);
  $stmt->bindValue(':problema', $problema4);
  $stmt->execute();

  }
  catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
$stmt = $conn->prepare("INSERT INTO grupos(id, profesor , nombre , alumno1 , alumno2 , alumno3 , alumno4 , alumno5 , conjunto1 , conjunto2 , conjunto3) VALUES (NULL , :profesor , :nombre , :alumno1 , :alumno2 , :alumno3 , :alumno4 , '2' , NULL , NULL , NULL)");
    $stmt->bindValue(':profesor', $user_id);
    $stmt->bindValue(':nombre', $nombregrupo);
    $stmt->bindValue(':alumno1', $alumno1);
    $stmt->bindValue(':alumno2', $alumno2);
    $stmt->bindValue(':alumno3', $alumno3);
    $stmt->bindValue(':alumno4', $alumno4);
$stmt->execute();

header('Location:http://localhost:8888/dashboard');

?>
