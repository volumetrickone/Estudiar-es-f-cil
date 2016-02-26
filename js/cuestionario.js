jQuery(document).ready(function($) {
	$('#cuestionario').fadeIn('slow');//Hacemos que aparezca la pregunta

	$('.responder').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		$(this).addClass('seleccionada');
		var preg = $('#cuestionario').attr('name');
		var res = $(this).attr('id');

		enviarRespuesta(preg,res, function(respuesta) {
       		if (respuesta[0] == 0) { //INCORRECTA
       			$('.seleccionada').addClass('btn-danger');
       			var idcorrecta = '#'+respuesta[1];
       			$(idcorrecta).addClass('btn-success');
       		};
       		if (respuesta[0] == 1) { //CORRECTA
       			$('.seleccionada').addClass('btn-success');
       		};
       		$(document).click(function() {
			    location.reload(forceGet);
			});
		});
	});
	var startColor = '#FC5B3F';
	var endColor = '#6FD57F';

	var progressBar = new ProgressBar.Line('#progreso', {  //Crear la progress bar
	    strokeWidth: 5,
	    color: startColor,
	    duration: 1500,
	    easing: 'bounce',
	    text: {
	        value: '0'
	    },
	    step: function(state, bar) {
	        bar.setText((bar.value() * 100).toFixed(0));
	        bar.path.setAttribute('stroke', state.color);
	    }
	});
	if ($('#progeso').length !== 0) {
		var progreso = $('#progreso').val();
	};
	progreso = "0."+progreso;
	progressBar.animate(progreso, {
	    from: {color: startColor},
	    to: {color: endColor}
	});
});

//FUNCTIONS

function enviarRespuesta(preg,resp,callback) {
			$.ajax({
		    url: '/cuestionario/cuestionario.php',
		    type: 'post',
		    data: { "pregunta": preg, "respuesta": resp},
		    success: function(response) { 
		    	callback(response); 
		    }
		});
	}