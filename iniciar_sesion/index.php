<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Estudiar es Fácil</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/iniciar_sesion.css">

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
		<form action="/iniciar_sesion/iniciar_sesion.php" method="POST" role="form" id="iniciar_sesion" style="display: none;">	
			<div class="container-registro">
				<div class="container vertical-center">
			        <div class="row centered-form">
			        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
			        	<div class="panel panel-default">
			        		<div class="panel-heading">
						    		<h3 class="panel-title">Hola, inicia sesión por favor!</h3>
						 			</div>
						 			<div class="panel-body">
						    		<form role="form">
						    			<div class="form-group" >
						    				<input type="email" name="mail" id="email" class="form-control input-sm" placeholder="Correo">
						    			</div>
										<div class="form-group">
				    						<input type="password" name="pass" id="password" class="form-control input-sm" placeholder="Constraseña">
				    					</div>
						
						    			<input type="submit" value="Entrar" class="btn btn-info btn-block">
						    		
						    		</form>
						    	</div>
				    		</div>
			    		</div>
			    	</div>
			    </div>
			</div>
		</form>
		<!-- jQuery -->
		<script src="/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/iniciar_sesion.js"></script>
	</body>
</html>

