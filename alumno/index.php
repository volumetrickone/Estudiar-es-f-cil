<?php


$user_id = $_SESSION['user_id'];
$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombreusuario'];


$
 ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Estudiar es Fácil</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/alumno.css">

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
		<!-- DASHBOARD ALUMNOS -->

		<!-- GRUPOS -->
		<div class="col-md-4 sec-1-btn text-center aparecer" style="padding: 0px; display: none;">
			<div class="jumbotron" id="portada" style="height: 100%; background-color: #3497DA;">
				<!--<a class="btn btn-primary btn-lg btn-success" id="crear_cuestionario" href="/crear_cuestionario" data-content="Crear cuestionario" rel="popover" data-placement="left" data-trigger="hover">+</a>-->
					<div class="container" style="text-align: left; margin-top: -35px;">
						<h2>Mis grupos:</h2>
					</div>
					<!-- CREAR UN DIVISOR COMO EL DE ABAJO POR CADA CUESTIONARIO Y CAMBIAR EL VALUE POR EL NOMBRE DEL CUESTIONARIO -->
					<!-- El name ha de ser igual a la id de la pregunta -->
					<div class="container" style="margin-bottom: 10px;">
						<input type="button" value="3o - Naturales" class="btn btn-warning btn-block grupo" style="text-align: left;" name="id_grupo">
					</div>
					<div class="container" style="margin-bottom: 10px;">
						<input type="button" value="4o - Química" class="btn btn-warning btn-block grupo" style="text-align: left;" name="id_grupo2">
					</div>
			</div>
	    </div>

	    <!-- CUESTIONARIOS-->
		<div class="col-md-8 sec-1-btn text-center aparecer" style="padding: 0px; display: none;">
			<div class="jumbotron" id="portada" style="height: 100%;">

				<div class="contenedor-cuestionarios" id="id_grupo" style="display: none;"> <!-- LA id = A LA ID DEL GRUPO AL QUE PERTENECE - CREAR UN CONTENDEOR DE CUESTIONARIOS POR CADA GRUPO QUE CONTENGA LOS CUESTIONARIOS DEL GRUPO EN CONCRETO -->
					<div class="container" style="text-align: left; margin-top: -35px;">
						<h2>Mis cuestionarios:</h2>
					</div>
					<!-- CREAR UN DIVISOR COMO EL DE ABAJO POR CADA CUESTIONARIO Y CAMBIAR EL VALUE POR EL NOMBRE DEL CUESTIONARIO -->
					<!-- El name ha de ser igual a la id de la pregunta -->
					<div class="container" style="margin-bottom: 10px;">
						<input type="submit" value="1 - Los planetas del sistema solar" class="btn btn-info btn-block cuestion" style="text-align: left;" name="id_pregunta"> <!-- La id pregunta es el que necessites per buscar una pregunta a la base de dades -->
					</div>
					<div class="container" style="margin-bottom: 10px;">
						<input type="submit" value="2 - Los animales de lis pirineos" class="btn btn-info btn-block cuestion" style="text-align: left;" name="id_pregunta2">
					</div>
				</div>
				<!-- CUESTIONARIOS DEL GRUPO 2 -->
				<div class="contenedor-cuestionarios" id="id_grupo2" style="display: none;"> <!-- LA id = A LA ID DEL GRUPO AL QUE PERTENECE - CREAR UN CONTENDEOR DE CUESTIONARIOS POR CADA GRUPO QUE CONTENGA LOS CUESTIONARIOS DEL GRUPO EN CONCRETO -->
					<div class="container" style="text-align: left; margin-top: -35px;">
						<h2>Mis cuestionarios:</h2>
					</div>
					<!-- CREAR UN DIVISOR COMO EL DE ABAJO POR CADA CUESTIONARIO Y CAMBIAR EL VALUE POR EL NOMBRE DEL CUESTIONARIO -->
					<!-- El name ha de ser igual a la id de la pregunta -->
					<div class="container" style="margin-bottom: 10px;">
						<input type="submit" value="1 - Los protones" class="btn btn-info btn-block cuestion" style="text-align: left;" name="id_pregunta3"> <!-- La id pregunta es el que necessites per buscar una pregunta a la base de dades -->
					</div>
					<div class="container" style="margin-bottom: 10px;">
						<input type="submit" value="2 - Los neutrones" class="btn btn-info btn-block cuestion" style="text-align: left;" name="id_pregunta4">
					</div>
					<div class="container" style="margin-bottom: 10px;">
						<input type="submit" value="2 - Los electrones" class="btn btn-info btn-block cuestion" style="text-align: left;" name="id_pregunta5">
					</div>
				</div>

			</div>
		</div>
		<form action="/cuestionario/index.php" method="POST" role="form" id="irAlCuestionario">
			<input type="hidden" name="idconjunto" value="" id="input-idconjunto">
		</form>
		<!-- jQuery -->
		<script src="/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/alumno.js"></script>
	</body>
</html>
