<?PHP

session_start();


$user_id = $_SESSION['user_id'];
$profesor = $user_id;
$conjunto = $_SESSION['conjunto'];
$nombreconjunto = $_SESSION['nombreconjunto'];

$accion = $_POST['accion'];
$pregunta = $_POST['pregunta'];
$correct = $_POST['correct'];
$resp1 = $_POST['resp1'];
$resp2 = $_POST['resp2'];
$resp3 = $_POST['resp3'];


$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("INSERT INTO preguntas(id, conjunto , nombreconjunto , profesor , pregunta , resp1 , resp2 , resp3 , correct) VALUES (NULL ,  :conjunto , :nombreconjunto , :profesor , :pregunta , :resp1 , :resp2 , :resp3 , :correct)");

    $stmt->bindValue(':conjunto', $conjunto);
    $stmt->bindValue(':nombreconjunto', $nombreconjunto);
    $stmt->bindValue(':profesor', $profesor);
    $stmt->bindValue(':pregunta', $pregunta);
    $stmt->bindValue(':resp1', $resp1);
    $stmt->bindValue(':resp2', $resp2);
    $stmt->bindValue(':resp3', $resp3);
    $stmt->bindValue(':correct', $correct);


$stmt->execute();

$stmt = $conn ->prepare(" SELECT nombre FROM conjunto WHERE profesor = :profesor AND nombre = :nombre ");
$stmt->bindValue(':profesor', $profesor);
$stmt->bindValue(':nombre', $nombre);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$nombresbuscados = $result["nombre"];
/*
if($nombreconjunto != $nombresbuscados){

$stmt = $conn->prepare("INSERT INTO conjunto(id, nombre , profesor) VALUES (NULL ,  :nombre , :profesor)");

    $stmt->bindValue(':nombre', $nombreconjunto);
    $stmt->bindValue(':profesor', $profesor);

$stmt->execute();
}*/


if($accion == 2 ){
header('Location:http://localhost:8888/crear_cuestionario/grupo.php');
}
else{
header('Location:http://localhost:8888/crear_cuestionario');
}



?>
