jQuery(document).ready(function($) {
	$('#siguientepregunta').on('click', function(event) {
		/* Act on the event */
		$( "input[value='accion']" ).val('1');
		$('#iniciar_sesion').submit();
	});
	$('#finalizar').on('click', function(event) {
		/* Act on the event */
		$( "#accionenviar" ).val('2');
		$('#iniciar_sesion').submit();
	});
});