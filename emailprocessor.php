<?php 
$errors = '';
$myemail = 'info@linguafrancaworld.com';//<-----Put Your email address here.
if (empty($_POST['email'])) {
    $errors .= "\n Error: all fields are required";
}
$email_address = $_POST['email']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "New Signup";
	$email_body = "Email: $email_address"; 
	
	$headers = "From: $email_address\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: index.php');
} 
?>