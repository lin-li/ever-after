<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}

if ((isset($_POST['response'])) && (strlen(trim($_POST['response'])) > 0)) {
	$response = stripslashes(strip_tags($_POST['response']));
} else {$response = 'No response selected';}

$services = implode(", ",array_filter(array($service1,$service2,$service3)));

if ((isset($_POST['guests'])) && (strlen(trim($_POST['guests'])) > 0)) {
	$guests = stripslashes(strip_tags($_POST['guests']));
} else {$guests = 'No # of guests entered';}

if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
	
} else {$email = 'No email entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message = 'No message entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
   <tr bgcolor="#eeffee">
    <td>Response</td>
    <td><?=$response;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>No. of Guests</td>
    <td><?=$guests;?></td>
  </tr>  
  <tr bgcolor="#eeeeff">
    <td>Message</td>
    <td><?=$message;?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "admin@ever-after.com";// emaill address from your site
$mail->FromName = "RSVP"; // Subject of the mail
$mail->AddAddress("falconerie.04@gmail.com","Name 1"); // Put your email here

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "Demo Form from Ever After:  Contact form submitted"; 
$mail->Body     =  $body;
$mail->AltBody  =  "This is the text-only body";

if(!$mail->Send()) {
	$recipient = 'falconerie.04@gmail.com'; //Put your email here
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: mail@yourdomain.com\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
