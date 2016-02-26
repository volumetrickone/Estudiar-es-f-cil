jQuery(document).ready(function($) {
			//$('#crear_cuestionario').popover();
			$('#boton-crear-cuestionario').on('click', function(event) {
					event.preventDefault();
					/* Act on the event */
					swal({
							title: 'Nombre del cuestionario:',
							html: "<div class='form-group' style='margin-top: 20px;'><input type='text' id='nombre-del-cuestionario' class='form-control input-bg'></div>",
							showCancelButton: true,
							closeOnConfirm: true,
							cancelButtonText: "Cancelar",
							confirmButtonText: "Continuar"
						}, function() {
							var nombre = $('#nombre-del-cuestionario').val();
							$('#boton-crear-cuestionario').after("<input type='hidden' value='" + nombre + "' name='nombreconjunto'>");
							$( "#form-crear-cuestionario" ).submit();
							});
					});
			$('#boton-crear-grupo').on('click', function(event) {
					event.preventDefault();
					/* Act on the event */
					swal({
							title: 'Nombre del grupo:',
							html: "<div class='form-group' style='margin-top: 20px;'><input type='text' id='nombre-del-grupo' class='form-control input-bg'></div>",
							showCancelButton: true,
							closeOnConfirm: true,
							cancelButtonText: "Cancelar",
							confirmButtonText: "Continuar"
						}, function() {
							var nombre = $('#nombre-del-grupo').val();
							$('#boton-crear-grupo').after("<input type='hidden' value='" + nombre + "' name='nombregrupo'>");
							$( "#form-crear-grupo" ).submit();
							});
					});
			});