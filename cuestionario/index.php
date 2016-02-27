<?php
session_start();

$user_id = $_SESSION['user_id'];
$usuario = $_SESSION['usuario'];
if(!empty($_POST['conjunto'])){
$conjunto = $_POST['conjunto']; // index.php alumno, cuando apriete una colección de preguntas tendría que tener esta variable escondida en un hidden
$_SESSION['conjunto'] = $conjunto;
}
else{
	$conjunto = $_SESSION['conjunto'];
}
$antigua = $_SESSION['antigua'];

$antigua = trim($antigua);
if(empty($antigua)){
	$antigua = 10000000;
}

/*
$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$stmt = $conn ->prepare("SELECT 'alumno' FROM grupos WHERE :idusuario IN (alumno1 , alumno2 , alumno3 , alumno4 , alumno5) AND :");
$stmt->bindValue(':seleccionado', $mail);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$confirmacion_conjunto = $result["conjunto"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}*/
//SELECT NUM, count(*) as 'Cnt' FROM tbl GROUP BY NUM



/*
$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$stmt = $conn ->prepare("SELECT COUNT(*) as 'cnt' FROM preguntas  WHERE conjunto = :conjunto");
$stmt->bindValue(':seleccionado', $mail);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$contador = $result["cnt"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}*/
$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$stmt = $conn ->prepare("SELECT problema FROM problema  WHERE alumno = :alumno");
$stmt->bindValue(':alumno', $user_id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$problema = $result['problema'];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

try{
$stmt = $conn ->prepare(" SELECT id FROM preguntas WHERE conjunto = :conjunto AND pregunta != :antigua ORDER BY RAND() LIMIT 1");
$stmt->bindValue(':conjunto', $conjunto);
$stmt->bindValue(':antigua', $antigua);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$sinresponder = $result["id"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

echo "$sinresponder";
try{
$stmt = $conn ->prepare("SELECT pregunta FROM respondidas WHERE conjunto = :conjunto AND alumno = :user_id AND respuesta = '1' AND pregunta != :antigua ORDER BY RAND() LIMIT 1");
$stmt->bindValue(':conjunto', $conjunto);
$stmt->bindValue(':antigua', $antigua);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$correctas = $result["pregunta"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
echo "$correctas";
try{
$stmt = $conn ->prepare("SELECT pregunta FROM respondidas WHERE conjunto = :conjunto AND alumno = :user_id AND respuesta = '2' AND pregunta != :antigua ORDER BY RAND() LIMIT 1");
$stmt->bindValue(':conjunto', $conjunto);
$stmt->bindValue(':antigua', $antigua);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$incorrectas = $result["pregunta"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
echo "$incorrectas";
if(empty($sinresponder) AND empty($incorrectas)){
	echo "Genial.";
}
$preguntasarray = array($sinresponder,$correctas,$incorrectas);
shuffle($preguntasarray);
if(!empty($preguntasarray[0])){
$_SESSION['antigua'] = $preguntasarray[0];
$seleccionada = $preguntasarray[0];
}
else if(!empty($preguntasarray[1])){
	$_SESSION['antigua'] = $preguntasarray[1];
	$seleccionada = $preguntasarray[1];
}
else if(!empty($preguntasarray[2])){
	$_SESSION['antigua'] = $preguntasarray[2];
	$seleccionada = $preguntasarray[2];
}
else if(!empty($preguntasarray[3])){
	$_SESSION['antigua'] = $preguntasarray[3];
	$seleccionada = $preguntasarray[3];
}
$_SESSION['seleccionada'] = $seleccionada;

try{
$stmt = $conn ->prepare("SELECT pregunta FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ");
$stmt->bindValue(':seleccionada', $seleccionada);
$stmt->bindValue(':conjunto', $conjunto);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$pregunta = $result["pregunta"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
echo "1";
try{
$stmt = $conn ->prepare("SELECT `resp1` FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ");
$stmt->bindValue(':seleccionada', $seleccionada);
$stmt->bindValue(':conjunto', $conjunto);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$respuesta1 = $result["resp1"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
echo "1";
try{
$stmt = $conn ->prepare("SELECT `resp2` FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ");
$stmt->bindValue(':seleccionada', $seleccionada);
$stmt->bindValue(':conjunto', $conjunto);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$respuesta2 = $result["resp2"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
echo "1";
try{
$stmt = $conn ->prepare("SELECT `resp3` FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ");
$stmt->bindValue(':seleccionada', $seleccionada);
$stmt->bindValue(':conjunto', $conjunto);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$respuesta3 = $result["resp3"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
echo "1";
try{
$stmt = $conn ->prepare("SELECT correct FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ");
$stmt->bindValue(':seleccionada', $seleccionada);
$stmt->bindValue(':conjunto', $conjunto);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$respuesta4 = $result["correct"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
try{
$stmt = $conn ->prepare("SELECT COUNT(*) as 'cnt1' FROM preguntas  WHERE conjunto = :conjunto");
$stmt->bindValue(':conjunto', $conjunto);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$contadortotal = $result["cnt1"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
try{
$stmt = $conn ->prepare("SELECT COUNT(*) as 'cnt2' FROM respondidas  WHERE conjunto = :conjunto AND respuesta = '1'");
$stmt->bindValue(':conjunto', $conjunto);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$contadorbuenas = $result["cnt2"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}



$respuestasarray = array($respuesta4,$respuesta3,$respuesta2,$respuesta1);

shuffle($respuestasarray);

//echo "$respuesta4";
//$sinresponder = SELECT id FROM preguntas WHERE conjunto = :conjunto AND id != :antigua  ORDER BY RAND() LIMIT 1;

//$correctas = SELECT pregunta FROM respondidas WHERE conjunto = :conjunto AND alumno = :user_id AND respuesta = '1' AND pregunta != :antigua ORDER BY RAND() LIMIT 1

//$incorrectas = SELECT pregunta FROM respondidas WHERE conjunto = :conjunto AND alumno = :user_id AND respuesta = '2' AND pregunta != :antigua ORDER BY RAND() LIMIT 1


/*
$pregunta = SELECT pregunta FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ;

$respuesta1 = SELECT resp1 FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ;
$respuesta2 = SELECT resp2 FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ;
$respuesta3 = SELECT resp3 FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ;
$respuesta4 = SELECT correct FROM preguntas WHERE conjunto = :conjunto AND id = :seleccionada ;
*/
/*$respuestasarray['0'] = trim($respuestasarray['0']);
$respuestasarray['1']= trim($respuestasarray['1']);
$respuestasarray['2']= trim($respuestasarray['2']);
$respuestasarray['3']= trim($respuestasarray['0']);
*/




?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Estudiar es Fácil</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/cuestionario.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- NAVEGADOR SUPERIOR -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#">
						<img alt="Brand" src="/images/logo.png" style="max-width: 40px; margin-top: -10px;">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Clase</a></li>
						<li class="active"><a href="#">Perfil</a></li>
					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Buscar">
						</div>
						<button type="submit" class="btn btn-default">Enviar</button>
					</form>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

		<!-- CONTENIDO -->
		<!-- FORMULARIO INICAR SESIÓN -->
		<form action="/cuestionario/cuestionario.php" method="POST" role="form" id="cuestionario" style="display: none;" name="id_pregunta">
			<div class="container-registro">
				<div class="container vertical-center">
			        <div class="row centered-form">
			        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
			        	<div class="panel panel-default">
			        		<div class="panel-heading">
						    		<h3 class="panel-title" style="text-align: center;"><?php echo "$pregunta"; ?></h3>
						 			</div>
						 			<div class="panel-body">
						    		<form role="form">
						    			<div class="form-group" >
						    				<input type="button" value="<?php echo "$respuestasarray[0]"; ?>" class="btn btn-info btn-block responder" name="respuesta" id="<?php echo "$respuestasarray[0]"; ?>">
						    			</div>
										<div class="form-group">
				    						<input type="button" value="<?php echo "$respuestasarray[1]"; ?>" class="btn btn-info btn-block responder" name="respuesta" id="<?php echo "$respuestasarray[1]"; ?>">
				    					</div>
				    					<div class="form-group">
				    						<input type="button" value="<?php echo "$respuestasarray[2]"; ?>" class="btn btn-info btn-block responder" name="respuesta" id="<?php echo "$respuestasarray[2]"; ?>">
				    					</div>
				    					<div class="form-group">
				    						<input type="button" value="<?php echo "$respuestasarray[3]"; ?>" class="btn btn-info btn-block responder" name="respuesta" id="<?php echo "$respuestasarray[3]"; ?>">
				    					</div>
				    					<div class="form-group" style="height: 30px; ; margin-top: 40px; margin-bottom: 10px;" id="progreso">

				    					</div>

						    		</form>
						    	</div>
				    		</div>
			    		</div>
			    	</div>
			    </div>
			</div>
			<input type="hidden" id="progreso" value="<?php $porcentaje = round(100*$contadorbuenas/$contadortotal); echo "$porcentaje"; ?>">
		</form>
		<!-- jQuery -->
		<script src="/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/cuestionario.js"></script>
		<script src="/js/progressbar.min.js"></script>
<?php if($problema == 1){ ?>
		<script type="text/javascript">
            var correcto = false;
            if (!('webkitSpeechRecognition' in window)) {
                //handle error stuff here...
            } else {
                var recognition = new webkitSpeechRecognition();
                recognition.continuous = false;
                recognition.interimResults = true;                recognition.start();                var final_transcript = '';                recognition.onresult = function (event) {
                    console.log(JSON.stringify(event.results));
                    var interim_transcript = '';
                    if (typeof (event.results) == 'undefined') {
                        recognition.onend = null;
                        recognition.stop();
                        upgrade();
                        return;
                    }
                    for (var i = event.resultIndex; i < event.results.length; ++i) {
                        if (event.results[i].isFinal) {
                            final_transcript += event.results[i][0].transcript;
                        } else {
                            interim_transcript += event.results[i][0].transcript;
                        }
                    }
                        if (final_transcript == "1" || final_transcript == "uno") {
                            recognition.stop();
                            correcto = true;
                            alert("No es correcto 1!");
                        };
                        if (final_transcript == "2" || final_transcript == "dos") {
                            recognition.stop();
                            correcto = true;
                            alert("No es correcto 2!");
                        };
                        if (final_transcript == "3" || final_transcript == "tres") {
                            recognition.stop();
                            correcto = true;
                            alert("Correcto!");
                        };
                        if ((final_transcript == "4") || (final_transcript == "cuatro")) {
                            recognition.stop();
                            correcto = true;
                            alert("No es correcto 4!");
                        };
                };

                recognition.onend = function () {
                    if (correcto == false) {
                        recognition.start();
                    }
                    else {
                        recognition.stop();
                    }
                }            }
        </script>
				<?php } ?>
	</body>
</html>
