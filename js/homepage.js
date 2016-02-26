jQuery(document).ready(function($) {
	$('#empezar').click(function(event) {
		/* Act on the event */
		$('.portada').fadeOut(1000, "linear", function() {
			/* Mostrar las opciones de log in y de registro */
			
			$('#login-registro').fadeIn(1000, function() {
				
			});
		});
	});
});