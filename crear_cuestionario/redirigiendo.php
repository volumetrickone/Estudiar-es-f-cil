<?php
session_start();
$profesor = $_SESSION['user_id'];
$nombreconjunto = $_POST['nombreconjunto'];

$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("INSERT INTO conjunto(id, nombre , profesor) VALUES (NULL ,  :nombre , :profesor)");

    $stmt->bindValue(':nombre', $nombreconjunto);
    $stmt->bindValue(':profesor', $profesor);

$stmt->execute();

$stmt = $conn->prepare("SELECT id FROM conjunto WHERE nombre = :nombre AND profesor = :profesor");

    $stmt->bindValue(':nombre', $nombreconjunto);
    $stmt->bindValue(':profesor', $profesor);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$conjunto = $result["id"];



$_SESSION['nombreconjunto'] = $nombreconjunto;
$_SESSION['conjunto'] = $conjunto;


header('Location:http://localhost:8888/crear_cuestionario');


?>
