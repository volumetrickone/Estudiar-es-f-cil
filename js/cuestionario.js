jQuery(document).ready(function($) {
	$('#cuestionario').fadeIn('slow');//Hacemos que aparezca la pregunta

	$('.responder').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var seleccionado = $(this).attr('id');
		$(this).addClass('seleccionada');
		var preg = $('#cuestionario').attr('name');
		var res = $(this).attr('id');
		//alert(res);

		enviarRespuesta(res, function(respuesta) {
			//alert(respuesta);
			//alert(respuesta[1]);
       		if (respuesta != seleccionado) { //INCORRECTA
       			//alert("respuesta incorrecta");
       			$('.seleccionada').addClass('btn-danger');
       			var ident = "#"+respuesta;
       			var correcta = $(ident);
       			//alert(correcta);
       			correcta.removeClass('btn-info');
       			correcta.addClass('btn-success');
       		};
       		if (respuesta == seleccionado) { //CORRECTA
       			//alert("respuesta correcta");
       			$('.seleccionada').removeClass('btn-info');
       			$('.seleccionada').addClass('btn-success');
       		};
       		$(document).click(function() {
			    location.reload(true);
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

function enviarRespuesta(resp,callback) {
			$.ajax({
		    url: '/cuestionario/revisando.php',
		    type: 'post',
		    data: {"respuesta": resp},
		    success: function(response) { 
		    	callback(response); 
		    }
		});
	}