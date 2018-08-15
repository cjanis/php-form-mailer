$(document).ready(function() {

	$("form #submit").click(function(event) {
		
		// prevent page reload

			event.preventDefault();
			
		// show the loading indicator
		// NOTE: The loading div will be visible from the moment the submit button is pushed until a status message is recieved. You can use the loading div to show a spinner animation or other progress indicator.
		
			$("form div#loading").show();

		// send the form
		
			$.ajax({
				type: "get",
				url: "email.php",
				data: {
					// NOTE: If you add or remove fields from the form, you'll need to make corresponding changes here.
					name: $("#name").val(),
					email: $("#email").val(),
					message: $("#message").val()
				},
				success: function(data) {

					// show alert message
					// NOTE: All messages will be shown as alerts, including errors or success.

						alert(data);
						
					// hide the loading indicator

						$("form div#loading").fadeOut();
						
					// reset the form if it was successful
					
						if (data.includes("Success")) {
							$("form")[0].reset();
						}

				}
			});
		
	});

});