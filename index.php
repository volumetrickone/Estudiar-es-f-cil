<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Estudiar es Fácil</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/home.css">

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
		<div class="jumbotron fondo-portada" style="background-color: #3497DA; margin-top: -20px;">
			<div class="container portada">
				<h1>Bienvenido!</h1>
				<p>Aquí descubrirás que se puede aprender de forma fácil y divertida!</p>
			</div>
			<div class="container portada" style="margin-top: 20px;">
				<p>
					<a class="btn btn-primary btn-lg btn-success" id="empezar">Empezar!</a>
				</p>
			</div>
			<div class="row" id="login-registro" style="display: none;">

			<!-- PREGUNTAS -->
			<div class="col-lg-4 col-lg-offset-2 sec-1-btn text-center" style="padding: 0px;">
				<div class="jumbotron" id="portada" style="background-color: #3497DA;">
					<div class="container">
						<h1>¿Ya tienes cuenta?</h1>
					</div>
					<div class="container" style="margin-top: 20px;">
						<p>
							<a class="btn btn-primary btn-lg btn-success" id="empezar" href="/iniciar_sesion">Iniciar sesión</a>
						</p>
					</div>
				</div>
			</div>
		    <div class="col-lg-4 sec-1-btn text-center" style="padding: 0px;">
		    	<div class="jumbotron" id="portada" style="background-color: #3497DA;">
					<div class="container">
						<h1>¿No tienes cuenta?</h1>
					</div>
					<div class="container" style="margin-top: 20px;">
						<p>
							<a class="btn btn-primary btn-lg btn-success" id="empezar" href="/registro">Registrate!</a>
						</p>
					</div>
				</div>
		    </div>
		</div>
		</div>
		
		<!-- jQuery -->
		<script src="/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/homepage.js"></script>
	</body>
</html>

