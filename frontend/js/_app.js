$('document').ready(function(){
	$formContact = $( "#form-subscribe" );
	$formContact.validate({
		rules: {
			email: {
				email: true,
				required: true
			}
		},
		submitHandler: function(form) {
			$.ajax({
				data: $(form).serialize(),
				dataType: 'json',
				method: 'POST',
				url: $(form).attr('action')
			}).done(function(data){
				if(data.isAccepted === true) {
					$('#form-contact-thank-you-modal').modal({
						show: true
					});
				} 
				if(data.alreadyRegistered === true){
					$('#modal-already-signed-up').modal({
						show: true
					});	
				} 
				if(data.deleted === true){
					$('#modal-unsubscribe').modal({
						show: true
					});							
				}
			});
		}
	});	
});