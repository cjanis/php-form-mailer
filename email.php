<?php

	// get the form data

		// NOTE: If you add or remove fields from the form, you'll need to make corresponding changes here.
		$name = $_GET["name"];
		$email = $_GET["email"];
		$message = $_GET["message"];

	// validate the required fields

		if ($name == "" || $email == "" || $message == "") {
			echo "Please fill out all the required (*) fields.";
			return false;
		} else {
			$name = filter_var($name, FILTER_SANITIZE_STRING);
			$message = filter_var($message, FILTER_SANITIZE_STRING);
		}

	// validate the email

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		} else {
			echo "Please enter a valid email address.";
			return false;
		}

	// send email
	
		$date = date('Y-m-d, H:i:s');
		$to = "cjanis@gmail.com";
		$from = $email;
		$subject = "New message from " . $name;
		// NOTE: If you add or remove fields from the form, you'll need to make corresponding changes here.
		$message = "
			<div>
				<h1>Message from ". $name . "</h1>
				<p><b>Date</b><br>" . $date . "</p>
				<p><b>Name</b><br>" . $name . "</p>
				<p><b>Email</b><br> " . $email . "</p>
				<p><b>Message</b><br> " . $message . "</p>
			</div>
		";
		
		$headers = "MIME-Version: 1.0\r\nContent-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "From:" . $from;

		mail($to, $subject, $message, $headers);
		
		echo "Success! Your message has been sent. Thank you!";

?>