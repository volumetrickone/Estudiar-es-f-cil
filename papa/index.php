
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
						    		<h3 class="panel-title" style="text-align: center;">¿Cuál es el planeta más grande del sistema solar?</h3>
						 			</div>
						 			<div class="panel-body">
						    		<form role="form">
						    			<div class="form-group" >
						    				<input type="button" value="1 - Marte" class="btn btn-info btn-block responder" name="respuesta" id="p1">
						    			</div>
										<div class="form-group">
				    						<input type="button" value="2 - Tierra" class="btn btn-info btn-block responder" name="respuesta" id="p2">
				    					</div>
				    					<div class="form-group">
				    						<input type="button" value="3 - Júpiter" class="btn btn-info btn-block responder" name="respuesta" id="p3">
				    					</div>
				    					<div class="form-group">
				    						<input type="button" value="4 - Venus" class="btn btn-info btn-block responder" name="respuesta" id="p4">
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
			<input type="hidden" id="progreso" value="80">
		</form>
		<!-- jQuery -->
		<script src="/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/cuestionario.js"></script>
		<script src="/js/progressbar.min.js"></script>
		<script type="text/javascript">
			var correcto = false;
			if (!('webkitSpeechRecognition' in window)) {
			    //handle error stuff here...
			} else {
			    var recognition = new webkitSpeechRecognition();
			    recognition.continuous = false;
			    recognition.interimResults = true;

			    recognition.start();

			    var final_transcript = '';

			    recognition.onresult = function (event) {
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
		        }

			}
		</script>
	</body>
</html>
