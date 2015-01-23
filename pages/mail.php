<?php 
$typ= $_POST['typ'];
$mail = $_POST['mail'];
$message = $_POST['message'];
$contact = $_POST['kontakt'];
$to = 'henrik.lideberg@gmail.com';
$subject = 'Mail från hemsida';

$message = "
<html>
<head>
  <title>Mail ifrån hemsidan</title>
</head>
<body>
  <table>
    <tr>
      <th>Ärendetyp</th><th>Mail</th><th>Meddelande</th>
    </tr>
    <tr>
      <td>".$typ."</td><td>".$mail."</td><td>".$message."</td>
    </tr>
    <tr>
      <td colspan='3'>Användare vill bli kontaktad ".$contact."</td>
    </tr>
  </table>
</body>
</html>";

$headers = 'To: Henrik Lideberg <henriklideberg@gmail.com>'."\r\n";
$headers .= 'From: '.$name.' <'.$email.'>'."\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
	echo 'mailet blev skickat<br />
	 <a href="kontakt.html">Tillbaka till kontaktsidan</a>';
} else {
	echo 'mailet kunde ej skickas';
}