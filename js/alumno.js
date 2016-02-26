jQuery(document).ready(function($) {
	$('.aparecer').fadeIn('slow');
	var haycuestionarioabierto = 0;
	var cuestionarioabierto;
	var cuestionarioapretado;
	$('.grupo').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		var name = $(this).attr('name');
		var idgrupo = "#"+name;
		cuestionarioapretado = $(idgrupo);
		if (haycuestionarioabierto === 1) {
			$('.contenedor-cuestionarios').hide();
			cuestionarioapretado.fadeIn('slow');
		};
		if (haycuestionarioabierto === 0) {
			haycuestionarioabierto = 1;
			cuestionarioapretado.fadeIn('slow');
		};
	});

	//ABRIR CUESTIONARIO CUANDO APRETAN ENCIMA
	$('.cuestion').click(function(event) {
		/* Act on the event */
		var idcuestion = $(this).attr('name');
		$("#input-idconjunto").val(idcuestion);
		$( "#irAlCuestionario" ).submit();
	});

});