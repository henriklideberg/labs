<?php 
$errors = '';
$myemail = 'henrik.lideberg@gmail.com';//<-----Put Your email address here.
if(empty($_POST['typ'])  || 
   empty($_POST['mail']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$typ = $_POST['typ']; 
$mail = $_POST['mail']; 
$message = $_POST['message'];
$kontakt = $_POST['kontakt']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$mail))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Du har fått mail från $mail";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Fråga: $typ \n Epost: $mail \n Message \n $message \n Vill bli kontaktad: $kontakt"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $mail";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>