<?php	
	if(empty($_POST['email2']) || empty($_POST['email2']))
	{
		return false;
	}
	
	$email2 = $_POST['email2'];
	$email2 = $_POST['email2'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from FoodExpress Official.";
	$email_body = "You have received a new message. \n\n".
				  "Email2: $email2 \nEmail2: $email2 \n";
	$headers = "From: contact@yoursite.com\n";
	$headers .= "Reply-To: $email2";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>