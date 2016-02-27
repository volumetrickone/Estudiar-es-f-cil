<?php
session_start();

$user_id = $_SESSION['user_id'];
$profesor = $user_id;
$nombreconjunto = $_SESSION['nombreconjunto'];
$conjunto = $_SESSION['conjunto'];
$nombregrupo = $_SESSION['optradio'];
$nombregrupo = trim($nombregrupo);

$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$stmt = $conn ->prepare("SELECT conjunto1 FROM grupos WHERE nombre = :nombregrupo AND profesor = :profesor");
$stmt->bindValue(':nombregrupo', $nombregrupo);
$stmt->bindValue(':profesor', $profesor);
$stmt->execute();
$conjunto1 = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
if(!empty($conjunto1)){
try{
$stmt = $conn ->prepare("UPDATE grupos SET conjunto2 = :conjunto WHERE profesor = :profesor");
$stmt->bindValue(':conjunto', $conjunto);
$stmt->bindValue(':profesor', $profesor);
$stmt->execute();
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
}
else{
  try{
  $stmt = $conn ->prepare("UPDATE grupos SET conjunto1 = :conjunto WHERE profesor = :profesor");
  $stmt->bindValue(':conjunto', $conjunto);
  $stmt->bindValue(':profesor', $profesor);
  $stmt->execute();
  }
  catch(PDOException $e) {
  	echo "Error: " . $e->getMessage();
  }
}
header('Location:http://localhost:8888/dashboard');



?>
