<?php
/*
$user_id = $_SESSION['user_id'];
$profesor = $user_id;
*/
$user_id = 1;
$profesor = $user_id;
$conn = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$stmt = $conn ->prepare(" SELECT id FROM grupos WHERE profesor = :profesor ");
$stmt->bindValue(':profesor', $profesor);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//$grupos = $result["id"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}
$conns = new PDO('mysql:host=localhost; dbname=estudiaresfacil;charset=utf8', 'estudiaresfacil' , 'UPChack2016');
$conns->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
$conns->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
$stmts = $conns ->prepare(" SELECT id FROM conjunto WHERE profesor = :profesor ");
$stmts->bindValue(':profesor', $profesor);
$stmts->execute();
$results = $stmts->fetchAll(PDO::FETCH_ASSOC);

//$grupos = $result["id"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

/*
$cantidadgrupos = count($result);

for($i = 0 ; $i != $cantidadgrupos ; $i++ ){

$idgrupo = $result[$i]["id"];	 //el numero del grupo de este profesor

try{
$stmt = $conn ->prepare(" SELECT nombre FROM grupos WHERE profesor = :profesor AND id = :id");
$stmt->bindValue(':profesor', $profesor);
$stmt->bindValue(':id', $idgrupo);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$nombregrupoarray[$i] = $result["nombre"];
}
catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
}

}
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
		<link rel="stylesheet" type="text/css" href="/dist/sweetalert2.css">
		<link rel="stylesheet" href="/css/dashboard.css">

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
					<!--
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
					</ul>
					-->
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

		<!-- CONTENIDO -->

		<!-- HEADER -->
		<div class="col-md-8 sec-1-btn text-center" style="padding: 0px;">
			<div class="jumbotron" id="portada" style="height: 100%;">
				<!--<a class="btn btn-primary btn-lg btn-success" id="crear_cuestionario" href="/crear_cuestionario" data-content="Crear cuestionario" rel="popover" data-placement="left" data-trigger="hover">+</a>-->
				<div class="container" style="text-align: left; margin-top: -35px;">
					<h2>Mis cuestionarios:</h2>
				</div>
				<!-- CREAR UN DIVISOR COMO EL DE ABAJO POR CADA CUESTIONARIO Y CAMBIAR EL VALUE POR EL NOMBRE DEL CUESTIONARIO -->
				<!-- El name ha de ser igual a la id de la pregunta -->

				<?php
							foreach ($results as $titleData) {

						 		try{
						 		$stmts = $conns ->prepare(" SELECT nombre FROM conjunto WHERE profesor = :profesor AND id = :id");
						 		$stmts->bindValue(':profesor', $profesor);
						 		$stmts->bindValue(':id', $titleData['id']);
						 		$stmts->execute();
						 		$resultamos = $stmts->fetch(PDO::FETCH_ASSOC);
						 		$conjunto = $resultamos["nombre"];
						 		}
						 		catch(PDOException $e) {
						 			echo "Error: " . $e->getMessage();
						 		} ?>
								<div class="container" style="margin-bottom: 10px;">
										<input type="submit" value="<?php	echo "$conjunto"; ?>" class="btn btn-info btn-block" style="text-align: left;" name="id_pregunta">
									</div>
						  <?php  }
								?>



				<!-- Sempre al final posar aquest div per crear nous cuestionaris -->
				<div class="container" style="margin-bottom: 10px;">
					<form action="/crear_cuestionario/redirigiendo.php" method="POST" role="form" id="form-crear-cuestionario">
						<input type="button" id="boton-crear-cuestionario" value="Crear nuevo cuestionario" class="btn btn-block btn-success" style="text-align: center;">
					</form>
				</div>
			</div>
		</div>
	    <div class="col-md-4 sec-1-btn text-center" style="padding: 0px;">
			<div class="jumbotron" id="portada" style="height: 100%; background-color: #3497DA;">
				<!--<a class="btn btn-primary btn-lg btn-success" id="crear_cuestionario" href="/crear_cuestionario" data-content="Crear cuestionario" rel="popover" data-placement="left" data-trigger="hover">+</a>-->
				<div class="container" style="text-align: left; margin-top: -35px;">
					<h2>Mis grupos:</h2>
				</div>
				<!-- CREAR UN DIVISOR COMO EL DE ABAJO POR CADA CUESTIONARIO Y CAMBIAR EL VALUE POR EL NOMBRE DEL CUESTIONARIO -->
				<!-- El name ha de ser igual a la id de la pregunta -->
				<?php
						foreach ($result as $titleDatas) {

					 		try{
					 		$stmt = $conn ->prepare(" SELECT nombre FROM grupos WHERE profesor = :profesor AND id = :id");
					 		$stmt->bindValue(':profesor', $profesor);
					 		$stmt->bindValue(':id', $titleDatas['id']);
					 		$stmt->execute();
					 		$resulta = $stmt->fetch(PDO::FETCH_ASSOC);
					 		$nombregrupoarray = $resulta["nombre"];
					 		}
					 		catch(PDOException $e) {
					 			echo "Error: " . $e->getMessage();
					 		} ?>
							<div class="container" style="margin-bottom: 10px;">
								<input type="button" value="<?php	echo "$nombregrupoarray"; ?>" class="btn btn-warning btn-block" style="text-align: left;">
							</div>
					  <?php  }
							?>



				<!-- Sempre al final posar aquest div per crear nous cuestionaris -->
				<div class="container" style="margin-bottom: 10px;">
					<form action="/crear_grupo" id="form-crear-grupo" method="POST" role="form">
						<input type="button" id="boton-crear-grupo" value="Crear nuevo grupo" class="btn btn-block btn-success" style="text-align: center;">
					</form>
				</div>
			</div>
	    </div>

		<!-- jQuery -->
		<script src="/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<script src="/dist/sweetalert2.min.js"></script>
		<script src="/js/dashboard.js"></script>
	</body>
</html>
