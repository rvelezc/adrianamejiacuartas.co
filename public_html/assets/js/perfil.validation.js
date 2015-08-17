(function($) {
	"use strict";
	var emailDefault = 'Correo Electrónico (Opcional)';
	var messageDefault = 'Ideas ...';

	var result = '';
	var clear = '';

	// Setting up existing forms

	setupforms();

	function setupforms() {
		// Applying default values
		setupDefaultText('#email',emailDefault);
		setupDefaultText('#message',messageDefault);

		// Focus / Blur check against defaults
		focusField('#email');
		focusField('#message');

	}

	function setupDefaultText(fieldID,fieldDefault) {
		$(fieldID).val(fieldDefault);
		$(fieldID).attr('data-default', fieldDefault);
	}

	function evalDefault(fieldID) {
		if($(fieldID).val() != $(fieldID).attr('data-default')) {
			return false;
		}
		else { return true; }
	}

	function hasDefaults(formType) {
		switch (formType)
		{
			case "contact" :
				if(evalDefault('#message')) { return true; }
				else { return false; }

			default :
				return false;
		}
	}

	function focusField(fieldID) {
		$(fieldID).focus(function(evaluation) {
			if(evalDefault(fieldID)) { $(fieldID).val(''); }
		}).blur(function(evaluation) {
			if(evalDefault(fieldID) || $(fieldID).val() === '') { $(fieldID).val($(fieldID).attr('data-default')); }
		});
	}

	$('#submit-perfil').bind('click', function(event){
		event.preventDefault();
		if(!hasDefaults('contact')) { $('#form-perfil').submit(); }
		else {$( '#form-message' ).html( '<div class="alert alert-danger"><strong>Error!</strong> Hay un campo faltante o mal diligenciado, por favor revise el formulario!</div>' ).fadeIn( 'fast' ).delay( 3000 ).fadeOut( 'slow' );$( '#content .container' ).scrollTop( $( '#form-message' ).position().top );}
	});

	$("#form-perfil").validate({
		ignore: [email],
		rules: {
			message: {
				required: true,
				minlength: 3
			},
			hiddenRecaptcha: {
				required: function() {
										if(grecaptcha.getResponse() == '') {
											 return true;
										 } else {
											 return false;
										 }
     }
}
						
		},
		messages: {
			message: {
				required: "Por favor ingrese su mensaje.",
				minlength: "El mensaje debe contener al menos 10 caracteres."
			},
			hiddenRecaptcha: {
				required: "Por favor verifique que no es un robot.",
			},
		}
	});

	function validateContact() {
		if(!$('#form-perfil').valid()) { return false; console.log('Validation error'); }
		else { return true; console.log('Validation OK'); }
	}

	$("#form-perfil").ajaxForm({
		beforeSubmit: validateContact,
		type: "POST",
		url: "assets/php/contact-form-process.php",
		data: $( "#form-perfil" ).serialize(),
		success: function( msg ){
			$( "#form-message" ).ajaxComplete( function( event, request, settings ){
				if( msg.replace(/[^a-zA-Z0-9]/g,'') == 'OK' ) // Message Sent? Show the 'Thank You' message
				{
					result = '<div class="alert alert-success"><strong>Completo!</strong> Su mensaje ha sido enviado con éxito. Gracias!</div>';
					clear = true;
				}
				else
				{
					result = '<div class="alert alert-danger"><strong>Error!</strong> ' + msg +'</div>';
					clear = false;
				}
				$( this ).html( result ).fadeIn( 'fast' ).delay( 3000 ).fadeOut( 'slow' );
				$( '#content .container' ).scrollTop( $( '#form-message' ).position().top );

				if( clear == true ) {
					$( '#email' ).val( emailDefault );
					$( '#message' ).val( messageDefault );
					grecaptcha.reset();
				}
			});
		}
	});
})(jQuery);