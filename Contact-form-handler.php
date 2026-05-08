<?php

	// collects the data from the form in html
	$name = $_POST["name"];
	$visitor_email = $_POST["email"];
	$message = $_POST["message"];

	// the address of the email that will recive the mail
	$email_from = "info@perspectivepov.co.za";

	// the main subject to show on address what mail is about
	$email_subject ="Perspective Point of View ";

	// This will be sent to the address
	$email_body = "User name: $name.\n".
					"User Email: $visitor_email.\n".
						"User Message: $message.\n";

	// the address to where I want to recive enquires 
	$to = "hello@perspectivepov.co.za";

	$headers = "From: $email_from \r\n";

	$headers .= "Reply-To: $visitor_email \r\n";

	// Send the email and check if it was successful
	if (mail($to,$email_subject,$email_body,$headers)) {
		// Email sent successfully
		header("Location:services.html?status=success");
	} else {
		// Email failed to send, log to file for debugging
		$log = "Email failed to send. Details:\nTo: $to\nSubject: $email_subject\nBody: $email_body\nHeaders: $headers\n\n";
		file_put_contents('email_log.txt', $log, FILE_APPEND);
		header("Location:services.html?status=error");
	}
?>